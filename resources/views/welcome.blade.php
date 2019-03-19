<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OPORTFOLIO</title>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/welcomeBlade.js') }}"></script>

</head>





<body>


    <!-- <dialog class="dialog">
        <button class="dialog__close">&#10006;</button>
        <form action="#" class="dialog__form">

            <div class="dialog__title"> </div>
            <input type="text" class="dialog__name" placeholder="Логин">
            <input type="password" class="dialog__pass" placeholder="Пароль">
            <button class="dialog__submit" type="submit"></button>
        </form>
    </dialog>
-->
    <div class="wrapper">

        <header class="header">
            <div class="nav">
                <div id="logo"></div>

                <div class="auth">
                    <button class="auth__button" type="button" onClick='location.href="/login"'>Войти</button>
                    <button class="auth__button" type="button" onClick='location.href="/register"'>Зарегистрироваться</button>

                </div>
            </div>


        </header><!-- .header-->

        <main class="content">
            <p align="center">&nbsp;</p>
            <p align="center">&nbsp;</p>
            <p align="center">
                <font size="6"><cite>С нашим сервисом вы сможете:</cite></font>
            </p>
            <p align="center">&nbsp;</p>
            <ul style="margin-left: 40px;">
                <li>
                    <font size="6"><cite>Создать собственный дизайн баннера.</cite></font>
                </li>
            </ul>
            <p>&nbsp;</p>
            <ul style="margin-left: 40px;">
                <li>
                    <font size="6"><cite>Получить ссылку.</cite></font>
                </li>
            </ul>
            <p>&nbsp;</p>
            <ul style="margin-left: 40px;">
                <li>
                    <font size="6"><cite>Разместить на стороннем сайте.</cite></font>
                </li>
            </ul>
            <p>&nbsp;</p>
            <p align="center">
                <font size="6">
                    <font face="Comic Sans MS, cursive">Разместите баннер в </font>
                     <a href="#" class="anim_btn effektA">1 клик</a>
                </font>
            </p>
           
        </main><!-- .content -->

        <footer class="footer">
            <div class="social twitter">
                <a href="https://twitter.com/DimaDiim" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
            </div>
            <div class="social instagram">
                <a href="https://www.instagram.com/dimadiim/" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
            </div>

            <div class="social vk">
                <a href="https://vk.com/dima_eremeev" target="_blank"><i class="fa fa-vk fa-2x"></i></a>
            </div>
        </footer>

    </div><!-- .wrapper -->

</body>

</html>
