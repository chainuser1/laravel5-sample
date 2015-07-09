@if(Session::has('uname'))
    <div class="alert-danger">{!!Redirect::to('home')!!}</div>
@endif
@extends('home')
@section('content')
<div class="modal show modal-dialog">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
            <legend><a href="#SignUp"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
            {!!Form::open(array('url'=>'/account_register','role'=>'form')) !!}
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <div class="form-group {{$errors->has('fname') ? 'has-error' : ''}}">
                          <input class="form-control" name="fname" placeholder="First Name" type="text"
                                autofocus />
                         {!!$errors->first('fname','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-6">

                        <div class="form-group {{$errors->has('lname') ? 'has-error' : ''}}">
                            <input class="form-control" name="lname" placeholder="First Name" type="text"
                                    autofocus />
                            {!!$errors->first('lname','<span class="help-block">:message</span>')!!}
                        </div>
                    </div>
                </div>
                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                    <input class="form-control" name="email" placeholder="Your Email" type="text" />
                    {!!$errors->first('email','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{$errors->has('uname') ? 'has-error' : ''}}">
                    <input class="form-control" name="uname" placeholder="Username" type="text" />
                    {!!$errors->first('uname','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{$errors->has('pword') ? 'has-error' : ''}}">
                    <input class="form-control" name="pword" placeholder="Password" type="password" />
                    {!!$errors->first('pword','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{$errors->has('confirm_pword') ? 'has-error' : ''}}">
                    <input class="form-control" name="confirm_pword" placeholder="Confirm Password" type="password" />
                    {!!$errors->first('confirm_pword','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{$errors->has('birthday') ? 'has-error' : ''}}">
                    <input class="datepicker form-control" name="birthday" placeholder="Birth Date" type="text" />
                    {!!$errors->first('birthday','<span class="help-block">:message</span>')!!}
                </div>
                <div class="form-group {{$errors->has('sex') ? 'has-error' : ''}}">
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                        Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                        Female
                    </label>
                    {!!$errors->first('sex','<span class="help-block">:message</span>')!!}
             </div>
                <br />
                <br />
                <button class="btn btn-lg btn-green-gradient btn-block" type="submit">
                    Sign up</button>
            {!!Form::close()!!}
            <span class="pull-right"><a href="/login">Login</a></span><span><a href="#">Need help?</a></span>
        </div>
    </div>
</div>
</div>
@stop
