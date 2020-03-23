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

      <a class="btn btn-sm btn-success" href="/report">Create New Patient</a>

    </div>
    </div><br>


      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>ID</th>
            <th>Age</th>
            <th>Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>183</td>
            <td>John Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-success">Approved</span></td>
            <td>Bacon ipsum dolor </td>
            <td>
            <a class="btn btn-sm btn-success" href="">Show</a>
            <a class="btn btn-sm btn-warning" href="">Edit</a>
                                    
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <td>219</td>
            <td>Alexander Pierce</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-warning">Pending</span></td>
            <td>Bacon ipsum dolor </td>
            <td>adskadsda</td>
          </tr>
          <tr>
            <td>657</td>
            <td>Bob Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-primary">Approved</span></td>
            <td>Bacon ipsum dolor </td>
            <td>adskadsda</td>
          </tr>
          <tr>
            <td>175</td>
            <td>Mike Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-danger">Denied</span></td>
            <td>Bacon ipsum dolor </td>
            <td>adskadsda</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection