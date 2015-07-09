@extends('layout')
@section('title')<title>MICP: Login</title>
@section('content')
<!--login modal-->

<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 class="text-center">Login</h1>
            </div>
            <div class="modal-body">
                @if(Session::has('error'))
                    <p class="alert-warning">{!!Session::get('error')!!}</p>
                @endif
                {!!Form::open(array('url'=>'/account_signin')) !!}
<!--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                    <div class="form-group {{$errors->has('uname') ? 'has-error' : ''}}">
                        {!!Form::input('text','uname',null,array('class'=>'form-control input-lg','placeholder'=>'Username'))!!}
                        {!!$errors->first('uname','<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group {{$errors->has('pword') ? 'has-error' : ''}}">
                        {!!Form::password('pword',array('class'=>'form-control input-lg','placeholder'=>'Password'))!!}
                        {!!$errors->first('pword','<span class="help-block">:message</span>')!!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Sign In',array('class'=>'btn btn-green-gradient btn-lg btn-block')) !!}
                        <span class="pull-right"><a href="/signup">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>
                {!!Form::close()!!}
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@stop