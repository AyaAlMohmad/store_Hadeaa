<section class="sellest-section section ">
    <div class="container">
        <header class="section-header">
            <h2 class="title mark--top">الأكثر مبيعا</h2>
        </header>
        <div class="sellest-slider owl-carousel owl-theme">

        @foreach ($products as $item)
        <div class="sellest-item product-item">
            <a href="{{ route('product.show',$item->id) }}">
                <img src="{{ asset('images/product/'.$item->image_first) }}">
                <img src="{{ asset('images/product/'.$item->images()->first()->image) }}">
        
            </a>
        </div>
        @endforeach
            
 
        </div>
    </div>
</section>