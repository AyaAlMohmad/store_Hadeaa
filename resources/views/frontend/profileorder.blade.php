@extends('frontend.profile')

@section('item')
<div class="col-md-10">
    <div class="row">
    @foreach ($orders as $product)
        <div class="col-md-3">
            <div class="product-item ">
                <div class="actions ">
                    <form method="POST" action="{{ route('order.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                    <button class="action-btn btn" data-type="remove"><i
                            class="fa fa-close"></i></button>
                    </form>
                </div>
                <div class="product-item-images">

                    <div class="product-item-colors">
                        @foreach ($product->product->colors as $color)
                            <span data-color="{{ $color->color_code }}"
                                style="background-color: {{ $color->color_code }};"></span>
                        @endforeach


                    </div>
                    <a href="{{ route('product.show', $product->product->id) }}">
                        @foreach ($product->product->colors as $color)
                            <img data-color="{{ $color->color_code }}"
                                src="{{ asset('images/product/' . $product->product->image_first) }}">
                            <img data-color="{{ $color->color_code }}"
                                src="{{ asset('images/product/' . $product->product->images()->first()->image) }}">
                        @endforeach


                    </a>
                </div>
                <div class="product-item-text">
                    <div class="product-breadcrumb">
                        <a href="{{ route('category.index') }}">{{ $product->product->sub_category->category->name }}</a><a
                            href="{{ route('subcategory.show', $product->product->sub_category->id) }}">{{ $product->product->sub_category->name }}</a>
                    </div>
                    <h5 class="product-item-title"><a
                            href="{{ route('product.show', $product->product->id) }}">{{ $product->product->name }}</a></h5>
                    <div class="product-item-bottom">
                        <span class="product-item-status"> 
                            <form action="{{ route('favorite.store') }}" method="post" >
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->product->id }}">
                        <button data-hint="إضافة إلى المفضلة"><i class="fa fa-heart-o"></i> </button>
                        </form></span>
                        <span class="product-item-price">{{ $product->product->price }} ل.س. </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
