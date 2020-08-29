@extends('welcome')

@section('content')

    <div class="row bg-white">
        <div id="carouselExampleIndicators" class="carousel slide col-sm-12 pl-0 pr-0" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://via.placeholder.com/150" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/150" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://via.placeholder.com/150" alt="First slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="product-info">
            <span>158.43 SAR</span>
            <p class="product-description">Spliced dress printed mopping spring and autumn long-sleeved dress
                <span class="product-id">18233841</span>
            </p>
        </div>
    </div>

    <div class="row bg-white mt-3 details">
        <span>Item Descriptions</span>
        <table class="table table-bordered mt-3">
            <tbody>
            <tr>
                <td>
                    Season
                </td>
                <td>
                    Autumn,Summer
                </td>
            </tr>
            <tr>
                <td>
                    Style
                </td>
                <td>
                    Arabic,Folk style,Western style
                </td>
            </tr>
            <tr>
                <td>
                    Details
                </td>
                <td>
                    Embroidery,Hollow out,Splicing
                </td>
            </tr>
            <tr>
                <td>
                    Pattern
                </td>
                <td>
                    Color splicing
                </td>
            </tr>
            <tr>
                <td>
                    Clothing noun
                </td>
                <td>
                    Dresses,Skirt
                </td>
            </tr>
            <tr>
                <td>
                    Applicable scene
                </td>
                <td>
                    Festival,Leisure
                </td>
            </tr>
            <tr>
                <td>
                    Fabric
                </td>
                <td>
                    Polyester
                </td>
            </tr>
            <tr>
                <td>
                    Suitable age
                </td>
                <td>
                    25-29 years old,30-34 years old
                </td>
            </tr>
            <tr>
                <td>
                    Style
                </td>
                <td>
                    Blue,Green,Purple,Red,Yellow
                </td>
            </tr>
            <tr>
                <td>
                    Size
                </td>
                <td>
                    M,L,XL,XXL
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    @include('partials.list')

    @include('partials.bottom-nav')

    <div class="clearfix" style="height: 50px"></div>
@stop