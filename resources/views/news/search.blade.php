@extends('news.news')
@section('search')
@if(isset($feed))
  <div  class="container">
      @foreach($feed->all() as $story)
      <br><br><a class="title" href="#">{!!preg_replace("/(".$search.")+/i","<span class=\"text-warning\">\\0</span>",$story->title)!!}</a><br>
      <p class="text-justify text-warning">
          <?php
          $content=htmlspecialchars_decode($story->content);
          $content= preg_replace(
              "~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
              "<a href=\"\\0\">\\0</a>",
              htmlspecialchars_decode($content));
          if(strlen($content)>300){
              $stringCut=substr($content,0,300);
              $content=substr($stringCut, 0, strrpos($stringCut, ' ')).'...'.'<br><a class="btn-link"'.'href="'.URL::to('/news/'.$story->slug.'/show').'">'.'Show More</a>';
          }
          echo $content;
          ?>
      </p>
      <a class="text-primary" data-toggle="tooltip"
         data-placement="right" title="{!!$story->created_at->format('M d,Y')!!}">{!!$story->created_at->diffForHumans()!!}</a>&nbsp;
      <?php if(strlen($content)<=300){ ?>
          @if(Auth::check())
          <a class="text-success" href="{!!'/news/'.$story->slug.'/edit'!!}">Edit</a>
          <a class="text-danger" href="#">Remove</a>
          @endif
      <?php } ?>
      @endforeach
      <div class="text-center"><div class="pagination">{!!$feed->fragment('news')->render()!!}</div></div>

  </div>
 @else
    {!!Redirect::to('/news')!!}
@endif
@endsection