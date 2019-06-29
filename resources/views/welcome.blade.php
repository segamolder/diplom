@extends('layouts.app')

@section('content')
    <div class="slider">
        <div class="text">
            <div class="title">DMITRYI EREMEEV</div>
            <div class="subtitle">Создание баннеров и размещение на сайте</div>
        </div>
    </div>
    <div class="second-block">
        <div class="second-block__title">С нашим сервисом вы можете <br> создать баннер и разместить его <br> в
            несколько простых этапов:
        </div>
        <div class="second-block__triggers">
            <div class="second-block__triggers__trigger">
                <i class="far fa-lightbulb fa-4x second-block__bulb-icon"></i><br>
                <p>Придумайте идею</p>
            </div>
            <div class="second-block__triggers__trigger">
                <i class="far fa-edit fa-4x"></i><br>
                <p>Создайте баннер</p>
            </div>
            <div class="second-block__triggers__trigger">
                <i class="fas fa-link fa-4x second-block__link-icon"></i><br>
                <p>Получите ссылку</p>
            </div>
            <div class="second-block__triggers__trigger">
                <i class="fas fa-globe-europe fa-4x second-block__earth-icon"></i><br>
                <p>Разместите на сайте</p>
            </div>
        </div>
    </div>
    <div class="create_banner_with_us">
        <div class="image_banner"></div>
        <div class="textforimage"><p>Размещайте баннеры на популярных ресурсах!</p></div>
    </div>

    <div class="footer">
        <div class="social-icons">
            <a href="https://twitter.com/DimaDiim" target="_blank"><i style="margin-right: 2vw" class="fab fa-twitter fa-2x"></i></a>

            <a href="https://www.instagram.com/dimadiim/" target="_blank"><i style="color: white; margin-right: 2vw" class="fab fa-2x fa-instagram"></i></a>

            <a href="https://vk.com/dima_eremeev" target="_blank"><i style="color: #4a76a8" class="fab fa-2x fa-vk"></i></a>
        </div>
        <div class="text-footer"><i class="fas fa-hashtag"></i>besteditorever</div>
    </div>
    
    
    <!--
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
    -->
@endsection
