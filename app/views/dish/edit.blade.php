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
        {{ Form::open(['method'  => 'put', 'route' => ['dish.update', $dish->id]]) }}
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $dish->name }}">
            </div>
            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control" rows="10" id="description" name="description">{{ $dish->description }}</textarea>
            </div>
            @foreach($tags as $tag)
            <div class="form-group">
                 {{ Form::checkbox('tags[]', $tag->id, in_array($tag->id, $dish->tags()->lists('id')), ['id' => 'tag'.$tag->id]) }}
                 {{ Form::label('tag'.$tag->id, $tag->name) }}
            </div>
            @endforeach
            @if($dish->image)
            <div class="form-group">
                <label>Afbeelding</label>
                <div class='image'><img src='{{ asset('img/'.$dish->image.'.jpg') }}' /></div>
            </div>
            @endif
            <div class="form-group">
                <input type="file" id="image" />
            </div>
            <button type="submit" class="btn btn-success btn-lg">opslaan</button>
        {{ Form::close() }}
        </div>
        <div class='col-xs-1 col-md-3'> </div>
    </div>
</div>
@stop