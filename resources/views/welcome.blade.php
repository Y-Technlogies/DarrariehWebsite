<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

		@if (env('APP_ENV') === 'local')
			<link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet" type="text/css" >
		@else
			<link href="{{ URL::asset('public/css/custom.css') }}" rel="stylesheet" type="text/css" >
		@endif
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lemonada&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid full-screen-fix">
            @include('partials.lang-bar')

            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            var page = 1;
            load(page);
            $(window).scroll(function () {
                if($(window).scrollTop() + $(window).height() >= $(document).height()){                    
                    page++;
                    load(page);
                }
            });

            function load(page) {
                $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        datatype: "html",
                        beforeSend: function()
                        {
                            $('.loading').show();
                        }
                    })
                    .done(function(data)
                    {
                        if(data.length == 0){
                            console.log(data.length);
                            //notify user if nothing to load
                            $('.loading').html('<span class="mx-auto d-block text-center">No more records</span>');
                            return;
                        }
                        $('.loading').hide();
                        $('.products').append(data); //append data into #results element
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                        alert('No response from server');
                    });
            }
        </script>
    </body>
</html>
