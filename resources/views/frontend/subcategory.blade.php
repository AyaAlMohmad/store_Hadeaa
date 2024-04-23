@extends('frontend.category')

@section('item')

@foreach ($SubCategory->products as $product)
<div class="col-md-3">
    <div class="product-item">
        <div class="product-item-images">
            <div class="product-item-actions">
                <form action="{{ route('favorite.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button data-hint="إضافة إلى المفضلة"><i class="fa fa-heart-o"></i></button>
                </form>
                {{-- <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button id="showInputs-{{ $product->id }}" data-hint="إضافة إلى المحفظة"><i class="fa fa-shopping-cart"></i> </button>
                    <div id="inputFields-{{ $product->id }}" style="display: none;">
                        <input type="number" name="amount" placeholder="الكمية" required>
                        <input type="text" name="comment" placeholder="التعليق" required>

                    </div>
                </form> --}}
               
            </div>
            <div class="product-item-colors">
                @foreach ($product->colors as $color)
                    <span data-color="{{ $color->color_code }}"
                        style="background-color: {{ $color->color_code }};"></span>
                @endforeach


            </div>
            <a href="{{ route('product.show',$product->id) }}">
                @foreach ($product->colors as $color)
                    <img data-color="{{ $color->color_code }}" 
                        src="{{ asset('images/product/' . $product->image_first) }}">
                        <img data-color="{{ $color->color_code }}" src="{{ asset('images/product/'.$product->images()->first()->image) }}">
                @endforeach


            </a>
        </div>
        <div class="product-item-text">
            <div class="product-breadcrumb">
                <a href="{{ route('category.index') }}">{{ $product->sub_category->category->name }}</a><a
                    href="{{ route('subcategory.show',$product->sub_category->id) }}">{{ $product->sub_category->name }}</a>
            </div>
            <h5 class="product-item-title"><a href="{{ route('product.show',$product->id) }}">{{ $product->name }}</a></h5>
            <div class="product-item-bottom">
             
                <span class="product-item-price">{{ $product->price }} ل.س. </span>
            </div>
        </div>
    </div>
</div>
@endforeach
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
@endsection