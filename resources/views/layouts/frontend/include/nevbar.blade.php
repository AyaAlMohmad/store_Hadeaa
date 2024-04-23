<div class="navbar" id="navbar">
    <div class="container">
        <div class="navbar-wrapper ">
            <div class="nav-list-wrapper">
                <ul class="nav-list list-unstyled">
                 @foreach ($menu as $item )
                 <li class="nav-item has-menu">
                    <a class="nav-item-link" href="{{ route($item->name .'.index') }}">
                        {{ $item->title }}
                    </a>
                    {{-- <div class="nav-item-menu section--padding-md">
                        <div class="container">
                            <div class="nav-menu-cols">
                                <div class="menu-col categories-col">
                                    <div class="col-group">
                                        <h4 class="col-group-title">الفئة العمرية</h4>
                                        <div class="col-group-items">
                                            <ul class="list-unstyled">
                                                <li class="col-group-item">
                                                    <a href="#">ولادي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">نسائي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">رجالي</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-group">
                                        <h4 class="col-group-title">النوع</h4>
                                        <div class="col-group-items">
                                            <ul class="list-unstyled">
                                                <li class="col-group-item">
                                                    <a href="#">رسمي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">رياضي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">شيك</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-group">
                                        <h4 class="col-group-title">الفئة العمرية</h4>
                                        <div class="col-group-items">
                                            <ul class="list-unstyled">
                                                <li class="col-group-item">
                                                    <a href="#">ولادي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">ولادي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">ولادي</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-group">
                                        <h4 class="col-group-title">الفئة العمرية</h4>
                                        <div class="col-group-items">
                                            <ul class="list-unstyled">
                                                <li class="col-group-item">
                                                    <a href="#">ولادي</a>
                                                </li>
                                                <li class="col-group-item">
                                                    <a href="#">ولادي</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-col products-col">
                                    <div class="category-products">
                                        <div class="main-item">
                                            <a href="#">
                                                <img src="assets/images/Clothes/1.webp">
                                            </a>
                                        </div>
                                        <div class="side-products">
                                            <img src="assets/images/Clothes/2.jpg">
                                            <img src="assets/images/Clothes/9.jpg">
                                            <img src="assets/images/Clothes/3.jpg">
                                        </div>
                                    </div>
                                    <div class="category-offer">
                                        <a href="#"> <img src="assets/images/offer.png"> </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div> --}}
                </li>
                 @endforeach
           
                </ul>
            </div><!-- ./navbar-items -->
        </div><!-- ./navbar-wrapper -->
    </div>
</div>