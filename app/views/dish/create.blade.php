@extends('layout')

@section('content')
<div class="container">
    <div class='row'>
        <div class='col-xs-12 text-center'>
            <a href='{{ route('dish.index') }}'>
                <button type="button" class="btn btn-lg btn-primary">overzicht</button>
            </a>
            <a href='{{ url('dish/rand') }}'>
                <button type="button" class="btn btn-lg btn-primary">willekeurig</button>
            </a>
        </div>
    </div>    
    <div class='row'>
        <div class='col-xs-1 col-md-3'> </div>
        <div class='col-xs-10 col-md-6'>
        {{ Form::open(['url' => 'dish']) }}
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control" rows="10" id="description" name="description"> </textarea>
            </div>
            @foreach($tags as $tag)
            <div class="form-group">
                <input type='checkbox' name='tags[]' id='{{ 'tag'.$tag->id }}' value='{{ $tag->id }}' />
                <label for='{{ 'tag'.$tag->id }}'>{{{ $tag->name }}}</label>
            </div>
            @endforeach    
            <div class="form-group">
                <label for="image">Afbeelding</label>
                <input type="file" id="image">
            </div>
            <button type="submit" class="btn btn-success btn-lg" value="toevoegen">toevoegen</button>
        {{ Form::close() }}
        </div>
        <div class='col-xs-1 col-md-3'> </div>
    </div>
</div>
@stop
