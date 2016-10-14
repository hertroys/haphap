@extends('layout')

@section('content')
<div class="container-fluid">

  @include('messages')

  <div class='row top'>
    <div class='col-xs-12 text-center'>
      <a href='{{ route('dish.edit', $dish->id) }}'>
        <button type="submit" class="btn btn-success btn-lg">
          {{ trans('global.edit') }}
        </button>
      </a>
      <a href='{{ route('dish.index') }}'>
        <button type="button" class="btn btn-lg btn-primary">
          {{ trans('navigation.overview') }}
        </button>
      </a>
    </div>
  </div>
  <div class='row'>
    <div class='col-xs-1 col-md-3'> </div>
    <div class='col-xs-10 col-md-6'>
      <div class="form-group">
        <label>{{ trans('dish.name') }}</label>
        <div>{{{ $dish->name }}}</div>
      </div>
      <div class="form-group">
        <label>{{ trans('dish.description') }}</label>
        <div>{{{ $dish->description }}}</div>
      </div>
      <div class="form-group">
        <label>{{ trans('dish.tags') }}</label>
        <div>{{ implode(', ', $dish->tags()->lists('name')) }}</div>
      </div>
      @if($dish->image)
      <div class="form-group">
        <label>{{ trans('dish.image') }}</label>
        <div class='image'><img src='{{ asset('img/'.$dish->image) }}' /></div>
      </div>
      @endif
    </div>
    <div class='col-xs-1 col-md-3'> </div>
  </div>
</div>
@stop
