  <section class="services-section section section--padding-lg">
      <h2 >
           التعليقات
      </h2>
      <div class="container">
          <div class="services-items">
              @foreach ($comments as $comment)
                  <div class="service-item">
                      <a href="{{ route('product.show', $comment->product_id) }}">
                          <div class="overlay"></div>
                          <div class="service-item-content">
                              <img src="{{ asset('images/product/' . $comment->product->image_first) }}">
                              <h3 class="title">{{ $comment->comment }} </h3>
                          </div>
                      </a>
                  </div>
              @endforeach



          </div>
      </div>
  </section>
