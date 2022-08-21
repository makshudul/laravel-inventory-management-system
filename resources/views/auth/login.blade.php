<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Bracket Plus Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('dashboard_asset/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/bracket.css')}}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center ht-100v">
    <video src="{{ asset('dashboard_asset/videos/login.mp4') }}" autoplay loop muted class="wd-100p ht-100p object-fit-cover"></video>
      <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 rounded bd bd-white-2 bg-black-7">
          <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">[</span> bracket <span class="tx-info">plus</span> <span class="tx-normal">]</span></div>
          <div class="tx-white-5 tx-center mg-b-60">The Admin Template For Perfectionist</div>
              <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <div class="mb-4 text-danger" :errors="$errors"  ><x-auth-validation-errors /></div>

          <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="form-group">
            <label  for="email" :value="__('Email')"></label>
            <input type="email" class="form-control fc-outline-dark" id="email"  placeholder="Enter your Email" name="email" :value="old('email')" required autofocus >
          </div><!-- form-group -->
          <div class="form-group">
            <label for="password" :value="__('Password')"></label>
            <input type="password" class="form-control fc-outline-dark" placeholder="Enter your password" name="password" required autocomplete="current-password">
            {{-- @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            @endif --}}

          </div><!-- form-group -->
          <button type="submit" class="btn btn-info btn-block">Sign In</button>
          </form>
          <div class="mg-t-60 tx-center">Not yet a member? <a href="" class="tx-info">Sign Up</a></div>
        </div><!-- login-wrapper -->
      </div><!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{ asset('dashboard_asset/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('dashboard_asset/lib/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{ asset('dashboard_asset/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  </body>
</html>
