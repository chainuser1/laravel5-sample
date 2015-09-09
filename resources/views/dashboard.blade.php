@extends('master')
@section('admin')
@if(Session::get('type')=='admin')
    <nav class="col-md-2 bg-success text-center">
        <h3 class="h3 text-warning">Admin Panel</h3>

       <ul class="nav ">
           <li class="nav-divider"></li>
           <li><a class="text-success" role="button" href="#">Dashboard <span class="glyphicon glyphicon-chevron-right"></span></a></li>
           <li><a class="text-success" role="button" href="#">Users <span class="glyphicon glyphicon-chevron-right"></span></a></li>
           <li><a class="text-success" role="button" href="#">Roles <span class="glyphicon glyphicon-chevron-right"></span></a></li>
           <li><a class="text-success" role="button" href="#">Forms <span class="glyphicon glyphicon-chevron-right"></span></a></li>
           <li class="nav-divider"></li>
           <li><a class="text-success" role="button" href="#">Feedback <span class="glyphicon glyphicon-chevron-right"></span></a></li>
           <li><a class="text-success" role="button" href="#">Settings <span class="glyphicon glyphicon-cog"></span></a></li>
       </ul>
    </nav>
    <div class="divider"></div>
    <div class="container costume-box-gradient-2">
       <h3 class="h3 text-light">Welcome, Admin / Dashboard</h3>
    </div>
@else
  {!!Redirect::to('/')!!}

@endif
@stop