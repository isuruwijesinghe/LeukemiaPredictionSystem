@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">CBC Report</div>

              <!-- form start -->
              <form role="form" action="/report" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">WBC</label>
                    <input type="numeric" name="WBC" class="form-control" id="inputWBC" placeholder="Enter WBC count">
                    @error('WBC') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Neutrophils</label>
                    <input type="numeric" name="Neutrophils" class="form-control" id="inputNe" placeholder="Enter Neutrophils count">
                    @error('Neutrophils') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Lymphocytes</label>
                    <input type="numeric" name="Lymphocytes" class="form-control" id="inputLym" placeholder="Enter Lymphocytes count">
                    @error('Lymphocytes') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Monocytes</label>
                    <input type="numeric" name="Monocytes" class="form-control" id="inputMono" placeholder="Enter Monocytes count">
                    @error('Monocytes') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Eosinophils</label>
                    <input type="numeric" name="Eosinophils" class="form-control" id="inputEos" placeholder="Enter Eosinophils count">
                    @error('Eosinophils') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Basophils</label>
                    <input type="numeric" name="Basophils" class="form-control" id="inputBaso" placeholder="Enter Basophils count">
                    @error('Basophils') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">MCV</label>
                    <input type="numeric" name="MCV" class="form-control" id="inputMCV" placeholder="Enter MCV count">
                    @error('MCV') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hb</label>
                    <input type="numeric" name="Hb" class="form-control" id="inputHb" placeholder="Enter Hb count">
                    @error('Hb') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">HCT</label>
                    <input type="numeric" name="HCT" class="form-control" id="inputHCT" placeholder="Enter HCT count">
                    @error('HCT') {{ $message }} @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Platelet Count</label>
                    <input type="numeric" name="PlateletCount" class="form-control" id="inputPlatelet" placeholder="Enter Platelet Count">
                    @error('PlateletCount') {{ $message }} @enderror
                  </div>
                </div>
                <!-- /.card-body -->
                @csrf
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection

              
