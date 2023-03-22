<!DOCTYPE html>
<html lang="en" class="dark scroll-smooth" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Tailwind CSS Saas & Software Landing Page Template">
        <meta name="keywords" content="agency, application, business, clean, creative, cryptocurrency, it solutions, modern, multipurpose, nft marketplace, portfolio, saas, software, tailwind css">
        <meta name="author" content="Shreethemes">
        <meta name="website" content="https://shreethemes.in">
        <meta name="email" content="support@shreethemes.in">
        <meta name="version" content="1.0.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="shortcut icon" href="{{asset('/assets/images/favicon.ico')}}">
        <link href="{{asset('/assets/libs/tiny-slider/tiny-slider.css')}}" rel="stylesheet">
        <link href="{{asset('/assets/libs/@iconscout/unicons/css/line.css')}}" type="text/css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/assets/css/icons.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/css/tailwind.css')}}">

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        <script src="{{asset('assets/libs/tiny-slider/min/tiny-slider.js')}}"></script>
        <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.init.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://js.stripe.com/v3/"></script>

    </body>
</html>
