<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reports;
use App\Jobs\SendReportProcess;
use Storage;

class ReportController extends Controller
{
   

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
            $create_report = Reports::create(['pdf_name' => $report_code, 'patient_id' => $request->patient_id, 'wbc' => $request->WBC, 'neno' => $request->Neutrophils, 'lymno' => $request->Lymphocytes, 'mono' => $request->Monocytes, 'eono' => $request->Eosinophils, 'bano' => $request->Basophils, 'hb' => $request->Hb, 'hct' => $request->HCT, 'mcv' => $request->MCV, 'plt' => $request->PlateletCount, 'disease' => $data]);
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
