@extends('home')
@section('content')
<!--login modal-->
@if(isset($error))
  <p class="alert-warning">{!!$error!!}</p>
@endif
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 class="text-center">Login</h1>
            </div>
            <div class="modal-body">
                {!!Form::open(array('url'=>'/account_signin')) !!}
<!--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                    <div class="form-group">
                        <input class="form-control input-lg" placeholder="Username" type="text" required name="uname">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" placeholder="Password" type="password" required name="pword">
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Sign In',array('class'=>'btn btn-primary btn-lg btn-block')) !!}
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