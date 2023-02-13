<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href="{{Route('dashboard')}}"><span><img height="150px"
                src="{{asset('backend/company_logo/bitlogo.png')}}" alt=""></span></a></div>
<div class="br-sideleft sideleft-scrollbar">

    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="{{Route('dashboard')}}" class="br-menu-link  ">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <!-- <li class="br-menu-item">
<a href="#" class="br-menu-link with-sub">
<i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
<span class="menu-item-label disable">Admin</span>
</a>
<ul class="br-menu-sub">
<li class="sub-item"><a href="" class="sub-link">Add Admin</a></li>
<li class="sub-item"><a href="card-social.html" class="sub-link">List Admin</a></li>
</ul>
</li> -->
        <li class="br-menu-item mt-3">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">Company Info</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{Route('add_company')}}" class="sub-link">Add Info</a></li>
                <li class="sub-item"><a href="{{Route('show_company')}}" class="sub-link">View Info</a></li>

            </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
                <span class="menu-item-label">Category</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{Route('categoriesCreate')}}" class="sub-link">Add category</a></li>
                <li class="sub-item"><a href="{{Route('categoriesIndex')}}" class="sub-link">Manage Category</a></li>



            </ul>
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
                <span class="menu-item-label">Menu</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('NavMenuCreate')}}" class="sub-link">Add Menu</a></li>
                <li class="sub-item"><a href="{{route('NavMenuIndex')}}" class="sub-link">Manage NavMenu </a></li>

            </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Slider</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{Route('slider')}}" class="sub-link">Add Slider</a></li>
                <li class="sub-item"><a href="{{Route('sliderShow')}}" class="sub-link">All Slider</a></li>
            </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Card</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub nav flex-column">
                <li class="sub-item"><a href="{{route('cardAdd')}}" class="sub-link">Add Card</a></li>
                <li class="sub-item"><a href="{{Route('cardShow')}}" class="sub-link">Show Card</a></li>
            </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
                <span class="menu-item-label">Our Clients</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{route('clintdAdd')}}" class="sub-link">Add Clients</a></li>
                <li class="sub-item"><a href="{{route('allClients')}}" class="sub-link">All Clients</a></li>

            </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
                <span class="menu-item-label">Brand Module</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{Route('addBrand')}}" class="sub-link">Add Brand</a></li>
                <li class="sub-item"><a href="{{Route('showBrand')}}" class="sub-link">Manage Brand</a></li>

            </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
                <span class="menu-item-label">Size Module</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{Route('AddSize')}}" class="sub-link">Add Size</a></li>
                <li class="sub-item"><a href="{{Route('ShowSize')}}" class="sub-link">Manage Size</a></li>

            </ul>
        </li><!-- br-menu-item -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
                <span class="menu-item-label">Colour Module</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item"><a href="{{Route('AddColour')}}" class="sub-link">Add Colour</a></li>
                <li class="sub-item"><a href="{{Route('ShowColour')}}" class="sub-link">Manage Size</a></li>

            </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub">
                <i class="menu-item-icon icon ion-ios-color-filter-outline tx-24"></i>
                <span class="menu-item-label">Product Module</span>
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub">

                <li class="sub-item"><a href="{{Route('AddProduct')}}" class="sub-link">Add Product</a></li>
                <li class="sub-item"><a href="{{Route('ShowProduct')}}" class="sub-link">Manage Product</a></li>

            </ul>
        </li><!-- br-menu-item -->


        <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->
