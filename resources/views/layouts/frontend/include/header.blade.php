   <!-- ---- Topbar Start ---- -->
   <div class="topbar">
    <div class="container">
        <div class="topbar-wrapper section--padding-sm">
            <div class="topbar-items">
                <div class="topbar-item">
                    <i class="fa fa-phone icon"></i>
                    <span class="text">
                        اتصل بنا
                        <a href="tel:+96399991111" class="number">
                            +96399991111
                        </a>
                    </span>
                </div>
                <div class="topbar-item">
                    <i class="fa fa-truck icon"></i>
                    <span class="text">
                        التوصيل ضمن سوريا
                    </span>
                </div>
                <div class="topbar-item">
                    <i class="fa fa-check icon"></i>
                    <span class="text">
                        نقدم احدث الهدايا ولجميع الاعمار
                    </span>
                </div>
            </div><!-- ./topbar-items -->
        </div><!-- ./topbar-wrapper -->
    </div>
</div><!-- ./topbar -->
<!-- ---- Logobar Start ---- -->
<div class="logobar">
    <div class="container">
        <div class="logobar-wrapper section--padding-sm">
            <div class="logo-wrapper">
                <a href="{{ route('front.index') }}" class="logo">
                    <div class="logo-container">
                        <img src="{{ asset('dashboard/assets/images/22.jpg') }}" width="50" height="50" alt="logo">
                        <h1>هديتي</h1>
                    </div>
                </a>

              
            </div>
            <div class="search-wrapper">
                <form action="" method="">
                    <input placeholder="عن ماذا تبحث" />
                </form>
            </div>
            <div class="header-btns">
                <ul class="list-unstyled">
                    <!-- <li class="header-btn-item">
                        <button class="header-btn" data-hint="الإشعارات">
                            <i class="fa fa-bell-o"></i>
                        </button>
                        <div class="header-dropdown header-dropdown-start" tabindex="0">
                            <ul class="  list-unstyled">

                            </ul>
                            <div class="header-dropdown-bottom">
                                <a href="#" class="btn-more">عرض الكل</a>
                            </div>
                        </div>
                    </li> -->
                    <li class="header-btn-item">
                        <button class="header-btn" data-hint="المفضلة">
                            <i class="fa fa-heart-o"></i>
                        </button>
                        <div class="header-dropdown header-dropdown-end minifav header-minifav" tabindex="0">
                            <ul class="mini-list list-unstyled">
                                @foreach ($favorite as $item)
                                <li class="mini-item">
                                    <div class="actions">
                                        <form method="POST" action="{{ route('favorit.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        <button class="action-btn btn" data-type="remove"><i
                                                class="fa fa-close"></i></button>
                                        </form>
                                    </div>
                                    <div>
                                        <h5 class="title">
                                          {{$item->product->name}}
                                        </h5>
                                        <div class="info">
                                            <span>السعر : {{ $item->product->price }}</span> -
                                            <span>التصنيف : {{ $item->product->sub_category->category->name }}</span>
                                        </div>
                                    </div>
                                    <img src="{{ asset('images/product/'.$item->product->image_first) }}">
                                </li>
                                @endforeach
                           
                            
                            </ul>
                            <div class="header-dropdown-bottom">

                                <a href="{{ route('user.favorite') }}" class="btn-more">عرض الكل</a>
                            </div>
                        </div>
                    </li>
                    <li class="header-btn-item">
                        <button class="header-btn" data-hint="السلة">
                           <i class="fa fa-shopping-cart"></i>
                        </button>
                        <div class="header-dropdown header-dropdown-end minifav header-minifav" tabindex="0">
                            <ul class="mini-list list-unstyled">
                                @foreach ($order as $item)
                                <li class="mini-item">
                                    <div class="actions">
                                        <form method="POST" action="{{ route('order.destroy', $item->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        <button class="action-btn btn" data-type="remove"><i
                                                class="fa fa-close"></i></button>
                                        </form>
                                    </div>
                                    <div>
                                        <h5 class="title">
                                          {{$item->product->name}}
                                        </h5>
                                        <div class="info">
                                            <span>السعر : {{ $item->product->price }}</span> -
                                            <span>التصنيف : {{ $item->product->sub_category->category->name }}</span>
                                        </div>
                                    </div>
                                    <img src="{{ asset('images/product/'.$item->product->image_first) }}">
                                </li>
                                @endforeach
                           
                            
                            </ul>
                            <div class="header-dropdown-bottom">

                                <a href="{{ route('user.order') }}" class="btn-more">عرض الكل</a>
                            </div>
                        </div>
                    </li>
                    <li class="header-btn-item">
                        <button class="header-btn" data-hint="الحساب">
                            <i class="fa fa-user-o"></i>
                        </button>
                        <div class="header-dropdown header-dropdown-end" tabindex="0">
                            <ul class="list-unstyled">
                                @if (Auth::check())
                               
                                <li class="header-dropdown-item">
                                    <a href="{{ route('user.show') }}"> الصفحة الشخصية</a>
                                </li>
                                <br>
                                <li class="header-dropdown-item">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                               
                                   تسجيل الخروج
                                    </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                            @else
                                <li class="header-dropdown-item">
                                    <a href="{{ route('login') }}">تسحيل الدخول </a>
                                </li>
                                <br>
                                <li class="header-dropdown-item">
                                    <a href="{{ route('register') }}"> إنشاء حساب </a>
                                </li>
                            @endif
                            
                                </div>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- ./logobar-wrapper -->
    </div>
</div><!-- ./logobar -->