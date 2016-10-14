@extends('layout')

@section('content')
<div class="container-fluid">

  @include('messages')

  <div class='row top'>
    <div class='col-xs-12 text-center'>
      <a href='{{ route('dish.create') }}'>
        <button type="button" class="btn btn-lg btn-success">
          {{ trans('navigation.new') }}
        </button>
      </a>
      <a href='{{ url('dish/home') }}'>
        <button type="button" class="btn btn-lg btn-primary">
          {{ trans('navigation.home') }}
        </button>
      </a>
    </div>
  </div>

  <div class='row bottom'>
    <div class='col-xs-1 col-md-3'> </div>
    <div class='col-xs-10 col-md-6'>
      <p><div class="table-responsive">
        <table class="table table-striped">
          <tbody>
          @foreach($dishes as $i => $dish)
          <tr>
            <td>{{ $i+1 }}.</td>
            <td><a href='{{ route('dish.show', $dish->id) }}'>{{ $dish->name }}</a></td>
            <td>{{ implode(', ', $dish->tags->lists('name')) }}</td>
            <td>
              {{ Form::open([
                'method'  => 'delete',
                'route' => ['dish.destroy', $dish->id]
              ]) }}
                {{ Form::hidden('id', $dish->id) }}
                {{ Form::submit(trans('global.delete'), ['class' => 'btn btn-danger']) }}
              {{ Form::close() }}
            </td>
          </tr>
          @endforeach
          </tbody>
        </table>
      </div></p>
    </div>
    <div class='col-xs-1 col-md-3'> </div>
  </div>
</div>
@stop
