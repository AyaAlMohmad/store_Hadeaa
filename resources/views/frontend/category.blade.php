@extends('layouts.frontend.app')

@section('content')
    <!-- Category Products Start -->
    <section class="section--padding-md">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="products-filter">
                        @foreach ($Category as $item)
                            <div class="col-group">
                                <h4 class="col-group-title">{{ $item->name }}</h4>
                                <div class="col-group-items">
                                    <ul class="list-unstyled">
                                        @foreach ($item->sub_categories as $sub)
                                            <li class="col-group-item">
                                                <a href="{{ route('subcategory.show', $sub->id) }}">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach


                                    </ul>
                                </div>
                            </div>
                        @endforeach


                        {{-- <div class="filter-colors colors">
                            <span data-color="#ddd" style="background-color: #ddd;"></span>
                            <span data-color="#f00" style="background-color: #f00;"></span>
                            <span data-color="#535" style="background-color: #535;"></span>
                            <span data-color="#000" style="background-color: #000;"></span>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row">
                 
                   
@yield('item')


                    </div>
                    <div class="pagination">
                        {{-- <a href="#" class="prev">السابق</a>
                        <a href="#" class="active">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#" class="next">التالي</a> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Offer Section Start-->
    {{-- <section class="offer-section ">
    <a href="#">
        <img src="assets/images/offer.png">
    </a>
</section> --}}

    <!-- Sellest Section Start-->

    @include('frontend.component.sellest')
@endsection
