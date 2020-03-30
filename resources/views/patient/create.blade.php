@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">Add a new Patient</div>

              <!-- form start -->
              <form role="form" action="{{route('patient.store')}}" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputName">Name</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter New Patient Name">
                    @error('name') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputID">National ID</label>
                    <input type="text" name="national_id" class="form-control" id="inputID" placeholder="Enter New Patient National ID">
                    @error('national_id') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputGender">Gender</label>
                    <input type="text" name="gender" class="form-control" id="inputGender" placeholder="Enter New Patient Gender">
                    @error('gender') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputAge">Age</label>
                    <input type="numeric" name="age" class="form-control" id="inputAge" placeholder="Enter New Patient Age">
                    @error('age') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="InputNumber">Contact Number</label>
                    <input type="number" name="mobile_number" class="form-control" id="inputNumber" placeholder="Enter New Patient Contact Number">
                    @error('mobile_number') {{ $message }} @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                @csrf
                <div class="card-footer">
                    <a href="{{route('patient.index')}}" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection