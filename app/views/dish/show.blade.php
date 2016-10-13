@extends('layout')

@section('content')
<div class="container">

    @include('messages')

    <div class='row'>
        <div class='col-xs-12 text-center'>
            <a href='{{ route('dish.edit', $dish->id) }}'>
                <button type="submit" class="btn btn-success btn-lg">aanpassen</button>
            </a>
            <a href='{{ route('dish.index') }}'>
                <button type="button" class="btn btn-lg btn-primary">overzicht</button>
            </a>
            <a href='{{ url('dish/home') }}'>
                <button type="button" class="btn btn-lg btn-primary">willekeurig</button>
            </a>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-1 col-md-3'> </div>
        <div class='col-xs-10 col-md-6'>
            <div class="form-group">
                <label>Naam</label>
                <div>{{{ $dish->name }}}</div>
            </div>
            <div class="form-group">
                <label>Beschrijving</label>
                <div>{{{ $dish->description }}}</div>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <div>{{ implode(', ', $dish->tags()->lists('name')) }}</div>
            </div>
            @if($dish->image)
            <div class="form-group">
                <label>Afbeelding</label>
                <div class='image'><img src='{{ asset('img/'.$dish->image) }}' /></div>
            </div>
            @endif
        </div>
        <div class='col-xs-1 col-md-3'> </div>
    </div>
</div>
@stop
