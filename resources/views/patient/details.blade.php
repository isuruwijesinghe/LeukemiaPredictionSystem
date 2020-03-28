@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Patients Details</h3>
      </div>
    </div>

                <div class="panel-body">
                    <div class="row-fluid  pull-right">
                        <a class="btn btn-sm btn-primary" href="{{url('/report', $patient->id)}}">Add a new Reoprt</a>
                    </div>
                    <div class="container-fluid">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Name : </strong> {{$patient->name}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>National ID : </strong> {{$patient->national_id}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Age : </strong> {{$patient->age}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong>Mobile Number : </strong> {{$patient->mobile_number}}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="{{ url('/home')}}" class="btn btn-sm btn-success">Back</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
  <!-- /.card -->
</div>

<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Patient Past Records</h3>
      </div>
    </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="reportsTable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>WBC</th>
                                    <th>Neut.</th>
                                    <th>Lymp.</th>
                                    <th>Mono.</th>
                                    <th>Eosi.</th>
                                    <th>Basi.</th>
                                    <th>Hb</th>
                                    <th>HCT</th>
                                    <th>MCV</th>
                                    <th>Platelet</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                            @if(!$reportsData->isEmpty())
                            @foreach($reportsData as $reportData)
                            <tr>
                                <td>{{$reportData->created_at or 'n/a'}}</td>
                                <td>{{$reportData->wbc or 'n/a'}}</td>
                                <td>{{$reportData->neno or 'n/a'}}</td>
                                <td>{{$reportData->lymno or 'n/a'}}</td>
                                <td>{{$reportData->mono or 'n/a'}}</td>
                                <td>{{$reportData->eono or 'n/a'}}</td>
                                <td>{{$reportData->bano or 'n/a'}}</td>
                                <td>{{$reportData->hb or 'n/a'}}</td>
                                <td>{{$reportData->hct or 'n/a'}}</td>
                                <td>{{$reportData->mcv or 'n/a'}}</td>
                                <td>{{$reportData->plt or 'n/a'}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" target="_blank" href="{{$reportData->pdf_name or '#'}}">VIEW</a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
  <!-- /.card -->
</div>
@endsection

@section('scripts')
<script>
$(document).ready( function () {
    $('#reportsTable').DataTable({
        responsive: true,
        "ordering": false
    });
} );
</script>
@endsection