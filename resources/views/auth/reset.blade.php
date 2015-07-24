@extends('master')

@section('title')<title>MICP: Reset</title> @stop

@section('content')

<div class="modal show modal-dialog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
                <legend><a href="#Reset"><i class="glyphicon glyphicon-globe"></i></a> Reset Password!</legend>
                {!!Form::open(array('url'=>'/reset','role'=>'form')) !!}

                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <input class="form-control" name="email" placeholder="Your Email" type="text" />
                    {!!$errors->first('email','<span class="help-block">:message</span>')!!}
                </div>

                <div class="form-group {{$errors->has('pword') ? 'has-error' : ''}}">
                    <input class="form-control" name="pword" placeholder="Password" type="password" />
                    {!!$errors->first('pword','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{$errors->has('confirm_pword') ? 'has-error' : ''}}">
                    <input class="form-control" name="confirm_pword" placeholder="Confirm Password" type="password" />
                    {!!$errors->first('confirm_pword','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Reset Now',array('class'=>'btn btn-green-gradient btn-lg btn-block')) !!}
                    <span class="pull-right"><a href="/signup">Register</a></span><span><a href="#">Need help?</a></span>
                </div>
                {!!Form::close()!!}
<!--                <span class="pull-right"><a href="/login">Login</a></span><span><a href="#">Need help?</a></span>-->
            </div>
        </div>
    </div>
</div>
@stop
