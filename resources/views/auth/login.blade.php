<!-- -->
@extends('master')
@section('main')
<div class="modal-emerald-02">
    <div class="modal-header">
     <h1 class="title">Login</h1>
    @foreach($errors->all() as $error)
    <p class="alert alert-danger">{!!$error!!}</p>
    @endforeach
    </div>
    <div class="modal-body">
        {!!Form::open(['url'=>'/login','class'=>'form form-horizontal','style'=>'margin-top:50px'])!!}
        <div class="form-group">
            <input type="hidden" name="url" value="{!!$url!!}"/>
            {!! Form::label('email','Email:',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('password','Password:',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="text-center">
            {!!Form::submit('Login',['class'=>'btn btn-default'])!!}
        </div>
        {!!Form::close()!!}
    </div>
</div>

@stop