
    <div class="container">
        <div class="latest-slider owl-carousel owl-theme">
            @foreach ($groupedProducts as $item)
           
                <div class="product-item">
                    <div class="product-item-images">
                        <div class="product-item-colors colors">
                          
                                @foreach ($item->colors as $color)
                                    <span data-color="{{ $color->name }}" style="background-color: {{ $color->color_code }};">
                                        {{-- <img src="{{ asset('images/Color/' . $color->image) }}"> --}}
                                    </span>
                                @endforeach
                           
                        </div>
                  
                        <a href="{{ route('product.show',$item->id) }}">
                          
                                @foreach ($item->colors as $color)
                                    <img data-color="{{ $color->name }}" class="active"
                                        src="{{ asset('images/product/' . $item->image_first) }}">
                                @endforeach
                         
                        </a>
                     
                    </div>
                    <div class="product-item-text">
                        <div class="product-breadcrumb">
                            <a href="{{ route('category.index') }}">{{ $item->sub_category->category->name }}</a><a href="{{ route('subcategory.show',$item->sub_category->id) }}">{{ $item->sub_category->name }}</a>
                        </div>
                        <h5 class="product-item-title"><a href="{{ route('product.show',$item->id) }}"> {{ $item->name }}</a></h5>
                        <div class="product-item-bottom">
                            <span class="product-item-status">
                                <form action="{{ route('order.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product->id }}">
                                    <button id="showInputs-{{ $product->product->id }}" data-hint="إضافة إلى المحفظة"><i class="fa fa-shopping-cart"></i> </button>
                                    <div id="inputFields-{{ $product->product->id }}" style="display: none;">
                                        <input type="number" name="amount" placeholder="الكمية" required>
                                        <input type="text" name="comment" placeholder="التعليق" required>
               
                                    </div>
                                </form>
                            </span>
                            <span class="product-item-price">{{ $item->price }} ل.س. </span>
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
        </div>
    </div>

