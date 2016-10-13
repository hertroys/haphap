@extends('layout')

@section('head')
    @parent

<style>
    html, body {
        position: relative;
        height: 100%;
    }
    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }
    .container-fluid {
        height: 100%;
    }
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        font-size: 18px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;        
    }
    .swiper-slide a {
        margin-bottom: 20px;
    }
    .swiper-slide a:hover {
        text-decoration: none;
    }
    .swiper-label {
        padding: 2em;
        background: rgba(255,255,255,0.7);
        color: black;
        font-size: x-large;
    }
    .top-container, .bottom-container {
        position: absolute;
        width: 100%;
        z-index: 2;
        background: rgba(238,238,238,0.8);
        line-height: initial;
    }
    .bottom-container {
        bottom: 0;
    }
    .bottom-container i {
        padding: 10px;
    }
    .material-icons { 
        font-size: 48px; 
        color: rgba(0, 0, 0, 0.54);
        cursor: pointer;
    }
    .material-icons.active { 
        color: mediumpurple;
    }
    .material-icons:hover {
        color: darkslateblue;
    }
    /*.material-icons.md-inactive {
        color: rgba(0, 0, 0, 0.26);
    }*/

</style>
@endsection

@section('content')
    <div class='container-fluid'>

        <!--<div class="row" style="height:10%;">
            <div class="col-xs-5 col-md-3 col-lg-1 vcenter">
                <div style="height:10em;border:1px solid #000">Big</div>
            </div>
            <div class="col-xs-5 col-md-7 col-lg-9 vcenter">
                <div style="height:3em;border:1px solid #F00">Small</div>
            </div>
        </div>-->

        <!--<div class="top-container container-fluid">
            <div class='row'>
                <div class='col-xs-12 text-center'>
                    <a href='{{ route('dish.create') }}'><button type="button" class="btn btn-lg btn-success">nieuw</button></a>
                    <a href='{{ route('dish.index') }}'><button type="button" class="btn btn-lg btn-primary">overzicht</button></a>
                </div>
            </div>
        </div>-->
        <div class="row top-container">
            <div class='col-xs-12 text-center'>
                <a href='{{ route('dish.index') }}'><i class="material-icons">menu</i></a>
            </div>
        </div>
        <div class="row swiper-container">
            <div class="col swiper-wrapper">
                @foreach($dishes as $dish)
                @if($dish->image)
                <div class="swiper-slide"  style="background-image:url({{asset('img/'.$dish->image)}})">
                @else
                <div class="swiper-slide">
                @endif
                    <a href='{{ route('dish.show', $dish->id) }}'><span class='swiper-label'>{{{ $dish->name }}}</span></a>
                </div>
                @endforeach
            </div>
        </div>
        <div class='row bottom-container text-center'>
            {{ Form::open(['url'=> url('dish/home'), 'class' => 'tags']) }}
            <!--<div class='col-xs-12 text-center'>
                <p class="lead tags">
                    @foreach($tags as $tag)
                    {{ Form::checkbox('tagged[]', $tag->id, in_array($tag->id, $tagged), ['id' => 'tag'.$tag->id]) }}
                    {{ Form::label('tag'.$tag->id, $tag->name) }}
                    @endforeach
                </p>
            </div>-->

            <div class='col-xs-12 text-center'>
                <div class="col tags">
                    @foreach($tags as $tag)
                    @if(in_array($tag->id, $tagged))
                        <label for='{{ 'tag'.$tag->id }}'><i class="material-icons active">{{ $tag->icon }}</i></label>
                    @else
                        <label for='{{ 'tag'.$tag->id }}'><i class="material-icons">{{ $tag->icon }}</i></label>
                    @endif
                    {{ Form::checkbox('tagged[]', $tag->id, in_array($tag->id, $tagged), ['id' => 'tag'.$tag->id, 'class' => 'hidden']) }}
                    {{-- Form::label('tag'.$tag->id, $tag->name) --}}
                    @endforeach
                </div>
                <!--<a href='{{ route('dish.index') }}'><i class="material-icons">menu</i></a>-->
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
    @parent
    <script> $(function () { app.splash.init(); }); </script>
@stop
