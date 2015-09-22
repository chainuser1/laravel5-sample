<!-- -->
@extends('master')
@section('main')
<div class="col-md-8 col-md-offset-2 form-content container">
    <h3 class="title text-center">Register</h3>
    @foreach($errors->all() as $error)
    <p class="alert alert-danger modal-sm">{!!$error!!}</p>
    @endforeach
    {!!Form::open(['url'=>'/register','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
    <div class="form-group">
        {!! Form::label('email','Email:',['class'=>'text-light col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:',['class'=>'text-light col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation','Confirm Password:',['class'=>'text-light col-sm-3 control-label']) !!}
        <div class="col-sm-8">
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="text-center">
        {!!Form::submit('Submit',['class'=>'btn btn-lg btn-default'])!!}
    </div>
    {!!Form::close()!!}
</div>

@stop