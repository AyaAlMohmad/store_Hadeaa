@extends('layouts.frontend.app')

@section('content')
    <!-- Product Details  Start -->
    <section class="product-details section--padding-md">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <div class="product-images-slider ">
                        @foreach ($item->images as $img)
                            <div class="item">
                                <img src="{{ asset('images/Addition/' . $img->image) }}">
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/Addition/' . $item->image) }}">
                </div>
                <div class="col-md-7">
                    <div class="product-breadcrumbs breadcrumbs">
                        {{-- <a href="{{ route('category.index') }}">{{ $product->sub_category->category->name }}</a>
                        <a href="{{ route('subcategory.show',$product->sub_category->id) }}">{{ $product->sub_category->name }}</a> --}}
                    </div>
                    <h2 class="product-title">
                        {{ $item->title }}
                    </h2>
                    <div class="product-feedbacks">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-price"> {{ $item->price }} ل.س</div>
                    <p class="product-desc">
                        {{ $item->description }}
                    </p>
                    <div class="product-choices">
                        <div class="choices-item-wrapper">
                            <h4 class="title">اللون :</h4>
                            <div class="colors colors-md">
                                @foreach ($item->colors as $color)
                                    <input id="color_{{ $color->id }}" type="radio" name="color"
                                        value="{{ $color->color_code }}">
                                    <label for="color_{{ $color->id }}" class="color"
                                        data-color="{{ $color->color_code }}"
                                        style="background-color:{{ $color->color_code }} ;"></label>
                                @endforeach

                            </div>
                        </div>
                        <div class="choices-item-wrapper">
                            {{-- <h4 class="title">الحجم :</h4>
                            <div class="sizes">
                                <input id="size_1" type="radio" name="size" value="xs">
                                <label for="size_1" class="size">xs</label>
                                <input id="size_2" type="radio" name="size" value="sm">
                                <label for="size_2" class="size">sm</label>
                                <input id="size_3" type="radio" name="size" value="l">
                                <label for="size_3" class="size">l</label>
                                <input id="size_4" type="radio" name="size" value="xl">
                                <label for="size_4" class="size">xl</label>
                                <input id="size_5" type="radio" name="size" value="xxl">
                                <label for="size_5" class="size">xxl</label>
                                <input id="size_6" type="radio" name="size" value="xxxl">
                                <label for="size_6" class="size">xxxl</label>
                            </div> --}}
                        </div>

                    </div>
                    <div class="product-btns">
                     
                        <form action="{{ route('order.storeAddition') }}" method="post">
                            @csrf
                            <input type="hidden" name="addition_id" value="{{ $item->id }}">
                            <button id="showInputs-{{ $item->id }}" data-hint="إضافة إلى المحفظة" class="btn"><i
                                class="fa fa-shopping-cart"></i> ضافة إلى السلة </button>
                        
                            <div id="inputFields-{{ $item->id }}" style="display: none;">
                                <input type="number" name="amount" placeholder="الكمية" required>
                                <input type="text" name="comment" placeholder="التعليق" required>

                            </div>
                        </form>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                        $(document).ready(function(){
                            $('[id^="showInputs-"]').click(function(){
                                var productId = $(this).attr('id').split('-')[1];
                                $("#inputFields-" + productId).show();
                            });
                        
                            $('[id^="submitBtn-"]').prop('disabled', true);
                        
                            $('input[name="amount"], input[name="comment"]').on('input', function() {
                                var productId = $(this).closest('form').find('button[id^="submitBtn-"]').attr('id').split('-')[1];
                                var isValid = true;
                                $('input[name="amount"], input[name="comment"]').each(function() {
                                    if (!$(this).val().trim()) {
                                        isValid = false;
                                    }
                                });
                                $('#submitBtn-' + productId).prop('disabled', !isValid);
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Latest Section Start-->

    <section class="latest-section section section--padding-lg">
        @include('frontend.component.newProducts')
    </section>
@endsection
