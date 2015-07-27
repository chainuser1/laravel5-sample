<!DOCTYPE html>
        <html>
           <head>
               <title>MICP News</title>
               @include('../style')
           </head>
           <body>
               <h1 class="h1 alert-warning myGlower" style="position: fixed; z-index: 12345; box-shadow: 4px 3px 2px 3px; margin-top:1px">News Center</h1>
               <br>
               @yield('admin-only')
               @if(isset($news))

                     @foreach($news->all() as $story)
                        <div class="container">
                             <h3 class="h3">{!!$story->title!!}</h3><br>
                             <h6 class="h6">{!! $story->created_at!!}</h6>
                        </div>
                      @endforeach

               @endif
               {!!HTML::script('datetimepicker-master/jquery.js')!!}
               {!!HTML::script('datetimepicker-master/jquery.datetimepicker.js')!!}
               <script>
                   $.noConflict();
                   !function($){
                       $(function(){
                           $(".datetimepicker").datetimepicker({
                                  mask:true,
                                  format:'Y/m/d H:i',
                                  timepicker:true,
                                  datepicker:true
                           });
                       });
                   }(jQuery);
               </script>
           </body>
        </html>