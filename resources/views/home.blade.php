@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card shadow">
    <div class="card-header border-0">
      <h3 class="card-title">Patients</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm pt-2" style="width: 150px;">
        <!-- create new patient button  -->
        <a class="btn btn-sm btn-success" href="{{ route('patient.create') }}">Create New Patient</a>
        </div>
      </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body table-responsive p-0">
    
    <!-- success or error message  -->
    @if ($message = Session::get('success'))
    <div style="margin-top: 20px;" class="alert alert-success">
      <p>{{$message}}</p>
    </div>
    @endif
    <div class="col pt-3 pb-3">
      <table class="table table-hover text-nowrap" id="table" width="100%">
        <thead>
          <tr>
            <th width="75px">No</th>
            <th width="300px">Name</th>
            <th width="200px">ID</th>
            <th width="100px">Gender</th>
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
            <td>{{$patient->gender}}</td>
            <td>{{$patient->age}}</td>
            <td>
            <form action="{{ route('patient.destroy', $patient->id) }}" method="post">
            {{ csrf_field() }}
            <a class="btn btn-sm btn-success" href="{{route('patient.show',$patient->id)}}">Show</a>
            <a class="btn btn-sm btn-warning" href="{{route('patient.edit',$patient->id)}}">Edit</a>
            {{ method_field('DELETE') }}                        
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection

@section('scripts')
<script type="text/javascript">  
$(document).ready(function() {
    $('#table').DataTable({
      "order": [],
    "aoColumns": [
    { "bSortable": true },
    { "bSortable": true },
    { "bSortable": true },
    { "bSortable": true },
    { "bSortable": true },
    { "bSortable": false }
],
responsive: true
      
});
} );
</script>
@endsection 