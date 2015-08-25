@extends('news.news')
@section('admin-only')
<div class="col-sm-2 pull-left mCustomScrollbar" data-mcs-theme="dark" id="rss"></div>
<div class="container col-md-7 ">
    @if(isset($error))
       <p class="alert-dismissable">{!!redirect('/errors/503')!!}</p>
    @else
    <div class="panel-heading">
        <h1 class="shadow-text title">{!!ucwords($article->title)!!}</h1>
        <input type="hidden" name="_id" value="{!!$article->id!!}"/>
        <h5 class="h5 text-primary">{!!$article->created_at->diffForHumans()!!}
            &nbsp;
            @if(Auth::check())
                    <a class="text-success" href="{!!'/news/'.$article->slug.'/edit'!!}">Edit</a>
                    <a class="text-danger" href="#">Remove</a>
            @endif
        </h5>

    </div>
    <div class="panel-body">
        <p class="content" style="text-align: justify;">
        <?php
            $content=htmlspecialchars_decode($article->content);
            echo preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\" class=\"btn-link\">\\0</a>",$content);
        ?>
    </p></div>
    @endif
</div>
<div class="col-sm-2 pull-left mCustomScrollbar" data-mcs-theme="dark" id="rss_apple"></div>

@stop