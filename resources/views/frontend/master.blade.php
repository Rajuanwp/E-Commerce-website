
<!DOCTYPE html>
<html lang="en">

@include('frontend.includes.head')

<body class="home">
    <div class="page-wrapper">
      
        <!-- Start of Header -->
        @include('frontend.includes.header')
        <!-- End of Header -->

       @yield('content')

        <!-- Start of Footer -->
        @include('frontend.includes.footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->

    <!-- Start of Sticky Footer -->
    @include('frontend.includes.sticky_footer')
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg> </a>
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
                @include('frontend.includes.mobile_menu')
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->
                @include('frontend.includes.newslater_popup')
    <!-- End of Newsletter popup -->

    <!-- Start of Quick View -->
                @include('frontend.includes.quick_view')
    <!-- End of Quick view -->
    @include('frontend.includes.script')

  
</body>

</html>