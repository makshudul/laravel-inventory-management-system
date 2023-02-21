
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
    <link href="{{ asset('dashboard_asset/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dashboard_asset/lib/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard_asset/css/bracket.css')}}">
  </head>

  <body>
      <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
        <video src="{{ asset('dashboard_asset/videos/login.mp4') }}" autoplay loop muted class="wd-100p ht-100p object-fit-cover"></video>
        <div class="overlay-body bg-black-6 d-flex align-items-center justify-content-center">
      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Sing <span class="tx-info">Up</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40">Please Sing-up Your Information </div>

        <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <x-label for="name" :value="__('Name')" />
          <input type="text" class="form-control" placeholder="Enter your username" id="name" name="name" :value="old('name')" require autofocus>
        </div><!-- form-group -->
        <div class="form-group">
        <x-label for="email" :value="__('Email')" />
          <input type="email" class="form-control" placeholder="Enter your Email" id="email" name="email" :value="old('email')" required>
        </div><!-- form-group -->
        <div class="form-group">
        <x-label for="password" :value="__('Password')" />
          <input type="password" class="form-control" placeholder="Enter your Password" id="password" name="password" required autocomplete="new-password">
        </div><!-- form-group -->
        <div class="form-group">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
          <input type="password" class="form-control" placeholder="Enter your Conform Password" id="password_confirmation" name="password_confirmation" required>
        </div><!-- form-group -->
        <div class="form-group tx-12"><span style='color:red;font-weight: bold;'>N.B - If you Register! Please Wait for Admin Approved</span></div>
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>
        </form>

        <div class="mg-t-40 tx-center">Reready Register? <a href="{{ route('login') }}" class="tx-info">Log In</a></div>
      </div><!-- login-wrapper -->
      </div> <!-- overlay-body -->
    </div><!-- d-flex -->

    <script src="{{ asset('dashboard_asset/lib/jquery/jquery.min.js"></script>
    <script src="{{ asset('dashboard_asset/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{ asset('dashboard_asset/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard_asset/lib/select2/js/select2.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });
    </script>

  </body>
</html>
