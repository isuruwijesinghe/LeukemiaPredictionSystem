<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reports;

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
            $create_report = Reports::create(['pdf_name' => $report_code, 'patient_id' => $request->patient_id, 'wbc' => $request->wbc, 'neno' => $request->neno, 'lymno' => $request->lymno, 'mono' => $request->mono, 'bano' => $request->bano, 'hb' => $request->hb, 'hct' => $request->hct, 'mcv' => $request->mcv, 'plt' => $request->plt, 'disease' => $data]);
            // 'patient_id', 'wbc', 'neno', 'lymno', 'mono', 'eono', 'bano', 'hb', 'hct', 'mcv', 'plt', 'disease', 'next_date', 'doctor_comment', 'pdf_name'
            $report_id = $create_report->id;
            return view('report', \compact('data', 'report_id', 'create_report'));

        }catch(throwable $error){
            dd($error);
        }
    }
}
