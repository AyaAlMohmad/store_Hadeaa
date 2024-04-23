@extends('layouts.frontend.app')

@section('content')
    <div class="container_2">
        <div class="contact_1">
            <h2>تواصل معنا</h2>
        </div>
        <div class="contact_1">
            <div class="image">
                <img src="{{ asset('frontend/assets/images/Contact us.png') }}" alt="">
                <p>للمزيد من التفاصيل حول المشروع يرجى التواصل معنا</p>
            </div>



        </div>
        <div class="contact_1-discription">
            <h3>{{ $contact->title }}</h3>
            <div class="email">
                <img src="{{ asset('frontend/assets/images/gmail.png') }}" alt="">
                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </div>
            <div class="phone">
                <img src="{{ asset('frontend/assets/images/phone.png') }}" alt="">
                <a href="tel:{{ $contact->mobile }}" class="number">
                    {{ $contact->mobile }}
                </a>
            </div>
            <div class="website">
                <img src="{{ asset('frontend/assets/images/google.png') }}" alt="">
                <a href="{{ $contact->location }}">{{ $contact->location }}</a>
            </div>
            <div class="map">
                <img src="{{ asset('frontend/assets/images/aaa.PNG') }}" alt="">
                <a href="{{ $contact->map }}">{{ $contact->map }}</a>
            </div>
            <div class="fax">
                <img src="{{ asset('frontend/assets/images/Untitled-4.png') }}" alt="">
                <a href="{{ $contact->fax }}">{{ $contact->fax }}</a>
            </div>
            <div class="address">
                <img src="{{ asset('frontend/assets/images/65432.PNG') }}" alt="">
                <p>{{ $contact->address }}</p>
            </div>
        </div>
    </div>
@endsection
