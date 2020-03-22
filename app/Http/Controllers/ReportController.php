<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            $rq = $response->getBody()->getContents();

            dd($rq);

        }catch(throwable $error){
            dd($error);
        }
    }
}
