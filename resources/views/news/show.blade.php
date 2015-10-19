@extends('news.news')
@section('admin-only')
<!--<p class="col-sm-2 pull-left cron mCustomScrollbar content" data-mcs-theme="dark" id="rss"></p>-->
<div class="container col-md-7 container-2">
  @foreach($article as $story)
    <div class="panel-heading">
        <h1 class="shadow-text title">{!!$story->title!!}</h1>
        <input type="hidden" name="_id" value="{!!$story->id!!}"/>
        <h5 class="h5 text-primary"><span class="badge">By: {!!$story->author!!}</span>   {!!    $story->created_at->diffForHumans()!!}
            &nbsp;
            @if(Auth::check())
                    <a class="text-success" href="{!!URL::to('/news/'.$story->slug.'/edit')!!}">Edit</a>
                    &nbsp; &nbsp;<a class="text-danger" href="#">Remove</a>
            @endif
        </h5>

    </div>
    <div class="panel-body">
        <p class="content" style="text-align: justify;">
        <?php
            $content=htmlspecialchars_decode($story->content);
            //see for any url within the article content and highlight them
            echo preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~","<a href=\"\\0\" class=\"text-success\">\\0</a>",$content);
        ?>
        </p>
    </div>
  @endforeach

</div>
<!--<p class="col-sm-2 pull-left cron mCustomScrollbar content" data-mcs-theme="dark" id="rss_apple"></p>-->

@stop