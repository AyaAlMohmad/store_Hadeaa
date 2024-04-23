@extends('layouts.frontend.app')

@section('content')
<section class="profile-details section--padding-md">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="user-info-card">
                    <img src="{{ asset('frontend/assets/images/avatar2.png') }}">
                    <h2 class="username">
                        {{ Auth::user()->name }} 
                    </h2>
                    <div class="stats">
                        <div class="stat-item">
                            <i class="fa fa-tag"></i>
                            <span class="count">1500</span>
                            <span class="title">منتج تم شراؤه</span>
                        </div>
                        <div class="stat-item">
                            <i class="fa fa-money"></i>
                            <span class="count">1500</span>
                            <span class="title">منتج تم شراؤه</span>
                        </div>
                        <div class="stat-item">
                            <i class="fa fa-user"></i>
                            <span class="count">1500</span>
                            <span class="title">منتج تم شراؤه</span>
                        </div>
                        <div class="stat-item">
                            <i class="fa fa-user"></i>
                            <span class="count">1500</span>
                            <span class="title">منتج تم شراؤه</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="">
                    <div class="tabs-header">
                        <ul class="tabs-list">
                            <li class="{{ Route::currentRouteName() == 'user.show' ? 'active' : '' }}">
                                <a href="{{ route('user.show') }}">المعلومات الشخصية</a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'user.favorite' ? 'active' : '' }}">
                                <a href="{{ route('user.favorite') }}">المفضلة</a>
                                {{-- {{ route('user.favorites') }} --}}
                            </li>
                            <li class="{{ Route::currentRouteName() == 'user.order' ? 'active' : '' }}">
                                <a href="{{ route('user.order') }}">المحفظة</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-9">
                  @yield('item')
                </div>
              
            </div>
       
        </div>
    </div>
    </div>
</section>
@endsection