
<!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @include('style')
                @yield('title')
                <title>MICP Arena:

                    {!!Session::get('email')!!}

                </title>

            </head>
            <body>
                @include('header')
                <div class="cont">

                    <div class="container">

                        <div class="row">
                            @yield('main')
                        </div>
                    </div>
                    <div class="container-fluid">
                        @yield('admin')
                    </div>


                    <input type="hidden" value="{!!URL::to('/').'/public_gallery/images'!!}" name="gallery"/>
                    {!!HTML::script('js/jquery-1.11.1.min.js')!!}
                    {!! HTML::script('js/backstretch.js') !!}
                    {!!HTML::script('js/picedit.js')!!}
                    {!!HTML::script('datetimepicker-master/jquery.datetimepicker.js')!!}
                </div>
                    <script>
                        !function($){
                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
                            });
                            $(function(){
                                //make a random background images  as carousel
                                $('body').backstretch([
                                    "{!!URL::to('public_gallery/images/1.jpg')!!}",
                                    "{!!URL::to('public_gallery/images/2.jpg')!!}",
                                    "{!!URL::to('public_gallery/images/3.jpg')!!}",
                                    "{!!URL::to('public_gallery/images/4.jpg')!!}",
                                    "{!!URL::to('public_gallery/images/5.jpg')!!}",
                                    "{!!URL::to('public_gallery/images/6.jpg')!!}",
                                    "{!!URL::to('public_gallery/images/7.jpg')!!}"
                                ],{duration:3000, fade: 750});
                                $("input[name=birthday]").datetimepicker({
                                    mask:false,
                                    format: "M-d,Y"
                                });
                                $("input[name=prof_pic]").picEdit({
                                    maxWidth: 225,
                                    maxHeight:225,
                                    formSubmitted: function(response){
                                        alert(response.responseText);
                                    },
                                    redirectUrl:"{!!URL::to('/')!!}"
                                });
                                $(".text-success").click(function(){
                                    var link=$(this).text();
                                    switch(true){
                                        case /Dashboard/.test(link):
                                            $('#control-panel').load("{!!URL::to('/dash-board/board')!!}")
                                            break;
                                        case /Accounts/.test(link):
                                            $('#control-panel').load("{!!URL::to('/dash-board/users')!!}");
                                            break;
                                        case /Roles/.test(link):
                                            $('#control-panel').load("{!!URL::to('/dash-board/roles')!!}");
                                            break;
                                        case /Forms/.test(link):
                                            $('#control-panel').load("{!!URL::to('/dash-board/forms')!!}")
                                            ;break;
                                        case /Feedback/.test(link):
                                            $('#control-panel').load("{!!URL::to('/dash-board/feedback')!!}");break;
                                        case /Settings/.test(link):
                                            $('#control-panel').load("{!!URL::to('/dash-board/settings')!!}");
                                            break;
                                    }
                                });

                            });
                        }(jQuery);
                    </script>
                    @include('scripts')



            </body>
        </html>