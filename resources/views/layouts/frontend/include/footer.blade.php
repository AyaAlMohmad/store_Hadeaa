<?php
use Illuminate\Support\Str; ?>
<footer class="page-footer section--padding-lg">
    <div class="top section--padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img class="footer-logo" src="{{ asset('dashboard/assets/images/22.jpg') }}">
                </div>
               



                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="mb--md">يساهم موقع "هديتي" في مساعدة الأفراد على تصفح واختيار الهدايا المناسبة 
                                حسب الميزانية المخصصة لهم. 
                                يعزز تجربة التسوق من خلال تصنيف وعرض خيارات الهدايا الفريدة،
                                 بالإضافة إلى اختيار التنسيقات المناسبة لضمان أسرع وأفضل طريقة للحصول على الهدية</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="footer-col-title mark--title"> القائمة الرئيسية</h5>
                            <ul class="footer-col-list">
                                @foreach ($menu as $item)
                                    <li class="mark--title"><a
                                            href="{{ route($item->name . '.index') }}">{{ $item->title }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="social-list list-unstyled">
                                @foreach ($sociales as $social)
                                    <li class="social-item" data-hint="{{ $social->title }}">
                                        <a
                                            href="{{ Str::startsWith($social->link, 'https://') ? $social->link : Str::of($social->link)->prepend('https://') }}"><i
                                                class="fa fa-{{ $social->type }}"></i></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom section--padding-sm">
        Developed By Aya Almohamad
    </div>
</footer>
