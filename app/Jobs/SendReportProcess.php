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
        Storage::disk('public')->put($file_name, $pdf->output());
        // get pdf path    
        // $file_url = Storage::disk('public')->url($file_name);
        $file_url = Storage::url($file_name);
        // $file_url = 'file:///IIT/FYP/blog/storage/app/public/' . $file_name;
        
        //update url
        $report->update(['pdf_url' => $file_url]);

        }catch (\Throwable $th) {
              dd($th);
           }
        
    }
}
