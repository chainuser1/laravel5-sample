@extends('news.news')
@section('admin-only')
<div class="container panel">
    <h1 class="post-heading">{!!$article->title!!}</h1>
    <p class="alert-success">{!!$article->content!!}</p>
</div>

@stop