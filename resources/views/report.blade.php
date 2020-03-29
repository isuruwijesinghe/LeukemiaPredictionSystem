@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2><b class="text-primary">Leukemia Diagnosis Report</b></h2>
                </div>
                <div class="panel-body">
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
                                                    <td style="width: 35%">{{$create_report->patient->name or 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Age</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->age or 'n/a'}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>National ID</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->national_id or 'n/a'}}</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Mobile Number</b></td>
                                                    <td style="width: 35%">{{$create_report->patient->mobile_number or 'n/a'}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Gender</b></td>
                                                    <td style="width: 35%">Male</td>
                                                    <td class="font-weight-bold" style="width: 15%"><b>Date</b></td>
                                                    <td style="width: 35%">12/10/2019</td>
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
                                                        <h5><span class="badge badge-success">RBC</span></h5>
                                                    </td>
                                                    <td>{{$create_report->rbc}}</td>
                                                    <td>4.5 - 6.1</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">HB</span></h5>
                                                    </td>
                                                    <td>{{$create_report->hb}}</td>
                                                    <td>13.2 - 17.2
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">MCV</span></h5>
                                                    </td>
                                                    <td>{{$create_report->mcv}}</td>
                                                    <td>80 - 100
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">MCH</span></h5>
                                                    </td>
                                                    <td>{{$create_report->mch}}</td>
                                                    <td>26.1 - 30.6
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">MCHC</span></h5>
                                                    </td>
                                                    <td>{{$create_report->mchc}}</td>
                                                    <td>30.8 - 34.9

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h5><span class="badge badge-primary">RDW</span></h5>
                                                    </td>
                                                    <td>{{$create_report->rdw}}</td>
                                                    <td>11.8 – 15.6

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
                                                                <h4><b>Diagnosis</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>
                                                                    {{$create_report->disease}}
                                                                </b></td>
                                                        </tr>
                                                        <tr>
                                                            <input type="hidden" name="report_id" value="{{$report_id}}">

                                                            <td class="bg-primary text-white">
                                                                <h4><b>Next blood count date</b></h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group pull-left">
                                                                    <input class="form-control datepicker" id="date_order" name="date_order">
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
                                                                <textarea class="form-control" rows="3" name="doctor_cmnt"></textarea>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div id="ThalassemiaMajor">
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

                                                            <td>Fatigue</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weakness</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pale or yellowish skin</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Facial bone deformities </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Slow growth </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dark urine </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Abdominal swelling </td>
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
                                                            <td>Thalassemia occurs when there’s an abnormality or mutation in one of the globin genes involved in hemoglobin production. You inherit this genetic defect from your parents</td>
                                                        </tr>
                                                        <tr>
                                                            <td>If only one of your parents is a carrier for thalassemia, you have a 50% chance of developing a form of the disease known as thalassemia minor. If this occurs, you probably won’t have symptoms, but you’ll be a carrier of the disease</td>
                                                        </tr>
                                                        <tr>
                                                            <td>If both of your parents are carriers of thalassemia, you have a 25% chance of inheriting a more serious form of the disease</td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="IronDeficiency">
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

                                                            <td>Extreme fatigue</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weakness</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pale skin</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Chest pain, fast heartbeat or shortness of breath </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Headache, dizziness or lightheadedness </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cold hands and feet </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Inflammation or soreness of your tongue </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Brittle nails </td>
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
                                                            <td>Blood contains iron within red blood cells. So, if you lose blood, you lose some iron. Women with heavy periods are at risk of iron deficiency anemia because they lose blood during menstruation. Slow, chronic blood loss within the body — such as from a peptic ulcer, a hiatal hernia, a colon polyp or colorectal cancer — can cause iron deficiency anemia. </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Your body regularly gets iron from the foods you eat. If you consume too little iron, over time your body can become iron deficient. Examples of iron-rich foods include meat, eggs, leafy green vegetables and iron-fortified foods. For proper growth and development, infants and children need iron from their diets, too.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Iron from food is absorbed into your bloodstream in your small intestine. An intestinal disorder, such as celiac disease, which affects your intestine's ability to absorb nutrients from digested food, can lead to iron deficiency anemia. If part of your small intestine has been bypassed or removed surgically, that may affect your ability to absorb iron and other nutrients. </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Without iron supplementation, iron deficiency anemia occurs in many pregnant women because their iron stores need to serve their own increased blood volume as well as be a source of hemoglobin for the growing fetus. </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="AnemiaofChronic">
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
                                                            <td>Fast heartbeat</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Body aches</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Feeling tired or weak</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Getting tired easily during or after physical activity </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pale skin </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shortness of breath
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
                                                            <td>Your kidneys may produce less erythropoietin (EPO), a hormone that signals your bone marrow—the spongy tissue inside most of your bones—to make red blood cells.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Your bone marrow may not respond normally to EPO, making fewer red blood cells than needed.
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Your red blood cells may live for a shorter time than normal, causing them to die faster than they can be replaced. </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Without iron supplementation, iron deficiency anemia occurs in many pregnant women because their iron stores need to serve their own increased blood volume as well as be a source of hemoglobin for the growing fetus. </td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $('#date_order').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '+1d'
    });

    function myFunction() {
        var thala = document.getElementById("ThalassemiaMajor");
        var iron = document.getElementById("IronDeficiency");
        var acd = document.getElementById("AnemiaofChronic");
        // console.log({{$create_report->disease}});
        if ("{{$create_report->disease}}" == "ThalassemiaMajor") {
         
            $("#ThalassemiaMajor").show();
            $("#IronDeficiency").hide();
            $("#AnemiaofChronic").hide();

        } else if ("{{$create_report->disease}}" == "IronDeficiency") {
     
            $("#ThalassemiaMajor").hide();
            $("#IronDeficiency").show();
            $("#AnemiaofChronic").hide();

        } else if ("{{$create_report->disease}}" == "AnemiaofChronic") {
          
            $("#ThalassemiaMajor").hide();
            $("#IronDeficiency").hide();
            $("#AnemiaofChronic").show();
        } else if ("{{$create_report->disease}}" == "Normal"){
           
            $("#ThalassemiaMajor").hide();
            $("#IronDeficiency").hide();
            $("#AnemiaofChronic").hide();
        } else{

        }
    }
    myFunction();
</script>
@endsection 