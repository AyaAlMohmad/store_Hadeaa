<section class="products-in-cat-section section section--padding-lg">
    <div class="container">
        <div class="products-in-cat-wrapper">
            @foreach ($Category as $item)
            <section class="cat-section mark--side">
              
                <header class="header">
                    <h4 class="title">{{ $item->name }}</h4>
                </header>
                <div class="cat-section-content">
                    <div class="products-cat-slider owl-carousel owl-theme">
                        @foreach ($item->sub_categories as $sub_category) 
                        @foreach ($sub_category->products as $product)
                            
                       
                         <div class="product-item">
                            <a href="{{ route('product.show',$product->id) }}">
                                <img src="{{ asset('images/product/'.$product->image_first) }}">
                                <img src="{{ asset('images/product/'.$product->images()->first()->image) }}">
                        
                            </a>
                        </div>
                        @endforeach
                        @endforeach
                
                    </div>
                </div>
            
       
            </section>
            @endforeach
        </div>

    </div>
</section>