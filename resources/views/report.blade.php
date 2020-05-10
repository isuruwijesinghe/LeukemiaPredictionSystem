@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
            <!-- <div class="panel-body"> -->
                <div class="panel-heading">
                    <h2><b class="text-primary">Leukemia Prediction Report</b></h2>
                </div>
                <!-- <div class="panel-body"> -->
                    <div class="container-fluid">
                        <form role="form" method="POST" action="{{ url('/report_generate') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Name</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->name ?? null ?: 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Age</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->age ?? null ?: 'n/a'}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>National ID</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->national_id ?? null ?: 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Mobile Number</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->mobile_number ?? null ?: 'n/a'}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Gender</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->gender ?? null ?: 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Date</b></td>
                                                    <td style="width: 35%">{{$current_time ?? null ?: 'n/a'}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                <h4><b class="text-primary">CBC Results</b></h4>
                                                <tr class="bg-dark text-white">
                                                    <th>Parameter</th>
                                                    <th>Results</th>
                                                    <th>Normal range</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">WBC</span></h5>
                                                    </td>
                                                    <td>{{$create_report->wbc}}</td>
                                                    <td>4.0 - 10.0</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Neutrophils</span></h5>
                                                    </td>
                                                    <td>{{$create_report->neno}}</td>
                                                    <td>2.00 - 7.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Lymphocytes</span></h5>
                                                    </td>
                                                    <td>{{$create_report->lymno}}</td>
                                                    <td>1.00 - 3.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Monocytes</span></h5>
                                                    </td>
                                                    <td>{{$create_report->mono}}</td>
                                                    <td>0.20 - 1.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Eosinophils</span></h5>
                                                    </td>
                                                    <td>{{$create_report->eono}}</td>
                                                    <td>0.02 - 0.50

                                                    </td>
                                                </tr>
                                                <tr>
                                            
                                                    <td>
                                                        <h5><span class="badge badge-primary">Basophils</span></h5>
                                                    </td>
                                                    <td>{{$create_report->bano}}</td>
                                                    <td>0.02 – 0.1

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Hb</span></h5>
                                                    </td>
                                                    <td>{{$create_report->hb}}</td>
                                                    <td>13.0 – 17.0

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">HCT(PCV)</span></h5>
                                                    </td>
                                                    <td>{{$create_report->hct}}</td>
                                                    <td>40.0 – 50.0

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">MCV</span></h5>
                                                    </td>
                                                    <td>{{$create_report->mcv}}</td>
                                                    <td>83.0 – 99.0

                                                    </td>
                                                </tr>
                                                <tr> 
                                                    <td>
                                                        <h5><span class="badge badge-primary">Platelet Count</span></h5>
                                                    </td>
                                                    <td>{{$create_report->plt}}</td>
                                                    <td>150 – 410

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-primary text-white">
                                                                <h4><b>Prediction</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>
                                                                    {{$create_report->disease}}
                                                                </b></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <td class="bg-primary text-white">
                                                                <h4><b>Docotor comments</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <textarea class="form-control" rows="3" name="doctor_cmnt"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <input type="hidden" name="report_id" value="{{$report_id}}">

                                                            <td class="bg-primary text-white">
                                                                <h4><b>Next appointement date</b></h4>
                                                            </td>
                                                        </tr>
            
                                                    </tbody>
                                                </table>
                                                <div class="form-group col-sm-12">
                                                    <div class='col-sm-12'>
                                                        <input type='text' class="form-control" id='datetimepicker8' name="date_order"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($create_report->disease == "CLL")
                                    <div id="CLL">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Symptoms</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>CLL is a slow-growing disease and many signs of CLL are vague</td>
                                                        </tr>
                                                       
                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Causes</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exposure to high levels of radiation </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repeated exposure to certain chemicals (for example, benzene)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chemotherapy</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Syndrome</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Genetic causes</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($create_report->disease == "HCL")
                                    <div id="HCL">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Symptoms</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td>Weakness or feeling tired</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Recurrent infections and fevers</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Easy bruising or bleeding</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shortness of breath</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Unexplained weight loss </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pain or a feeling of fullness below the ribs </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Painless lumps in the neck, underarm, stomach or groin </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Swollen lymph nodes </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Causes</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exposure to high levels of radiation </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repeated exposure to certain chemicals (for example, benzene)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chemotherapy</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Syndrome</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Genetic causes</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($create_report->disease == "CML")
                                    <div id="CML">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Symptoms</b></h4>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Easy bleeding</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Unexplained weight loss</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Fever</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Loss of appetite </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Night sweats </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pale skin
                                                            </td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Causes</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exposure to high levels of radiation </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repeated exposure to certain chemicals (for example, benzene)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chemotherapy</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Syndrome</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Genetic causes</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($create_report->disease == "AML")
                                    <div id="AML">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Symptoms</b></h4>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Frequent infections and fever</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Anemia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Easy bleeding or bruising</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Joint and bone pain</td>
                                                        </tr>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Causes</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exposure to high levels of radiation </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repeated exposure to certain chemicals (for example, benzene)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chemotherapy</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Syndrome</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Genetic causes</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($create_report->disease == "Leukemia Positive")
                                    <div id="Leukemia Positive">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Symptoms</b></h4>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Fever, chills, night sweats and flu-like symptoms</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weakness and fatigue</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Swollen or bleeding gums</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Headache </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Enlarged liver and spleen </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Swollen tonsils </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bone pain </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pale skin </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pinhead-size red spots on the skin</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weight loss</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                        </div><br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">

                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td class="bg-warning text-dark">
                                                                <h4><b>Causes</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Exposure to high levels of radiation </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Repeated exposure to certain chemicals (for example, benzene)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chemotherapy</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Syndrome</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Genetic causes</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                <!-- </div> -->
            <!-- </div> -->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">   
    $(function () {
		    $('#datetimepicker8').datetimepicker({
		    	sideBySide: true,
		    	showClose: true,
		    	// toolbarPlacement: "top",
				format: 'YYYY-MM-DD',
                icons: {
                    time: 'fas fa-clock',
                    date: 'fas fa-calendar-alt',
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-check',
                    clear: 'fas fa-trash',
                    close: 'fas fa-times'
                }
		    });
		});
    </script>
@endsection 