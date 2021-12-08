<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/media/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/media/bootstrap/css/style.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/35fwwbnhirflx3s8m4jg0atfen3af8rg5u6oa6u126lalwut/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="icon" href="/icon/favicon.ico" type=" image/x-icon">
    <link rel="icon" href="/icon/favicon.svg" type=" image/svg+xml">
    <link rel="icon" href="/icon/favicon.png" type=" image/png">
    <title>{{$title??config('app.name')}}</title>
    <meta name="description" content="{{$description??''}}">
    <meta name="keywords" content="{{$keywords??''}}">
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


<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(50065045, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/50065045" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
