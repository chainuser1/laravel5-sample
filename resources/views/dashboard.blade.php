@extends('master')
@section('admin')
@if(Session::get('type')=='admin')


    <nav class="navcol-md-2 pull-left">

    </nav>
    <div class="container">
       <p>Love will find a way.</p>
    </div>


@else
  {!!Redirect::to('/')!!}

@endif
@stop