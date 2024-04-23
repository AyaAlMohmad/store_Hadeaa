@extends('layouts.frontend.app')

@section('content')
    <!-- Home Slider Start -->
    <section class="home-slider-section">
        <div class="home-slider-items owl-carousel owl-theme">


            @foreach ($menu as $item)
                <div class="home-slider-item">
                    <div class="container content">
                        <div class="text">
                            <h4 class="title">{{ $item->title }}</h4>
                            <p>{{ $item->short_description }}</p>
                        </div>
                        <img  src="{{ asset('images/Menu/' . $item->image) }}">
                    </div>

                </div>
            @endforeach



        </div>

    </section>
    <!-- Latest Section Start-->
    <section class="latest-section section section--padding-lg">
        <header class="section-header">
            <h2 class="title mark--top">المنتجات الأحدث</h2>
        </header>
        @include('frontend.component.newProducts')
    </section>
    <!-- Offer Section Start-->
    {{-- <section class="offer-section ">
        <a href="#">
            <img src="assets/images/offer.png">
        </a>
    </section> --}}
    <!-- Categories Section Start-->
    @include('frontend.component.category')
    <!-- Sellest Section Start-->
    @include('frontend.component.sellest')
    <!-- Products In Categories Section Start-->
    @include('frontend.component.categoryProducts')
    <!-- Offer Section Start-->
    {{-- <section class="offer-section ">
        <a href="#">
            <img src="assets/images/offer_2.jpg">
        </a>
    </section> --}}
    <!-- Services Section Start-->
    @include('frontend.component.serviceItem')
@endsection
