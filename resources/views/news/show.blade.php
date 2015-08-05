@extends('news.news')
@section('admin-only')
<div class="panel container fancybox-box">
    @if(isset($error))
       <p class="alert">{!!$error!!}</p>
    @else
    <div class="panel-heading"><h1 class="shadow-text title">{!!$article->title!!}</h1><br></div>
    <div class="panel-body"><p class="content" style="text-align: justify;">{!!preg_replace('/[\n|\r]{4,}/','<br>',$article->content)!!}</p></div>
    @endif
</div>

@stop