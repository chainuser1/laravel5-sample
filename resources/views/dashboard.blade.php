@extends('master')
@section('admin')
@if(Session::get('type')=='admin')
    <div class="panel panel-default col-md-2 col-lg-offset-0" style="background: none;">
        <nav class="text-center bg-success">
            <ul class="nav">
                <li class="nav-divider"></li>
                <li><a class="ribbon text-success" role="button" href="#">Dashboard <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#">Users <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#">Roles <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#">Forms <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#">Feedback <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#">Settings <span class="glyphicon glyphicon-cog"></span></a></li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-offset-2  container " id="control-panel" style="opacity: 0.96;background-color:#ffffff;">

    </div>
@else
  {!!Redirect::to('/')!!}

@endif
@stop