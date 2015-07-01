@extends('home')
@section('content')
<div id="signupModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1 class="text-center">Login</h1>
            </div>
            <div class="modal-body">
                {!!Form::open(array('url'=>'/account_register')) !!}
                <!--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                <div class="form-group">
                    <input class="form-control input-lg" placeholder="Username" type="text" required name="uname">
                </div>
                <div class="form-group">
                    <input class="form-control input-lg" placeholder="Password" type="password" required name="pword">
                </div>
                <div class="form-group">
                    {!! Form::submit('Register',array('class'=>'btn btn-primary btn-lg btn-block')) !!}
                    <span class="pull-right"><a href="/login">Login</a></span><span><a href="#">Need help?</a></span>
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