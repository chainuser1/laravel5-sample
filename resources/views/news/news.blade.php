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
                             <a class="title" href="#">{!!$story->title!!}</a><br>
                             <p class="paragraph-content">
                                 <?php
                                     $content=htmlspecialchars_decode($story->content);
                                     if(strlen($content)>300){
                                          $stringCut=substr($content,0,300);
                                          $content=substr($stringCut, 0, strrpos($stringCut, ' ')).'<br><a class="btn-link"'.'href="/news/'.$story->slug.'/show">'.'Show More...</a>';
                                     }
                                      echo $content;
                                 ?>
                             </p>
                             <h6 class="h6">{!!$story->created_at->diffForHumans()!!}</h6>
                        </div>
                      @endforeach

                      <div class="container text-center"><div class="pagination">{!!$feed->fragment('news')->render()!!}</div></div>

               @elseif(isset($error))
                         <p class="alert">{!!$error!!}</p>
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
                                  mask:false,
                                  format:'Y/m/d H:i',
                                  timepicker:true,
                                  datepicker:true
                           });
                           $(".btn-success").click(function(){
                               var news_title=$("input[name=title]").val();
                               var action=$("input[name=action]").val();
                               var content=$("textarea[name=action]").val();
                               var created_at=$("input[name=created_at]").val();
                               var _token=$('input[name=_token]').val();
                               //create our slug
                               if(action==="/news/store"){

                                   var slug=news_title.toLowerCase().replace(/([\^\!@\+#\$%^\,\.\'\"&*\s]){1,}/g,"-");
                                   //our data string
                                   var dataString="title="+news_title+"&slug="+slug+"&content="+content+"&created_at="+created_at+"&_token="+_token;
                                   //ajax here
                                   $.ajax({
                                       url:action,
                                       type: "POST",
                                       data:dataString
                                       ,success:function(data){
                                           //if the data was validated without errors

                                           if(typeof data=="string"){
                                               if($(".alert").hasClass("alert-danger")){
                                                   $(".alert").removeClass("alert-danger");
                                               }
                                               $(".alert").addClass("alert-success").text(data).fadeIn(2000).fadeOut(7000);
                                           }
                                           //if there are errors in validation
                                           else if(typeof data=="object"){
                                               if($(".alert").hasClass("alert-success")){
                                                   $(".alert").removeClass("alert-success");
                                               }
                                               $(".alert").addClass("alert-danger");
                                               for(var i=data.length-1; i>0; i--){
                                                   $(".alert").text(data[i]+$(".alert").text()).fadeIn(2000).fadeOut(7000);
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
                                           $(".alert").text("An error occurred when the data was submitted." + xhr.responseJSON).fadeIn(2000).fadeOut(7000);
                                       }

                                   });

                               }
                               else if(action==="/news/update"){

                               }
                           });
                       });
                   }(window.jQuery);
               </script>
               @include('../scripts')
           </body>
        </html>