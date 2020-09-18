@extends('welcome')

@section('content')
    <div class="row mt-2">
        <div class="col-sm-12">
            @if($isArabic)
                @if ($status === 'success')
                    <div class="alert alert-info alert-block text-right">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close float-left" data-dismiss="alert">×</button>
                    </div>
                @endif


                @if ($status === 'error')
                    <div class="alert alert-danger alert-block text-right">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close float-left" data-dismiss="alert">×</button>
                    </div>
                @endif
            @else
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
            @endif
        </div>
    </div>

    @include('partials.confirm')
@stop