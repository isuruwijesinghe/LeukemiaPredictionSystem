@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Patients</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body table-responsive p-0">

    <div class="container-fluid">
    <div class="row pull-right">

      <!-- <a class="btn btn-sm btn-success" href="/report">Create New Patient</a> -->
      <a class="btn btn-sm btn-success" href="{{ route('patient.create') }}">Create New Patient</a>

    </div>
    </div><br>


      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th width="75px">No</th>
            <th width="400px">Name</th>
            <th width="200px">ID</th>
            <th width="180px">Age</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($patients as $patient)
          <tr>
            <td>{{++$i}}.</td>
            <td>{{$patient->name}}</td>
            <td>{{$patient->national_id}}</td>
            <td>{{$patient->age}}</td>
            <td>
            <a class="btn btn-sm btn-success" href="">Show</a>
            <a class="btn btn-sm btn-warning" href="">Edit</a>
                                    
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection