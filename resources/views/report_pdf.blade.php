<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leukemia Diagnosis Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >

   

</head>

<body>

<div class="container">
    <div class="row">
            <div class="panel-body">
                <div class="panel-heading">
                    <h2><b class="text-primary">Leukemia Prediction Report</b></h2>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">

                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Name</b></td>
                                                    <td style="width: 35%">{{$report->patient->name ?? null ?: 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Age</b></td>
                                                    <td style="width: 35%">{{$report->patient->age ?? null ?: 'n/a'}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>National ID</b></td>
                                                    <td style="width: 35%">{{$report->patient->national_id ?? null ?: 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Mobile Number</b></td>
                                                    <td style="width: 35%">{{$report->patient->mobile_number ?? null ?: 'n/a'}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Gender</b></td>
                                                    <td style="width: 35%">{{$report->patient->gender ?? null ?: 'n/a'}}</td>
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
                                    <div class="panel-heading">
                                        <h4><b class="text-primary">CBC Results</b></h4>
                                    </div>
                                    <div class="row">
                                        <table class="table table-bordered">
                                            <thead>
                                                
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
                                                    <td>{{$report->wbc}}</td>
                                                    <td>4.0 - 10.0</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Neutrophils</span></h5>
                                                    </td>
                                                    <td>{{$report->neno}}</td>
                                                    <td>2.00 - 7.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Lymphocytes</span></h5>
                                                    </td>
                                                    <td>{{$report->lymno}}</td>
                                                    <td>1.00 - 3.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Monocytes</span></h5>
                                                    </td>
                                                    <td>{{$report->mono}}</td>
                                                    <td>0.20 - 1.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Eosinophils</span></h5>
                                                    </td>
                                                    <td>{{$report->eono}}</td>
                                                    <td>0.02 - 0.50

                                                    </td>
                                                </tr>
                                                <tr>
                                            
                                                    <td>
                                                        <h5><span class="badge badge-primary">Basophils</span></h5>
                                                    </td>
                                                    <td>{{$report->bano}}</td>
                                                    <td>0.02 – 0.1

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">Hb</span></h5>
                                                    </td>
                                                    <td>{{$report->hb}}</td>
                                                    <td>13.0 – 17.0

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">HCT(PCV)</span></h5>
                                                    </td>
                                                    <td>{{$report->hct}}</td>
                                                    <td>40.0 – 50.0

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">MCV</span></h5>
                                                    </td>
                                                    <td>{{$report->mcv}}</td>
                                                    <td>83.0 – 99.0

                                                    </td>
                                                </tr>
                                                <tr> 
                                                    <td>
                                                        <h5><span class="badge badge-primary">Platelet Count</span></h5>
                                                    </td>
                                                    <td>{{$report->plt}}</td>
                                                    <td>150 – 410

                                                    </td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>

                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-danger text-white">
                                                                <h4><b>Prediction</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {{$report->disease}}
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                            <td class="bg-success text-white">
                                                                <h4><b>Next bappointement date</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group pull-left">
                                                                    {{$report->next_date}}
                                                                </div>
                                        


                                            </td>
                                            </tr>

                                            <tr>
                                                <td class="bg-primary text-white">
                                                    <h4><b>Docotor comments</b></h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{$report->doctor_comment}}
                                                </td>
                                            </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </div>
                                    @if($report->disease == "CLL")
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
                                    @elseif($report->disease == "HCL")
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
                                        </div><br><br><br><br><br><br>

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
                                    @elseif($report->disease == "CML")
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
                                        </div><br><br><br><br><br><br><br><br><br><br>

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
                                    @elseif($report->disease == "AML")
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
                                    @elseif($report->disease == "Leukemia Positive")
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
                                        </div><br><br><br><br>

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
                    
                                    </div>
                                </div>
    
    
                </div>
            </div>
    </div>
</div>

<script src="main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

</body>
</html>