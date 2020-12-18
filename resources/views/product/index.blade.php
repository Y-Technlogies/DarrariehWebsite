@extends('welcome')

@section('content')
    <marquee class="h4 bg-danger margin-fix-full" style="color: yellow; font-weight: 700;">{{ setting('site.offer_title') }}</marquee>
   @include('partials.list')
@stop