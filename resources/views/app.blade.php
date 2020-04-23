<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no" />

    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="theme-color" content="#ff6900">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pizzalicious</title>
    <meta name="keywords" content="Pizzalicious" />
    <meta name="description" content="Delicious pizza for everyone" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" href="/favicon.ico">

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="page-wrapper d-flex flex-column" id="app">

            <header>
                <div class="fixed-top border border-bottom shadow bg-white">
                    <div class="container">
                        <div class="row justify-content-between align-items-center py-2">

                            <div class="col-auto d-block d-md-none pr-0">
                                <burger :menu-opened.sync="menuOpened"></burger>
                            </div>

                            <div class="col col-sm-auto">
                                <div class="logo">
                                    <a href="/" class="logo__link d-flex align-items-center text-decoration-none justify-content-center justify-content-md-start">
                                        <img src="/images/assets/logo.webp" alt="Pizzalicious" class="logo__image">
                                        <span class="logo__slogon h3 mb-0 ml-2">Pizzalicious</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-auto col-sm px-0 px-md-2">
                                <navigation :menu-opened.sync="menuOpened"></navigation>
                            </div>

                            <div class="col-auto">
                                <currency-toggler></currency-toggler>
                            </div>

                            <div class="col-auto pl-0">
                                <basket-button></basket-button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="header-placeholder"></div>
            </header>

            <section class="center-part flex-grow-1 py-4">

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>


            </section>

            <footer class="bg-light">
                <div class="container">
                    <div class="row py-2 align-items-center">
                        <div class="col-12 col-md my-2 text-center text-md-left order-0">
                            <a href="/" class="logo__link d-inline-block text-decoration-none justify-content-center justify-content-md-start">
                                <span class="logo__slogon d-inline-block h4 m-0">Pizzalicious</span><br />
                                <span><small class="text-muted">Dream comes true</small></span>
                            </a>
                        </div>
                        <div class="col-12 col-md my-2 text-center order-2 order-md-1">
                            Baked in 2020 by <br /><a href="https://github.com/mikesvis" class="text-primary" target="_blank"><em class="fab fa-github mr-2 fa-lg"></em>mikesvis</a>
                        </div>
                        <div class="col-12 col-md my-2 order-1 order-md-2">
                            <div class="h6 text-muted m-0 text-center text-md-right">Saint-Petersburg<br />Pizza st., 18/29</div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>

        <script src="{{ mix('/js/manifest.js') }}"></script>
        <script src="{{ mix('/js/vendor.js') }}"></script>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
    </html>
