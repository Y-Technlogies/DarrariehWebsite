@extends('welcome')

@section('content')
   @include('partials.list', ['products' => $products])
@stop