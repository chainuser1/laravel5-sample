@extends('home')
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
                <form class="form col-md-12 center-block">
<!--                    <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                    <div class="form-group">
                        <input class="form-control input-lg" placeholder="Username" type="text" required id="uname">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" placeholder="Password" type="password" required id="pword">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" id="login">Sign In</button>
                        <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                    </div>
                </form>
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