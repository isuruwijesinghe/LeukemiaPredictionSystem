<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use PDF;
use App\Reports;
use Storage;
use Carbon\Carbon;

class SendReportProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $report_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($report_id)
    {
        //
        $this->report_id = $report_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        try{
        $report = Reports::with('patient')->where('id', '=', $this->report_id)->first();
        $current_time = Carbon::now()->format('d-m-Y');
        if (is_null($report)) {
            return 'false';
        }

        //create PDF
        $pdf = PDF::loadView('report_pdf', compact('report', 'current_time'));
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        //resize pdf
        $canvas->page_text(275, 760, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
        //saving pdf with a generated number
        $file_name = $report->pdf_name . '.pdf';

        // store local
        // Storage::disk('public')->put($file_name, $pdf->output());
        // // get pdf path    
        // $file_url = Storage::url($file_name);

        //uploading pdf to s3 bucket
        Storage::disk('s3')->put($file_name, $pdf->output());
        // get pdf path from s3 bucket
        $file_url = Storage::disk('s3')->url($file_name);
        
        //update url
        $report->update(['pdf_url' => $file_url]);

        
        // sending sms with textit.biz
        $user = "94719309953";
        $password = "8458";
        $text = urlencode('Check your report ' . $file_url);
        $to = $report->patient->mobile_number;
        // $to = "94719309953";
        
        
        $baseurl ="http://www.textit.biz/sendmsg";
        $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        $ret = file($url);
        
        $res= explode(":",$ret[0]);
        
        if (trim($res[0])=="OK")
        {
            echo "Message Sent - ID : ".$res[1];
        }
        else
        {
            echo "Sent Failed - Error : ".$res[1];
        }

        }catch (\Throwable $th) {
              dd($th);
           }
        
    }
}
