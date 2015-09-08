
<header class="page-header header-user-dropdown-2">
<!--    <nav class="navbar navbar-costume-1 shadow-box">-->
<!--        <div class="container-fluid">-->
<!--            <!-- Brand and toggle get grouped for better mobile display -->
<!--            <div class="navbar-header">-->
<!--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
<!--                    <span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
<!--                <a class="navbar-brand myGlower" href="#">MICP ICT Arena</a>-->
<!--            </div>-->
<!---->
<!--            <!-- Collect the nav links, forms, and other content for toggling -->
<!--            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
<!--                <ul class="nav navbar-nav">-->
<!--                    <li class="item active"><a href="#">Home<span class="sr-only">(current)</span></a></li>-->
<!--                    <li class="item active"><a href="/public-gallery">Public Gallery</a></li>-->
<!--                    <li class="item active dropdown">-->
<!--                        <a href="/news" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">News<span class="caret"></span></a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            <li><a href="/news">News</a></li>-->
<!--                            <li role="separator" class="divider"></li>-->
<!--                          @if(Auth::check())-->
<!--                            <li><a href="/news/create">Publish a Story</a></li>-->
<!--                            <li><a href="/news/unpublished">View all unpublished news</a></li>-->
<!--                          @endif-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--                <form class="navbar-form navbar-left" role="search">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" class="form-control" placeholder="Search">-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-default">Submit</button>-->
<!--                </form>-->
<!--                <ul class="nav navbar-nav navbar-right">-->
<!--                    <li class="item active"><a href="#">About</a></li>-->
<!---->
<!--                    <li class="item active dropdown">-->
<!--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account<span class="caret"></span></a>-->
<!--                        <ul class="dropdown-menu">-->
<!--                            @if(Auth::check())-->
<!--                                <li class="btn-dark"><a href="#{!!Session::get('email')!!}">{!!Session::get('email')!!}</a></li>-->
<!--                                <li  role="separator" class="divider"></li>-->
<!--                                <li class="btn-dark"><a href="/logout?url={!!Request::url()!!}">Logout</a></li>-->
<!--                            @else-->
<!--                                <li class="btn-dark"><a href="/login?url={!!Request::url()!!}">Log In</a></li>-->
<!--                                <li class="btn-dark"><a href="/register">Signup</a></li>-->
<!--                            @endif-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div><!-- /.navbar-collapse -->
<!--        </div><!-- /.container-fluid -->
<!--    </nav>-->



      <!--New Style -->
<nav class="navbar navbar-costume-1 shadow-box ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-left" id="bs-example-navbar-collapse-1">
            <div class="header-limiter">
                <h1><a href="#">MICP ICT Arena&nbsp;<span class="badge">Baybay</span></a></h1>

                <nav>
                    <ul><!--            <a href="#">(current)</a>-->
                        <a href="#">Projects</a>
                        <a href="#">About</a>
                        <div class="dropdown">
                            <span class="caret" style="margin-left:0; padding-left: 4px;"></span>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                News <span class="header-new-feature">new</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/news">News</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/news/create">Create News</a></li>
                                <li><a href="/news/unpublished">View all unpublished news</a></li>
                            </ul>
                        </div>
                    <ul>
                </nav>
            </div>
        </div>
        <div class="collapse navbar-collapse navbar-right">
            <div class="header-limiter">

                <div class="dropdown text-left">
                    @if(Auth::check())
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(Session::get('lname')!=null && Session::get('fname')!=null)
                           <span class="badge-2">Welcome, {!! Session::get('fname')!!}
                               {!!Session::get('lname')!!}</span>
                           <img src="{!!route('profile.prof_pic',Session::get('email'))!!}" alt=" {!!Session::get('email')!!}" class="img-badge"/>
                        @else
                            <span class="badge-2">Welcome, {!! Session::get('email')!!}</span>
                            <img src="{!!URL::to('css/assets/logo.png')!!}" alt=" {!!Session::get('email')!!}" class="img-badge"/>
                        @endif
                        <span class="caret"></span>
                    </a>
                    @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge-2">Welcome, Guest!!!</span>
                        <img src="{!!URL::to('css/assets/logo.png')!!}" alt="User Image" class="img-badge"/>
                        <span class="caret"></span>
                    </a>
                    @endif

                    <ul class="dropdown-menu">
                        @if(Auth::check())
                        <li><a href="#{!!Session::get('email')!!}">Profile Settings {!!Session::get('login_count')!!}</a></li>
                          @if(Session::get('type')=='admin')
                          <li><a href="/dash-board">Admin Panel and Dashboard</a></li>
                          @endif
                        <li><a href="/logout?url={!!Request::url()!!}">Logout</a></li>
                        @else
                        <li><a href="/login?url={!!Request::url()!!}">Log In</a></li>
                        <li><a href="/register">Register</a></li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
</nav>
</header>
<br>

