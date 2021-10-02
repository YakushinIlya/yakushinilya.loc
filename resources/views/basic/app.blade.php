<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/media/bootstrap/css/style.css" rel="stylesheet">
    <title>{{$title??config('app.name')}}</title>
</head>
<body>

<header>
    <div class="container">
        <div class="row header-bg">
            <div class="col-6 col-md-3 header-bg__logo">
                <a href="/">
                    <img src="/media/img/logo-smoll.png" class="d-block d-md-none img-fluid">
                    <img src="/media/img/logo.png" class="d-none d-md-block img-fluid">
                </a>
            </div>
            <div class="col-6 col-md-9 header-bg__menu">
                <nav class="navbar navbar-expand-lg navbar-light mt-13px">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                                @include('basic._navigation-top')
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('content')
            </div>
            <div class="col-md-4">
                <aside>
                    @include('basic._sidebar')
                </aside>
            </div>
        </div>
    </div>
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 copyright">
                &copy; {{date('Y')}}
            </div>
        </div>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/media/bootstrap/js/bootstrap.min.js"></script>
<script src="/media/bootstrap/js/script.js"></script>
</body>
</html>
