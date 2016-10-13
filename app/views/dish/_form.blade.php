<div class='row'>
  <div class='col-xs-1 col-md-3'></div>
  <div class='col-xs-10 col-md-6'>
    <div class="form-group">
      {{ Form::label('name', 'Name') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('description', 'Beschrijving') }}
      {{ Form::textarea(
        'description',
        null,
        ['class' => 'form-control', 'rows' => 10]
      ) }}
    </div>
    @foreach($tags as $tag)
    <div class="form-group">
      {{ Form::checkbox(
        'tags[]',
        $tag->id,
        in_array($tag->id, $dish->tags()->lists('id')),
        ['id' => 'tag'.$tag->id]
      ) }}
      {{ Form::label('tag'.$tag->id, $tag->name) }}
    </div>
    @endforeach
    <div class="form-group">
      {{ Form::label('image', 'Afbeelding') }}
      @if($dish->image)
      <div class='image'><img src='{{ asset('img/'.$dish->image) }}' /></div>
      @endif
    </div>
    <div class="form-group">
      {{ Form::file('image', ['class' => 'form-control']) }}
    </div>
    <button type="submit" class="btn btn-success btn-lg">opslaan</button>
  </div>
  <div class='col-xs-1 col-md-3'></div>
</div>
