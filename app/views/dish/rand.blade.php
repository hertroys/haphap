@extends('layout')

@section('content')
    <div class="top-container container-fluid">
        <div class='row'>
            <div class='col-xs-12 text-center'>
                <a href='{{ action('DishController@create') }}'><button type="button" class="btn btn-lg btn-success">nieuw</button></a>
                <a href='{{ route('dish.index') }}'><button type="button" class="btn btn-lg btn-primary">overzicht</button></a>
            </div>
        </div>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($dishes as $dish)
            @if($dish->image)
            <div class="swiper-slide"  style="background-image:url({{asset('img/'.$dish->image.'.jpg')}})">
                <a href='{{ route('dish.show', $dish->id) }}'><span class='swiper-label'>{{{ $dish->name }}}</span></a>
            </div>
            @else
            <div class="swiper-slide">
                <span class='swiper-label'>{{{ $dish->name }}}</span>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    <div class='bottom-container text-center'>
        {{ Form::open(['url'=> url('dish/rand')]) }}
        <div class='col-xs-12 text-center'>
            <p class="lead tags">
                @foreach($tags as $tag)
                {{ Form::checkbox('tagged[]', $tag->id, in_array($tag->id, $tagged), ['id' => 'tag'.$tag->id]) }}
                {{ Form::label('tag'.$tag->id, $tag->name) }}
                @endforeach
            </p>
        </div>
        {{ Form::close() }}
    </div>
@stop

@section('scripts')
    @parent

    <script>
    $(document).ready(function () {
        var swiper = new Swiper('.swiper-container', {
            preventClicks: false
        })

        $('.tags > input[type="checkbox"]').change(function () {
            $('form').submit();
        });        
    });
    </script>
@stop
