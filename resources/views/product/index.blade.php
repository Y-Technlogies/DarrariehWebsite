@extends('welcome')

@section('content')

    <div class="bg-white pl-2 pt-2 row">
        <a href="https://wa.me/+96567757713" target="_blank" class="col-1">
            <i class="fa fa-whatsapp fa-2x" style="color: darkgreen; vertical-align: middle;"></i>
        </a>
        <p style="text-align: center;" class="col-11">
            <span style="font-weight: 600;">
                الموقع تحت قيد الإنشاء ويستمر في التحديث أكثر ، يرجى الاتصال في واتساب لأية استفسارات أو طلبات
            </span>
        </p>
    </div>
    @include('partials.offers')
    @include('partials.list')
@stop