
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('backend.includes.head')
   @include('backend.includes.css')
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('backend.includes.leftbar')
    
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('backend.includes.topbar')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('backend.includes.rightbar')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
   

          @yield('content')
    
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
   


    @include('backend.includes.js')
  </body>
</html>
