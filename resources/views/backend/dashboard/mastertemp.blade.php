<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend.dashboard._header');
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->

    @include('backend.dashboard._menubar');
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
   @include('backend.dashboard._headpanel');
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          @yield('breadcrumb')
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">


                         {{-- any code add here  --}}
                         @yield('content')



      </div><!-- br-pagebody -->
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



        @include('backend.dashboard._footer');

        @yield('footer')

  </body>
</html>
