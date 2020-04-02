@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">CBC Report</div>

              <!-- form start -->
              <form role="form" action="/confirm" method="post">
                <div class="card-body">
                <input type="hidden" name="patient_id" value="{{$patient_id}}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">WBC</label>
                    <input type="numeric" name="WBC" class="form-control" id="inputWBC" value="{{$newArray[0] ?? null ?: 0}}" placeholder="Enter WBC count">
                    @error('WBC') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Neutrophils</label>
                    <input type="numeric" name="Neutrophils" class="form-control" id="inputNe" value="{{$newArray[1] ?? null ?: 0}}"  placeholder="Enter Neutrophils count">
                    @error('Neutrophils') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lymphocytes</label>
                    <input type="numeric" name="Lymphocytes" class="form-control" id="inputLym" value="{{$newArray[2] ?? null ?: 0}}"  placeholder="Enter Lymphocytes count">
                    @error('Lymphocytes') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Monocytes</label>
                    <input type="numeric" name="Monocytes" class="form-control" id="inputMono" value="{{$newArray[3] ?? null ?: 0}}"  placeholder="Enter Monocytes count">
                    @error('Monocytes') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Eosinophils</label>
                    <input type="numeric" name="Eosinophils" class="form-control" id="inputEos" value="{{$newArray[4] ?? null ?: 0}}"  placeholder="Enter Eosinophils count">
                    @error('Eosinophils') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Basophils</label>
                    <input type="numeric" name="Basophils" class="form-control" id="inputBaso" value="{{$newArray[6] ?? null ?: 0}}"  placeholder="Enter Basophils count">
                    @error('Basophils') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">MCV</label>
                    <input type="numeric" name="MCV" class="form-control" id="inputMCV" value="{{$newArray[11] ?? null ?: 0}}"  placeholder="Enter MCV count">
                    @error('MCV') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hb</label>
                    <input type="numeric" name="Hb" class="form-control" id="inputHb" value="{{$newArray[7] ?? null ?: 0}}"  placeholder="Enter Hb count">
                    @error('Hb') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">HCT</label>
                    <input type="numeric" name="HCT" class="form-control" id="inputHCT" value="{{$newArray[8] ?? null ?: 0}}"  placeholder="Enter HCT count">
                    @error('HCT') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Platelet Count</label>
                    <input type="numeric" name="PlateletCount" class="form-control" id="inputPlatelet" value="{{$newArray[10] ?? null ?: 0}}"  placeholder="Enter Platelet Count">
                    @error('PlateletCount') {{ $message }} @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                @csrf
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

              
