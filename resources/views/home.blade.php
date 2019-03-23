@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div id="work_panel">
            <div id="grid">
                <div class="header"></div>
                <div class="nav"></div>
                <div class="main"></div>
            </div>
        </div>
    </div>
</div>
@endsection
