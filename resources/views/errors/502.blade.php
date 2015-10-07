@extends('master')
@section('main')
<style>

    .container {
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .content {
        text-align: center;
        display: inline-block;
    }

    .title-2{
        font-size: 72px;
        margin-bottom: 40px;
    }
</style>


<div class="container">
    <div class="content">
        @if(isset($errors))
        <div class="title-2">Transaction error</div><br>
        <div class="title">{!!$errors!!}</div>
        @endif
    </div>
</div>
@endsection