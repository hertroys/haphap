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
  <div class='row bottom'>
    <div class='col-xs-1 col-md-3'> </div>
    <div class='col-xs-10 col-md-6'>
      <div class="form-group">
        <label>{{ trans('dish.name') }}</label>
        <div>{{{ $dish->name }}}</div>
      </div>
      <div class="form-group">
        <label>{{ trans('dish.description') }}</label>
        <div v-html='markdown({{ json_encode($dish->description) }})'></div>
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

@section('scripts')
@parent
<script src="https://unpkg.com/vue@2.0.2/dist/vue.js"></script>
<script src="https://unpkg.com/marked@0.3.6/marked.min.js"></script>
<script>
new Vue({
  el: '.container-fluid',
  methods: {
    markdown: function (raw) {
      return marked(raw, {sanitize: true})
    }
  }
});
</script>
@stop
