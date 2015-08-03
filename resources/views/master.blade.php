
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
                            <h1 class="center">MICP-ICT Arena</h1>
                        </div>
                    </header>
                    <div class="row">
                        @yield('main')
                    </div>
                </div>
                <input type="hidden" value="{!!URL::to('/').'/public_gallery/images'!!}" name="gallery"/>
                @include('scripts')
                {!! HTML::script('js/directorySlideshow.js') !!}

            </body>
        </html>