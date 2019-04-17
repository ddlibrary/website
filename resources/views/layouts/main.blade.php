<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <!-- Twitter Card data -->
    <meta name="twitter:card" value="@yield('description')">

    <!-- Open Graph data -->
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:image" content="@yield('page_image')" />
    <meta property="og:description" content="@yield('description')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('storage/files/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    @stack('styles')

    <!-- Start of Async Drift Code -->
    <script>
        "use strict";

        !function() {
        var t = window.driftt = window.drift = window.driftt || [];
        if (!t.init) {
            if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
            t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
            t.factory = function(e) {
            return function() {
                var n = Array.prototype.slice.call(arguments);
                return n.unshift(e), t.push(n), t;
            };
            }, t.methods.forEach(function(e) {
            t[e] = t.factory(e);
            }), t.load = function(t) {
            var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
            o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
            var i = document.getElementsByTagName("script")[0];
            i.parentNode.insertBefore(o, i);
            };
        }
        }();
        drift.SNIPPET_VERSION = '0.3.1';
        drift.load('r5r6mvw2c92i');
    </script>
    <!-- End of Async Drift Code -->
    @if(App::environment('production'))
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-6207513-43"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-6207513-43');
    </script>
    @endif

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        //paste this code under the head tag or in a separate js file.
        // Wait for window load
        $(window).on('load', function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
</head>
<body>
    <div class="se-pre-con"></div>
    @include('layouts.banner')
    @yield('search')
    <main>

        @if (Request::is(Lang::locale().'/home'))
            @include('../survey/survey_view')
        @elseif (Request::is(Lang::locale()))
            @include('../survey/survey_view')
        @elseif (Request::is(Lang::locale().'/resource/*'))
            @include('../survey/survey_view')
        @elseif (Request::is(Lang::locale().'/resources/*'))
            @include('../survey/survey_view')
        @endif
        
        @yield('content')

    </main>
    @include('layouts.footer')
    <!-- Optional JavaScript -->
    <script async src="{{ asset('js/all.js') }}"></script>
    @stack('scripts')   
</body>
</html>