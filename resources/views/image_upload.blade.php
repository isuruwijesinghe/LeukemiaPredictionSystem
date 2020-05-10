@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-sm-3">
            <div class="panel-body center-block text-center">
                <div class="panel-heading">
                <h2><b class="text-primary">Upload CBC Report</b></h2>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                    <div class="col-md-12">
                        <!-- image upload view -->
                        <form role="form" method="POST" action="{{ url('/image_upload') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="patient_id" value="{{$id}}">
                            <div class="form-group row">

                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                @if ($errors->has('image'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
@endsection 