<!DOCTYPE html>
        <html>
           <head>
               <meta charset="utf-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="csrf-token" content="{!!csrf_token()!!}">
               <title>MICP News</title>
               @include('../style')
           </head>
           <body>
<!--               <h1 class="h1 alert-warning myGlower rightt" style=" position: fixed; z-index: 12345; box-shadow: 4px 3px 2px 3px; margin-top:1px">News Center</h1>-->
               @include('header')
               <div class="cont">
                   <p class="alert" style="max-height: 5px;"></p>
                   @yield('admin-only')
                   @yield('search')
                   @if(isset($error))
                   <p class="alert">{!!$error!!}</p>
                   @endif
               </div>
                   {!!HTML::script('js/jquery-1.11.1.min.js')!!}
                   {!! HTML::script('js/backstretch.js') !!}
                   {!!HTML::script('datetimepicker-master/jquery.datetimepicker.js')!!}
                   {!! HTML::script('js/jquery_ui.js') !!}
                   <script>
                       $.noConflict();

                       !function($){
                           $(function(){
                               $('[data-toggle="tooltip"]').tooltip('toggle');
                               $.ajaxSetup({
                                   headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                               });
                               $(document).ajaxSend(function(){
                                   $('.alert').text('Sending request to remote server...').addClass("alert-warning").fadeOut(3000).removeClass("alert-warning");
                               });
//                           $(document).ajaxComplete(function(){
//                               $('.alert').fadeIn(100).text('Request Completed.').removeClass('alert-warning').addClass("alert-success").fadeOut(3000);
//
//                           });

                               $(".datetimepicker").datetimepicker({
                                   mask:false,
                                   format:'Y/m/d H:i',
                                   timepicker:true,
                                   datepicker:true
                               });

                               $('body').backstretch([
                                       "{!!URL::to('/public_gallery/images/1.jpg')!!}",
                                       "{!!URL::to('/public_gallery/images/2.jpg')!!}",
                                       "{!!URL::to('/public_gallery/images/3.jpg')!!}",
                                       "{!!URL::to('/public_gallery/images/4.jpg')!!}",
                                       "{!!URL::to('/public_gallery/images/5.jpg')!!}",
                                       "{!!URL::to('/public_gallery/images/6.jpg')!!}",
                                       "{!!URL::to('/public_gallery/images/7.jpg')!!}"
                                   ],{duration:3000, fade: 750});
                               $(".btn-success").click(function(){
                                   var news_title=$("input[name=title]").val();
                                   var action=$("input[name=action]").val();
                                   var content=$("textarea[name=content]").val();
                                   var created_at=$("input[name=created_at]").val();
                                   content=content.replace(/(\n)+/g, '<br>');
                                   var _token=$('input[name=_token]').val();
                                   var slug=news_title.toLowerCase().replace(/([\^\!@\+#\$%^\,\.\'\"&*\s]){1,}/g,"-");
                                   //create our slug
                                   if(action==="/news/store"){

                                       //var dataString="title="+news_title+"&slug="+slug+"&content="+content+"&created_at="+created_at+"&_token="+_token;

                                       $.ajax({
                                           url:'{!!URL::to("news/store")!!}',
                                           type: "POST",
                                           data:{
                                               title: news_title,
                                               slug: slug,
                                               content: content,
                                               created_at: created_at,
                                               _token: _token
                                           }
                                           ,success:function(data){
                                               //if the data was validated without errors

                                               if(typeof data==="string"){
                                                   if($(".alert").hasClass("alert-danger")){
                                                       $(".alert").removeClass("alert-danger");
                                                   }
                                                   $(".alert").addClass("alert-success").text(data).fadeIn(2000).fadeOut(7000);
                                               }
                                               //if there are errors in validation
                                               else if(typeof data==="object"){
                                                   if($(".alert").hasClass("alert-success")){
                                                       $(".alert").removeClass("alert-success");
                                                   }

                                                   $(".alert").addClass("alert-danger");
                                                   for(var i=data.length-1; i>0; i--){
                                                       $(".alert").text(data[i]+$(".alert").text()).fadeIn(2000).fadeOut(7000);
                                                   }
                                               }
                                           }
                                       });

                                   }
                                   else{
                                       var id=$("input[name=id]").val();

                                       $.ajax({
                                           url:'{!!URL::to("news/update")!!}',
                                           type: "POST",
                                           data:{
                                               title: news_title,
                                               id: id,
                                               slug: slug,
                                               content: content,
                                               created_at: created_at,
                                               _token: _token

                                           }

                                       }).done(function(data){
                                                   if(typeof data==="string"){
                                                       if($(".alert").hasClass("alert-danger")){
                                                           $(".alert").removeClass("alert-danger");
                                                       }
                                                       $(".alert").addClass("alert-success").text(data).fadeIn(2000).fadeOut(7000);
                                                   }
                                                   //if there are errors in validation
                                                   else if(typeof data==="object"){
                                                       if($(".alert").hasClass("alert-success")){
                                                           $(".alert").removeClass("alert-success");
                                                       }
                                                       // console.log(data);
                                                       $(".alert").addClass("alert-danger");
                                                       for(var i=data.length-1; i>0; i--){
                                                           $(".alert").text(data[i]+$(".alert").text()).fadeIn(2000).fadeOut(7000);
                                                       }
                                                   }
                                                   //
                                               });
                                   }
                               });
                               //remove news
                               $(".text-danger").click(function(){
                                   var id=$("input[name=_id]").val();
                                   $.ajax({
                                       url: "{!!URL::to('/news/delete')!!}",
                                       type: "POST",
                                       data: {
                                           id: id
                                       }
                                   }).done(function(data){
                                               $(".alert").fadeIn(2000).text(data+" news has been deleted.");
                                               window.location="{!!URL::to('/news')!!}";
                                           });
                               })
                               function getRss(){
                                   $("#rss").load('/news/rss');
                               }
                               function getRssApple(){
                                   $("#rss_apple").load('/news/rss/apple');
                               }
                               window.setInterval(getRss,10000*6);
                               window.setInterval(getRssApple,10000*6);
                           });
                       }(window.jQuery);
                   </script>

                   @include('../scripts')
                   <script>
                       !function($){
                           $(function(){
                               $('#rss').mCustomScrollbar({
                                   axis: 'y',
                                   theme: "dark",
                                   scrollButtons:{
                                       enable:true
                                   },
                                   scrollInertia:100
                               });
                               $('#rss').mCustomScrollbar({
                                   theme: "dark",
                                   axis: 'y',
                                   scrollButtons:{
                                       enable:true
                                   },
                                   scrollInertia:100
                               });
                           });
                       }(jQuery);
                   </script>

           </body>
        </html>