<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title> {{ucfirst($page)}} - {{config('app.name')}}</title>
    <!-- CSS files -->
    <link href="{{asset('dist/css/tabler.min.css')}}?{{time()}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-flags.min.css')}}?{{time()}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-payments.min.css')}}?{{time()}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/tabler-vendors.min.css')}}?{{time()}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/demo.min.css')}}?{{time()}}" rel="stylesheet"/>
    <link href="{{asset('dist/css/demo.xmin.css')}}?{{time()}}" rel="stylesheet"/>
    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body >
<script src="{{asset('dist/js/demo-theme.min.js')}}?{{time()}}"></script>
<div class="page">
    <!-- Navbar -->
    <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href=".">
{{--                    <img src="{{asset('static/logo.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">--}}
                    {{config('app.name')}}
                </a>
            </h1>

        </div>
    </header>
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <li class="nav-item @if($page==='home') active @endif">
                            <a class="nav-link" href="{{route('home')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                           stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path
                              d="M5 12l-2 0l9 -9l9 9l-2 0"/><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/><path
                              d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/></svg>
                    </span>
                                <span class="nav-link-title">
                      Home
                    </span>
                            </a>
                        </li>
                        <li class="nav-item @if($page==='deposit') active @endif">
                            <a class="nav-link" href="{{route('transactions.deposit')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.004h-5.343c-2.572 -.004 -4.657 -2.011 -4.657 -4.487c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.38 0 2.57 .811 3.128 1.986" /><path d="M19 22v-6" /><path d="M22 19l-3 -3l-3 3" /></svg>
                    </span>
                                <span class="nav-link-title">
                      Deposit
                    </span>
                            </a>
                        </li>
                        <li class="nav-item @if($page==='withdraw') active @endif">
                            <a class="nav-link" href="{{route('transactions.withdraw')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 18.004h-5.343c-2.572 -.004 -4.657 -2.011 -4.657 -4.487c0 -2.475 2.085 -4.482 4.657 -4.482c.393 -1.762 1.794 -3.2 3.675 -3.773c1.88 -.572 3.956 -.193 5.444 1c1.488 1.19 2.162 3.007 1.77 4.769h.99c1.38 0 2.573 .813 3.13 1.99" /><path d="M19 16v6" /><path d="M22 19l-3 3l-3 -3" /></svg>
                    </span>
                                <span class="nav-link-title">
                      Withdraw
                    </span>
                            </a>
                        </li>
                        <li class="nav-item @if($page==='transfer') active @endif">
                            <a class="nav-link" href="{{route('transactions.transfer')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 9.897c0 -1.714 1.46 -3.104 3.26 -3.104c.275 -1.22 1.255 -2.215 2.572 -2.611c1.317 -.397 2.77 -.134 3.811 .69c1.042 .822 1.514 2.08 1.239 3.3h.693a2.42 2.42 0 0 1 2.425 2.414a2.42 2.42 0 0 1 -2.425 2.414h-8.315c-1.8 0 -3.26 -1.39 -3.26 -3.103z" /><path d="M12 13v3" /><path d="M12 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M14 18h7" /><path d="M3 18h7" /></svg>
                    </span>
                                <span class="nav-link-title">
                      Transfer
                    </span>
                            </a>
                        </li>
                        <li class="nav-item @if($page==='statement') active @endif">
                            <a class="nav-link" href="{{route('transactions.statement')}}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 17h6" /><path d="M9 13h6" /></svg>
                    </span>
                                <span class="nav-link-title">
                      Statement
                    </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="logout()" style="cursor: pointer">
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                       <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" /><path d="M9 12h12l-3 -3" /><path d="M18 15l3 -3" /></svg>
                    </span>
                                <span class="nav-link-title">
                      Logout
                    </span>
                            </a>
                        </li>

                    </ul>
{{--                    <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">--}}
{{--                        <form action="./" method="get" autocomplete="off" novalidate>--}}
{{--                            <div class="input-icon">--}}
{{--                    <span class="input-icon-addon">--}}
{{--                      <!-- Download SVG icon from http://tabler-icons.io/i/search -->--}}
{{--                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>--}}
{{--                    </span>--}}
{{--                                <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </header>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            @yield('page-title')
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
            @yield('content')
{{--                <div class="row row-cards">--}}
{{--                    <div class="col-12">--}}

{{--                    </div>--}}
{{--                </div>--}}
            </div>
            </div>
        </div>
        <footer class="footer footer-transparent d-print-none">
            <div class="container-xl">
                <div class="row text-center align-items-center flex-row-reverse">
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                        <ul class="list-inline list-inline-dots mb-0">
                            <li class="list-inline-item">
                                Copyright &copy; 2023
                                <a href="." class="link-secondary">Company</a>.
                                All rights reserved.
                            </li>
                            <li class="list-inline-item">
                                <a href="./changelog.html" class="link-secondary" rel="noopener">
                                    v1.0.0-beta19
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Libs JS -->
<script src="{{asset('dist/libs/nouislider/dist/nouislider.min.js')}}?{{time()}}" defer></script>
<script src="{{asset('dist/libs/litepicker/dist/litepicker.js')}}?{{time()}}" defer></script>
<script src="{{asset('dist/libs/tom-select/dist/js/tom-select.base.min.js')}}?{{time()}}" defer></script>
<!-- Tabler Core -->
<script src="{{asset('dist/js/tabler.min.js')}}?{{time()}}" defer></script>
<script src="{{asset('dist/js/demo.min.js')}}?{{time()}}" defer></script>
<script>
    function logout(e) {
        let form = document.createElement('form')
        form.setAttribute("method", "post");
        form.setAttribute("action", "{{route('auth.logout')}}");
        let element = document.createElement('input')
        element.setAttribute('type','hidden');
        element.setAttribute('name',"_token");
        element.setAttribute('value','{{csrf_token()}}')
        form.appendChild(element);
        document.getElementsByTagName("body")[0]
            .appendChild(form);
        form.submit();
        return true;
        console.log("here")
    }
</script>
</body>
</html>
