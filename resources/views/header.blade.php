<header class="page-header">
    <nav class="navbar navbar-default shadow-box">
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
                    <li class="item active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
                    <li class="item active"><a href="/public_gallery">Public Gallery</a></li>
                    <li class="item active dropdown">
                        <a href="/news" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/news">View all news</a></li>
                            <li role="separator" class="divider"></li>
                          @if(Auth::check())
                            <li><a href="/news/create">Publish a Story</a></li>
                          @endif
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li class="item active"><a href="#">About</a></li>

                    <li class="item active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @if(Auth::check())
                                <li class="btn-dark"><a href="#{!!Session::get('email')!!}">{!!Session::get('email')!!}</a></li>
                                <li  role="separator" class="divider"></li>
                                <li class="btn-dark"><a href="/logout?url={!!Request::url()!!}">Logout</a></li>
                            @else
                                <li class="btn-dark"><a href="/login?url={!!Request::url()!!}">Log In</a></li>
                                <li class="btn-dark"><a href="/register">Signup</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>