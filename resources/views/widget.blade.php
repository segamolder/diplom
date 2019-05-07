<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'OPORTFOLIO') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/widget.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{--<link href="{{ mix('css/widget.css') }}" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">--}}
    <link href="https://fonts.googleapis.com/css?family=Gugi|Just+Another+Hand|Raleway|Sofia|ZCOOL+KuaiLe" rel="stylesheet">

    <script>
        // document.getElementById('#btn').click(
        //     function(){
        //         // sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
        //         // return false;
        //         alert("r");
        //         sendNumber();
        //     }
        // );
        // const axios = require('axios');
        // function sendNumber(){
        //     // $.ajax({
        //     //     headers: {
        //     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     //     },
        //     //     type:'POST',
        //     //     url:'/home/sendNumber',
        //     //     data: $('formData').serialize(),
        //     //     //data: {'id': item_id, 'public' : '0', '_token': csrf_token() },
        //     //     success:function(data){
        //     //         $("#widget").html(data.msg);
        //     //     }
        //     // });
        //     debugger;
        //     axios({
        //         method: 'post',
        //         url: '/home/sendNumber',
        //         data: $('formData').serialize(),
        //     });
        //}
        var userId = '{{ $widget['user_id'] }}'
    </script>
</head>

<body style="margin: 0">
    <div id="widget" style="display: block; width: {{$widget['bg_width']}}px; height: {{$widget['bg_height']}}px">
        <img src="{{$widget['image_url']}}" alt="" style="display: block; width: {{$widget['image_width']}}px; height: {{$widget['image_height']}}px; top: {{$widget['image_x']}}px; left: {{$widget['image_y']}}px; position: absolute">
        <p style="position: absolute; top:{{$widget['text_y']}}px; left: {{$widget['text_x']}}px; font-size: {{$widget['text_size']}}px; font-family: {{$widget['text_font']}}; margin: 0">{{$widget['text']}}</p>
        <div id="formData" style="display: flex; position: absolute; top:{{$widget['input_y']}}px; left: {{$widget['input_x']}}px;">
            <input type="text" placeholder="" v-model="phoneNumber">
            <button id="btn" @click="sendNumber">{{ $widget['input_text'] }}</button>
        </div>
        <!--        <widget></widget>-->
        <?// echo($widget['name']); ?>

    </div>
</body>
</html>