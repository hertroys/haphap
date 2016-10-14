@extends('layout')

@section('content')
  <div class='container-fluid'>
    <div class="row top-container">
      <div class='col-xs-12 text-center'>
        <a href='{{ route('dish.index') }}'>
          <i class="material-icons">menu</i>
        </a>
      </div>
    </div>
    <div class="row swiper-container">
      <div class="col swiper-wrapper">
        @foreach($dishes as $dish)
        @if($dish->image)
        <div class="swiper-slide" style="background-image:url({{ asset('img/'.$dish->image) }})">
        @else
        <div class="swiper-slide">
        @endif
          <a href='{{ route('dish.show', $dish->id) }}'>
            <span class='swiper-label'>{{{ $dish->name }}}</span>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <div class='row bottom-container text-center'>
      {{ Form::open(['url'=> url('dish/home'), 'class' => 'tags']) }}
      <div class='col-xs-12 text-center'>
        <div class="col tags">
          @foreach($tags as $tag)
          <label for='{{ 'tag'.$tag->id }}'>
            <i class="material-icons {{ in_array($tag->id, $tagged) ? 'active' : '' }}">
              {{ $tag->icon }}
            </i>
          </label>
          {{ Form::checkbox(
            'tagged[]',
            $tag->id,
            in_array($tag->id, $tagged),
            ['id' => 'tag'.$tag->id, 'class' => 'hidden']
          ) }}
          @endforeach
        </div>
      </div>
      {{ Form::close() }}
    </div>
  </div>
@stop

@section('scripts')
  @parent
  <script> $(function () { app.home.init(); }); </script>
@stop
