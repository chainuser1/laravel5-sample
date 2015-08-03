<!DOCTYPE html>
        <html>
           <head>
               <meta name="csrf-token" content="{{ csrf_token() }}">
               <title>MICP News</title>
               @include('../style')
           </head>
           <body>
<!--               <h1 class="h1 alert-warning myGlower rightt" style=" position: fixed; z-index: 12345; box-shadow: 4px 3px 2px 3px; margin-top:1px">News Center</h1>-->
               @include('header')
               @yield('admin-only')
               @if(isset($feed))
                     @foreach($feed->all() as $story)
                        <div class="container">
                             <a class="title" href="{!!URL::to('/news').'/'.$story->slug.'/show'!!}">{!!$story->title!!}</a><br>
                             <h6 class="h6">{!!$story->created_at->diffForHumans()!!}</h6>
                        </div>
                      @endforeach
               @elseif(isset($error))
                         <p class="alert">{!!$error!!}</p>
               @endif
               {!!HTML::script('datetimepicker-master/jquery.js')!!}
               {!!HTML::script('datetimepicker-master/jquery.datetimepicker.js')!!}
               {!! HTML::script('js/jquery_ui.js') !!}
               @include('../scripts')
           </body>
        </html>