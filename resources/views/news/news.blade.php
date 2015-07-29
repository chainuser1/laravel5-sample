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
                           $.ajaxSetup({
                               headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                           });
                           $(".datetimepicker").datetimepicker({
                                  mask:true,
                                  format:'Y/m/d H:i',
                                  timepicker:true,
                                  datepicker:true
                           });
                           $(".btn-primary").click(function(){
                               var news_title=$("#title").val();
                               var content=$("#content").val();
                               var created_at=$("#created_at").val();
                               var _token=$('input[name=_token]').val();
                               var slug=news_title.toLowerCase().replace(/([\^\!@\+#\$%^\,\.\'\"&*\s]){1,}/g,"-");
//                               var created_at=new Date($("#created_at").val());
//                               var formatted=created_at.dateFormat("Y-m-d H:i:s");
                               //our data string
                               var dataString="title="+news_title+"&slug="+slug+"&content="+content+"&created_at="+created_at+"&_token="+_token;
                               //ajax here
                               $.ajax({
                                       url:"/news/store",
                                       type: "POST",
                                       data:dataString
                                       ,success:function(data){
                                          //if the data was validated without errors
                                           if(typeof data=="string"){
                                               if($(".alert").hasClass("alert-danger")){
                                                   $(".alert").removeClass("alert-danger");
                                               }
                                               $(".alert").addClass("alert-success").text(data);
                                           }
                                           //if there are errors in validation
                                           else if(typeof data=="object"){
                                               if($(".alert").hasClass("alert-success")){
                                                   $(".alert").removeClass("alert-success");
                                               }
                                               $(".alert").addClass("alert-danger");
                                               for(var i=data.length-1; i>0; i--){
                                                   $(".alert").text(data[i]+$(".alert").html());
                                               }
                                           }
                                           else{
                                               console.log(data);
                                           }
                                       },
                                       error:function(xhr,status){
                                           if($(".alert").hasClass("alert-success")){
                                               $(".alert").removeClass("alert-success");
                                           }
                                           $(".alert").addClass("alert-danger");
                                           $(".alert").text("An error occurred when the data was submitted." + xhr.responseJSON);
                                       }

                               });

                           });
                       });
                   }(window.jQuery);
               </script>
           </body>
        </html>