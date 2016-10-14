@if($errors->any())
<div class='row alert alert-danger'>
  <div class='col-xs-12 text-center'>
    @foreach ($errors->all('<div>:message</div>') as $message)
    {{ $message }}
    @endforeach
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