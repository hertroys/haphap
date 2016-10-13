@extends('layout')

@section('content')
<div class="container">

    @include('messages')

    <div class='row'>
        <div class='col-xs-12 text-center'>
            <a href='{{ route('dish.index') }}'>
                <button type="button" class="btn btn-lg btn-primary">overzicht</button>
            </a>
            <!--<a href='{{ url('dish/home') }}'>
                <button type="button" class="btn btn-lg btn-primary">willekeurig</button>
            </a>-->
        </div>
    </div>

    {{ Form::model($dish, ['method'  => 'put', 'files' => true, 'route' => ['dish.update', $dish->id]]) }}
    @include('dish._form')
    {{ Form::close() }}

</div>
@stop
