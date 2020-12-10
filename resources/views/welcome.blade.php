<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href={{ url("assets/images/favicon.ico") }}>

    <title>Lis</title>

    <link rel="stylesheet" href={{ url("assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css") }}>
    <link rel="stylesheet" href={{ url("assets/css/font-icons/entypo/css/entypo.css") }}>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href={{ url("assets/css/bootstrap.css") }}>
    <link rel="stylesheet" href={{ url("assets/css/neon-core.css") }}>
    <link rel="stylesheet" href={{ url("assets/css/neon-theme.css") }}>
    <link rel="stylesheet" href={{ url("assets/css/neon-forms.css") }}>
    <link rel="stylesheet" href={{ url("assets/css/custom.css") }}>

    <script src={{ url("assets/js/jquery-1.11.3.min.js") }}></script>

<!--[if lt IE 9]><script src={{ url("assets/js/ie8-responsive-file-warning.js") }}></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
    var baseurl = '';
</script>

<div class="login-container">

    <div class="login-header login-caret">

        <div class="login-content">

            <a href="index.html" >
                <a href="#" class="logo">
                    <img src={{ url("assets/images/ddl_logo.png") }} width="120" alt="" />
                </a>
                {{--                <h1 style="color: white;">LIS</h1>--}}
            </a>

            <p class="description">Dear user, log in to access the admin area!</p>

            <!-- progress bar indicator -->
            <div class="login-progressbar-indicator">
                <h3>43%</h3>
                <span>logging in...</span>
            </div>
        </div>

    </div>

    <div class="login-progressbar">
        <div></div>
    </div>

    <div class="login-form">

        <div class="login-content">

            <div class="form-login-error">
                <h3>Invalid login</h3>
                <p>Enter <strong>demo</strong>/<strong>demo</strong> as login and password.</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" role="form">
                    @csrf

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-user"></i>
                            </div>

                            <input id="email" type="email" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>

                            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>


                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                    {{--                        <div class="col-md-6">--}}
                    {{--                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

                    {{--                            @error('password')--}}
                    {{--                            <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $message }}</strong>--}}
                    {{--                                    </span>--}}
                    {{--                            @enderror--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group row">--}}
                    {{--                        <div class="col-md-6 offset-md-4">--}}
                    {{--                            <div class="form-check">--}}
                    {{--                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                                <label class="form-check-label" for="remember">--}}
                    {{--                                    {{ __('Remember Me') }}--}}
                    {{--                                </label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div class="form-group">--}}
                    {{--                        <button type="submit" class="btn btn-primary btn-block btn-login">--}}
                    {{--                            <i class="entypo-login"></i>--}}
                    {{--                            Login In--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}

                    <div class="form-group">
                        {{--                        <div class="col-md-8 offset-md-4">--}}
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            {{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--                                    {{ __('Forgot Your Password?') }}--}}
                            {{--                                </a>--}}
                        @endif
                        {{--                        </div>--}}
                    </div>
                </form>
            </div>

            {{--            <form method="post" role="form" id="form_login">--}}

            {{--                <div class="form-group">--}}

            {{--                    <div class="input-group">--}}
            {{--                        <div class="input-group-addon">--}}
            {{--                            <i class="entypo-user"></i>--}}
            {{--                        </div>--}}

            {{--                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" />--}}
            {{--                    </div>--}}

            {{--                </div>--}}

            {{--                <div class="form-group">--}}

            {{--                    <div class="input-group">--}}
            {{--                        <div class="input-group-addon">--}}
            {{--                            <i class="entypo-key"></i>--}}
            {{--                        </div>--}}

            {{--                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />--}}
            {{--                    </div>--}}

            {{--                </div>--}}

            {{--                <div class="form-group">--}}
            {{--                    <button type="submit" class="btn btn-primary btn-block btn-login">--}}
            {{--                        <i class="entypo-login"></i>--}}
            {{--                        Login In--}}
            {{--                    </button>--}}
            {{--                </div>--}}

            {{--                <!----}}

            {{--                You can also use other social network buttons--}}
            {{--                <div class="form-group">--}}

            {{--                    <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">--}}
            {{--                        Login with Twitter--}}
            {{--                        <i class="entypo-twitter"></i>--}}
            {{--                    </button>--}}

            {{--                </div>--}}

            {{--                <div class="form-group">--}}

            {{--                    <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">--}}
            {{--                        Login with Google+--}}
            {{--                        <i class="entypo-gplus"></i>--}}
            {{--                    </button>--}}

            {{--                </div> -->--}}

            {{--            </form>--}}


            {{--            <div class="login-bottom-links">--}}

            {{--                <a href="extra-forgot-password.html" class="link">Forgot your password?</a>--}}

            {{--                <br />--}}


            {{--            </div>--}}

        </div>

    </div>

</div>


<!-- Bottom scripts (common) -->
<script src={{ url("assets/js/gsap/TweenMax.min.js") }}></script>
<script src={{ url("assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js") }}></script>
<script src={{ url("assets/js/bootstrap.js") }}></script>
<script src={{ url("assets/js/joinable.js") }}></script>
<script src={{ url("assets/js/resizeable.js") }}></script>
<script src={{ url("assets/js/neon-api.js") }}></script>
<script src={{ url("assets/js/jquery.validate.min.js") }}></script>
<script src={{ url("assets/js/neon-login.js") }}></script>


<!-- JavaScripts initializations and stuff -->
<script src={{ url("assets/js/neon-custom.js") }}></script>

<!-- Demo Settings -->
<script src={{ url("assets/js/neon-demo.js") }}></script>

</body>
</html>
