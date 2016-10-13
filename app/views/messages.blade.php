@if($errors->any())
<div class='row alert alert-danger'>
  <div class='col-xs-12 text-center'>
    <ul>
      @foreach ($errors->all('<li>:message</li>') as $message)
      {{ $message }}
      @endforeach
    </ul>
  </div>
</div>
@endif

@if(Session::has('success'))
<div class='row alert alert-success'>
  <div class='col-xs-12 text-center'>
    {{{ Session::get('success') }}}
  </div>
</div>
@endif