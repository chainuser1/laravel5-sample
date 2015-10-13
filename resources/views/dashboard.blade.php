@extends('master')
@section('admin')
@if(Session::get('type')=='admin')
    <div class="panel panel-default col-md-2 col-lg-offset-0" style="background: none; border: none;">
        <nav class="text-center bg-danger">
            <ul class="nav">
                <li class="nav-divider"></li>
                <li><a class="ribbon text-success" role="button" href="#dashboard">Dashboard <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#accounts">Accounts<span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#roles">Roles <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#forms">Forms <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#forms">Feedback <span class="glyphicon glyphicon-chevron-right"></span></a></li>
                <li><a class="ribbon text-success" role="button" href="#forms">Settings <span class="glyphicon glyphicon-cog"></span></a></li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-offset-2 container " id="control-panel" style="opacity: 0.89;background-color:#ffffff; padding: 20px 20px 20px 20px">

    </div>
@else
  {!!Redirect::to('/')!!}

@endif
@stop