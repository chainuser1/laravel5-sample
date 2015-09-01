
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
                <div class="container">

                    <div class="row">
                        @yield('main')
                    </div>
                </div>

                <input type="hidden" value="{!!URL::to('/').'/public_gallery/images'!!}" name="gallery"/>
                {!!HTML::script('js/jquery-1.11.1.min.js')!!}
                {!!HTML::script('js/picedit.min.js')!!}

                {!!HTML::script('datetimepicker-master/jquery.datetimepicker.js')!!}
                <script>
                    !function($){
                        $(function(){
                            $("input[name=birthday]").datetimepicker({
                                mask:false,
                                format: "M-d,Y"
                            });
                            $("input[name=prof_pic]").picEdit();
                        });
                    }(jQuery);
                </script>
                @include('scripts')
                {!! HTML::script('js/directorySlideshow.js') !!}

            </body>
        </html>