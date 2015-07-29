<!DOCTYPE html>
        <html>
           <head>
               <meta name="csrf-token" content="{{ csrf_token() }}">
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
               {!! HTML::script('js/jquery_ui.js') !!}
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
                           $(".btn-primary").click(function(){
                               var news_title=$("#title").val();
                               var content=$("#content").html();
                               var created_at=$("#created_at").val();
                               var _token=$('input[name=_token]').val();
                               //var created_at=new Date($("#created_at").val());
                               //var formatted=created_at.dateFormat("Y-m-d H:i:s")
                               $.ajaxSetup({
                                   headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                               });
                               console.log(_token);
                               $.post('news/store',{
                                   title:news_title,
                                   content:content,
                                   created_at:created_at,
                                   _token:_token
                               },
                                       function(data,status)
                                       {
                                           if(status==="success"){
                                               console.log(data);
                                               alert(data);
                                           }
                                           else{
                                               console.log(status)
                                               alert(status);
;                                           }
                                       }

                              )

                           });
                       });
                   }(jQuery);
               </script>
           </body>
        </html>