@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Patient Details</h3>
      </div>
    </div>
                <div class="panel-body">

                    <div class="container-fluid">
                        <div class="row">
                            
                        </div>

                        @if ($errors->any())
                        dd($error)
                        <div class="alert alert-danger">
                            <strong>Whoops! </strong> there where some problems with your input.<br>
                            <ul>
                                @foreach ($errors as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{route('patient.update',$patient->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <!-- @method('PUT') -->
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>ID :</strong>
                                    <input type="text" name="national_id" class="form-control" value="{{$patient->national_id}}">
                                </div>
                                <div class="col-md-12">
                                    <strong>Name :</strong>
                                    <input type="text" name="name" class="form-control" value="{{$patient->name}}">
                                </div>
                                <div class="col-md-12">
                                    <strong>Age:</strong>
                                    <input type="text" name="age" class="form-control" value="{{$patient->age}}">
                                </div>
                                <div class="col-md-12">
                                    <strong>Gender:</strong>
                                    <input type="text" name="gender" class="form-control" value="{{$patient->gender}}">
                                </div>
                                <div class="col-md-12">
                                    <strong>Contact Number:</strong>
                                    <input type="text" name="mobile_number" class="form-control" value="{{$patient->mobile_number}}">
                                </div>

                                <div class="col-md-12" style="margin-top: 10px;">
                                    <a href="{{ url('/home')}}" class="btn btn-sm btn-success">Back</a>
                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 