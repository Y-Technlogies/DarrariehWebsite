@extends('welcome')

@section('content')
    <div class="row mt-2">
        <div class="col-sm-12">
            @if ($status === 'success')
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif


            @if ($status === 'error')
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>

    @include('partials.confirm')
@stop