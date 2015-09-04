
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
                @include('scripts'}

                {!!HTML::script('datetimepicker-master/jquery.datetimepicker.js')!!}
                <script>
                    !function($){
                        $(function(){
                            $("input[name=birthday]").datetimepicker({
                                mask:false,
                                format: "M-d,Y"
                            });
                            $("input[name=prof_pic]").picEdit({
                                maxWidth: 225,
                                maxHeight:225
                            });
                        });
                    }(jQuery);
                </script>
                @include('scripts')


            </body>
        </html>