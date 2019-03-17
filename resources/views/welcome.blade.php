<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/welcomeBlade.js') }}"></script>
</head>
<!--  <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
-->




<body>

    <dialog class="dialog">  
       <button class="dialog__close">&#10006;</button>    
        <form action="#" class="dialog__form">
           
            <div class="dialog__title"> </div>
            <input type="text" class="dialog__name" placeholder="Логин">
            <input type="password" class="dialog__pass" placeholder="Пароль">
            <button class="dialog__submit" type="submit"></button>
        </form>
    </dialog>

    <div class="wrapper">

        <header class="header">
            <div class="nav">
                <div id="logo"></div>
                <div class="auth">
                    <button class="auth__button" id="logIn" type="button">Войти</button>
                    <button class="auth__button" id="signIn" type="button">Зарегистрироваться</button>

                </div>
            </div>


        </header><!-- .header-->

        <main class="content">

        </main><!-- .content -->

        <footer class="footer">

        </footer><!-- .footer -->

    </div><!-- .wrapper -->

</body>

</html>
