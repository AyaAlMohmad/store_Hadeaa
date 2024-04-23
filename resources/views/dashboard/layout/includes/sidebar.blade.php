<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
   
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li class="{{ Request::route()->getName() == 'dash.index' ? 'active' : '' }}">
                    <a href="{{ route('dash.index') }}" class="waves-effect">

                        <i class="dripicons-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'menus.index' ? 'active' : '' }}">
                    <a href="{{ route('menus.index') }}">

                        <i class="dripicons-archive "></i>
                        <span>Menu </span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'contacts.index' ? 'active' : '' }}">
                    <a href="{{ route('contacts.index') }}">

                        <i class="ion ion-md-call  "></i>
                        <span>Contact us </span>
                    </a>
                </li>
                <li class="{{ Request::route()->getName() == 'comments.index' ? 'active' : '' }}">
                    <a href="{{ route('comments.index') }}">

                        <i class="ion ion-md-paper   "></i>
                        <span>Comments </span>
                    </a>
                </li>
                <li class=" {{ Request::route()->getName() == 'abouts.index' ? 'active' : '' }}">

                    <a href="{{ route('abouts.index') }}"><i class="dripicons-briefcase"></i>
                        <span> About </span>
                    </a>

                </li>
                <li class=" {{ Request::route()->getName() == 'categories.index' ? 'active' : '' }}">

                    <a href="{{ route('categories.index') }}"><i class="typcn typcn-flow-merge "></i>
                        <span>Category </span>
                    </a>

                </li>
                <li class=" {{ Request::route()->getName() == 'sub_categories.index' ? 'active' : '' }}">

                    <a href="{{ route('sub_categories.index') }}"><i class="typcn typcn-th-list-outline "></i>
                        <span> Sub Category </span>
                    </a>

                </li>
                <li class=" {{ Request::route()->getName() == 'socials.index' ? 'active' : '' }}">

                    <a href="{{ route('socials.index') }}"><i class="fas fa-mail-bulk "></i>
                        <span> Social Media</span>
                    </a>

                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ion ion-ios-gift "></i> <span>
                            Products
                        </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyl">
                        <li class=" {{ Request::route()->getName() == 'additions.index' ? 'active' : '' }}">

                            <a href="{{ route('additions.index') }}"><i class="fas fa-gifts  "></i>
                                <span> Additions Product </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'colors.index' ? 'active' : '' }}">

                            <a href="{{ route('colors.index') }}"><i class="fas fa-highlighter "></i>
                                <span>Colors</span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'products.index' ? 'active' : '' }}">

                            <a href="{{ route('products.index') }}"><i class="fas fa-gem  "></i>
                                <span>Products</span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'orders.index' ? 'active' : '' }}">

                            <a href="{{ route('orders.index') }}"><i class="mdi mdi-cart-arrow-right mdi-24px"></i>
                                <span> Order</span>
                            </a>

                        </li>
                         <li class=" {{ Request::route()->getName() == 'order_additions.index' ? 'active' : '' }}">

                            <a href="{{ route('order_additions.index') }}"><i class="mdi mdi-cart-arrow-right mdi-24px"></i>
                                <span> Order Addition</span>
                            </a>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner 
  -->
</div>
