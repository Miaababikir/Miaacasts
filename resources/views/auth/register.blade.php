
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS - Register</title>

    <!-- Styles -->
    <link href="css/core.min.css" rel="stylesheet">
    <link href="css/thesaas.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="icon" href="img/favicon.png">
</head>

<body class="mh-fullscreen bg-img center-vh p-20" style="background-image: url(img/bg-girl.jpg);">




<div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
    <h5 class="text-uppercase text-center">Register</h5>
    <br><br>

    <form class="form-type-material" action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Full name" name="name">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email address" name="email">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>

        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">I agree to all <a class="text-primary" href="#">terms</a></span>
            </label>
        </div>

        <br>
        <button class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
    </form>

    <hr class="w-30">

    <p class="text-center text-muted fs-13 mt-20">Already have an account? <a href="page-login.html">Sign in</a></p>
</div>




<!-- Scripts -->
<script src="js/core.min.js"></script>
<script src="js/thesaas.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>