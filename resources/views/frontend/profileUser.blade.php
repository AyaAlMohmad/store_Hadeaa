@extends('frontend.profile')

@section('item')

{{-- <a style="color:green" href="{{ route('user.edit', $user->id) }}">
    تعديل
</a> --}}
    <h2 class="username">
        الأسم: {{ $user->name }}
    </h2>

    <h3>الأميل: {{ $user->email }}</h3>
    <h3>الجنس: {{ $user->gender }}</h3>
    <h3>الهاتف: {{ $user->phone }}</h3>
    <div class="header-dropdown-bottom">

        <a href="{{  route('user.edit', $user->id) }}" class="btn-more">تعديل البيانات </a>
    </div>
@endsection