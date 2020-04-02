<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reports;
use App\Jobs\SendReportProcess;
use Storage;
use Illuminate\Support\Facades\Validator;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;

class ReportController extends Controller
{
   
    //show the upload form
    public function displayForm($id)
    {
    return view('image_upload', compact('id'));
    }

    public function annotateImage(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'patient_id' => 'required',
      'image' => 'required'
    ]);
    if ($validator->passes()) {
      //convert image tos base64
      $image = base64_encode(file_get_contents($request->file('image')));


      $photoDir = "temp_reports/";
      //date format extension
      $currentTime = Carbon::now()->timestamp;
      $photo = $request->image;

          $extension = $photo->getClientOriginalExtension();
          $fileName = rand(11111, 99999999) . $currentTime . '.' . $extension;
          $photo->move($photoDir, $fileName);

          $file_name = $photoDir . $fileName;
        
      //dd($file_name);
      //prepare request
      $g_request = new AnnotateImageRequest();
      //set the image for OCR
      $g_request->setImage($image);
      $g_request->setFeature("TEXT_DETECTION");
      $gcvRequest = new GoogleCloudVision([$g_request],  env('GOOGLE_CLOUD_KEY'));

      //send annotation request
      $response = $gcvRequest->annotate();

      dd(json_encode(["description" => $response->responses[0]->textAnnotations[0]->description]));

    //   //getting responce
    //   $responce = json_encode(["description" => $response->responses[0]->textAnnotations[0]->description]);
    //   $responce = trim($responce, '-{}description":');
    //   $responce = preg_replace("/r|n/", "", $responce);
    //   $responce = str_replace('-', '', $responce);
    //   $responce = preg_replace('/\\\\/', '', $responce);
    //   $responce = str_replace('Complete', '', $responce);
    //   $responce = str_replace('Blood', '', $responce);
    //   $responce = str_replace('Cout', '', $responce);
    //   $responce = str_replace('RepotNameDOBAgeCotact', '', $responce);
    //   $responce = str_replace('No', '', $responce);
    //   $responce = str_replace('GedeTest', '', $responce);
    //   $responce = str_replace('Results', '', $responce);
    //   $responce = str_replace('PLT', '', $responce);
    //   $responce = str_replace('LYM', '', $responce);


    //   $responce = str_replace('RBC', '', $responce);
    //   $responce = str_replace('MCV', '', $responce);
    //   $responce = str_replace('HB', '', $responce);
    //   $responce = str_replace('MCHC', '', $responce);
    //   $responce = str_replace('MCH', '', $responce);
    //   $responce = str_replace('  ', ',', $responce);
    //   $responce = str_replace('RDW', '', $responce);
    //   $responce = str_replace(' ', ',', $responce);
    //   $responce = trim($responce, ",");
    //   $responce = explode(',', $responce);
    //   $newArray = array_slice($responce, 0, 6, true);

    //   //getting results array
    //   $patient_id = $request->patient_id;
    //   Session::put('newArray', $newArray);
    //   //passing data to OCR result page
    //   return view('confirm_values', compact('newArray', 'patient_id', 'file_name'));
    }
    return redirect()->back()->with(['error' => $validator->getMessageBag()->toArray()]);
  }

    public function store(Request $request){
        
        $data = request()->validate([
            'WBC' => 'required | numeric',
            'Neutrophils' => 'required | numeric',
            'Lymphocytes' => 'required | numeric',
            'Monocytes' => 'required | numeric',
            'Eosinophils' => 'required | numeric',
            'Basophils' => 'required | numeric',
            'MCV' => 'required | numeric',
            'Hb' => 'required | numeric',
            'HCT' => 'required | numeric',
            'PlateletCount' => 'required | numeric'
        ]);
        // dd(request(['WBC', 'Ne', 'Lym', 'Mono', 'Eos', 'Baso', 'MCV', 'Hb', 'HCT', 'Plate']));
        // dd($request->WBC);

        try{

            //passing parameters to model via API
            $client = new \GuzzleHttp\Client(["base_uri" => "http://127.0.0.1:5000/"]);
            $options = [
                'json' => [
                    'WBC' => $request->WBC,
                    'HGB' => $request->Hb,
                    'NENO' => $request->Neutrophils,
                    'LYMNO' => $request->Lymphocytes,
                    'MONO' => $request->Monocytes,
                    'EONO' => $request->Eosinophils,
                    'BANO' => $request->Basophils,
                    'HCT' => $request->HCT,
                    'MCV' => $request->MCV,
                    'PLT' => $request->PlateletCount
                ]
              ];
              $response = $client->post("/api", $options);

            // Getting the predicted responce
            $req = $response->getBody()->getContents();
            // dd($req);
            $data = json_decode($req)->results->Condition;
            $report_code = Carbon::now()->timestamp . rand(10000, 99000);
            // dd($request->patient_id);
            $create_report = Reports::create(['pdf_name' => $report_code, 'pdf_url' => $report_code, 'patient_id' => $request->patient_id, 'wbc' => $request->WBC, 'neno' => $request->Neutrophils, 'lymno' => $request->Lymphocytes, 'mono' => $request->Monocytes, 'eono' => $request->Eosinophils, 'bano' => $request->Basophils, 'hb' => $request->Hb, 'hct' => $request->HCT, 'mcv' => $request->MCV, 'plt' => $request->PlateletCount, 'disease' => $data]);
            // 'patient_id', 'wbc', 'neno', 'lymno', 'mono', 'eono', 'bano', 'hb', 'hct', 'mcv', 'plt', 'disease', 'next_date', 'doctor_comment', 'pdf_name'
            $report_id = $create_report->id;
            $current_time = Carbon::now()->format('d-m-Y');
            return view('report', \compact('data', 'report_id', 'create_report','current_time'));

        }catch(throwable $error){
            dd($error);
        }
    }

    public function reportGenerate(Request $request){
        try {
            $report = Reports::with('patient')->where('id', '=', $request->report_id)->first();
            //after generating report Doctor enter next date and comments
            if (!is_null($report)) {
              $report->update(['next_date' => $request->date_order, 'doctor_comment' => $request->doctor_cmnt]);
            }
            //job process for pdf gen and send sms
            // Storage::put('file_name.txt', 'content', 'public');
            dispatch(new SendReportProcess($report->id));
            return redirect()->guest('home')->with('success', 'Patient report sent successfully');
          } catch (\Throwable $th) {
              dd($th);
           }
    }
}
