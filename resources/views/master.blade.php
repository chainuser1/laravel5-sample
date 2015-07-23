
<!DOCTYPE html>
        <html>
            <head>
                @include('style')
                @yield('title')
                <title>MICP Arena: Laravel 5 Sample</title>
            </head>
            <body>
                @include('header')
                <div class="container">
                    <header id="header">
                        <div class="jumbotron">
                            <h1>Laravel 5: New Auth Generators and User Authentication</h1>
                        </div>
                    </header>
                    <div class="row">
                        @yield('main')
                    </div>
                </div>
                @include('scripts')
                {!! HTML::script('js/directorySlideshow.js') !!}

                <script>
                    $.noConflict();
                    !function($){
                       $(function(){

                       });
                    }(jQuery);
                </script>
            </body>

        </html>