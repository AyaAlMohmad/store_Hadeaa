@extends('layouts.frontend.app')

@section('content')
    <!-- Product Details  Start -->
    <section class="product-details section--padding-md">
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <div class="product-images-slider ">
                        @foreach ($product->images as $img)
                            <div class="item">
                                <img src="{{ asset('images/product/' . $img->image) }}">
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('images/product/' . $product->image_first) }}">
                </div>
                <div class="col-md-7">
                    <div class="product-breadcrumbs breadcrumbs">
                        <a href="{{ route('category.index') }}">{{ $product->sub_category->category->name }}</a>
                        <a href="{{ route('subcategory.show',$product->sub_category->id) }}">{{ $product->sub_category->name }}</a>
                    </div>
                    <h2 class="product-title">
                        {{ $product->name }}
                    </h2>
                    <div class="product-feedbacks">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-price"> {{ $product->price }} ل.س</div>
                    <p class="product-desc">
                        {{ $product->description }}
                    </p>
                    <div class="product-choices">
                        <div class="choices-item-wrapper">
                            <h4 class="title">اللون :</h4>
                            <div class="colors colors-md">
                                @foreach ($product->colors as $color)
                                    <input id="color_{{ $color->id }}" type="radio" name="color"
                                        value="{{ $color->color_code }}">
                                    <label for="color_{{ $color->id }}" class="color"
                                        data-color="{{ $color->color_code }}"
                                        style="background-color:{{ $color->color_code }} ;"></label>
                                @endforeach

                            </div>
                        </div>
             

                    </div>
                    <div class="product-btns">
                        <form action="{{ route('favorite.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn"><i class="fa fa-heart-o"></i> إضافة إلى المفضلة</button>
                        </form>
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button id="showInputs-{{ $product->id }}" data-hint="إضافة إلى المحفظة" class="btn"><i
                                class="fa fa-shopping-cart"></i> ضافة إلى السلة </button>
                        
                            <div id="inputFields-{{ $product->id }}" style="display: none;">
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
                      <!-- عرض التعليقات -->
                           
                     
                        <h2 class="product-title">
                       التعليقات
                        </h2>
                        @foreach ($comments as $comment)
                            <div class="comment">
                                <h3>من: {{ $comment->user->name }}</h3>
                                <p>{{ $comment->comment }}</p>
                                
                            </div>
                        @endforeach
            
                   
            
                   <div class="comment-create">
                        <h2 >إضافة تعليق</h2>
                        <form class="comment_store" action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <textarea name="comment" placeholder="اكتب تعليقك هنا..." required></textarea>
                            <div class="header-dropdown-bottom">
                            <button class="btn-more" type="submit">إضافة تعليق</button>
                            </div>
                        </form>
                   
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
