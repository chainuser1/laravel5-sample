<!DOCTYPE html>
        <html>
            <head>
                {!!HTML::style('css/app.css')!!}
                {!!HTML::style('css/app.css')!!}
            </head>
            <body>
                <header>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">MICP ICT Arena</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                                    <li><a href="/public_gallery">Public Gallery</a></li>
<!--                                    <li class="dropdown">-->
<!--                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
<!--                                        <ul class="dropdown-menu">-->
<!--                                            <li><a href="#">Action</a></li>-->
<!--                                            <li><a href="#">Another action</a></li>-->
<!--                                            <li><a href="#">Something else here</a></li>-->
<!--                                            <li role="separator" class="divider"></li>-->
<!--                                            <li><a href="#">Separated link</a></li>-->
<!--                                            <li role="separator" class="divider"></li>-->
<!--                                            <li><a href="#">One more separated link</a></li>-->
<!--                                        </ul>-->
<!--                                    </li>-->
                                    <li><a href="#">News</a></li>
                                </ul>
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <button type="submit" class="btn btn-default">Submit</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#">About</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                           @if(isset($uname))
                                            <li><a href="#">{{$uname}}</a></li>
                                            <li role="separator" class="divider">Logout</li>
                                           @else
                                            <li><a href="/login">Log In</a></li>
                                           @endif
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </header>
                <article class="container-fluid">
                    @yield('content')
                </article>
                <footer>

                </footer>
                {!! HTML::script('js/app.js') !!}
                {!! HTML::script('js/directorySlideshow.js') !!}
                <script>
                    $.noConflict();
                    !function($){
                       $(function(){
                           $.ajaxSetup({
                               headers: {
                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                               }
                           });
                            $(".close").click(function(){$("#loginModal").fadeOut(4000).toggleClass("show",false);});
                            $("#login").click(function(){
                                var uname=$("#uname").val();
                                var pword=$("#pword").val();
                                alert(uname);
                                $.post("/account_signin",
                                        {
                                            uname: uname,
                                            pword: pword
                                        },
                                        function(data){
                                            alert(data);
                                        }
                                )
                            });
                            $(".gallerySlider").directorySlider({
                                animation: 'fade',
                                filebase: 'slide_',
                                directory: '{!!url("/gallery/images")!!}',
                                extension: 'jpg',
                                height: 450
                            });
                       });
                    }(jQuery);
                </script>
            </body>

        </html>