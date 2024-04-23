<section class="categories-section section section--padding-lg">
    <div class="container">
        <div class="categories-slider categories-items owl-carousel owl-theme">
            @foreach ($subCategories as $item)
            <div class="category-item mark--top">
                <a href="{{ route('subcategory.show',$item->id) }}">
                    <img src="{{ asset('images/subcategory/'.$item->image) }}">
                    <h3 class="title">{{ $item->name }}</h3>
                </a>
            </div>
            @endforeach
           
            {{-- <div class="category-item mark--top">
                <a href="#">
                    <img src="assets/images/categories/pngegg(8).png">
                    <h3 class="title">اكسسورات</h3>
                </a>
            </div>
            <div class="category-item mark--top">
                <a href="#">
                    <img src="assets/images/categories/pngegg(11).png">
                    <h3 class="title">الكرتونيات</h3>
                </a>
            </div>
            <div class="category-item mark--top">
                <a href="#">
                    <img src="assets/images/categories/pngegg(9).png">
                    <h3 class="title">أحذية</h3>
                </a>
            </div>
            <div class="category-item mark--top">
                <a href="#">
                    <img src="assets/images/categories/pngegg(9).png">
                    <h3 class="title">ألبسة</h3>
                </a>
            </div>
            <div class="category-item mark--top">
                <a href="#">
                    <img src="assets/images/categories/pngegg(9).png">
                    <h3 class="title">ألبسة</h3>
                </a>
            </div> --}}
        </div>
    </div>
</section>