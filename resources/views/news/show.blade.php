@extends('news.news')
@section('admin-only')
<div class="panel container fancybox-box">
    @if(isset($error))
       <p class="alert">{!!$error!!}</p>
    @else
    <div class="panel-heading"><h1 class="shadow-text h1">{!!$article->title!!}</h1><br></div>
    <div class="panel-body"><p class="content" style="text-align: justify;">{!!$article->content!!}</p></div>
    @endif
</div>

@stop