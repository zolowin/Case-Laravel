<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Login · Anh Tan Mobile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #e5e1dc;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .form-signin {
            max-width: 330px;
        }
    </style>
</head>
<body class="text-center">
<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <a href="{{ route('page.index') }}" title="back home"><img class="mb-4" src="{{ asset('img/logo.png') }}" alt=""
                                                               width="72" height="72"></a>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <div class="form-group">
        <label for="email" class="sr-only">Email address</label>
        {{--            <input type="email" id="inputEmail"  placeholder="Email address" required autofocus>--}}
        <input id="email" type="email" class="form-control"
               class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="sr-only">Password</label>
        {{--            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>--}}
        <input id="password" type="password"
               class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password"
               required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
        @enderror
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block mb-2" type="submit">Sign in</button>
    <a href="{{ route('get.login.social', 'google') }}" class="mt-2 mb-2">
        <i class="fa fa-google"></i>
        Sign in with Google
    </a>
    <i class="text-center mr-2">or</i>
    <a href="{{ route('register') }}" type="submit"><b class="font-italic">Register</b></a>
</form>
</body>
</html>

