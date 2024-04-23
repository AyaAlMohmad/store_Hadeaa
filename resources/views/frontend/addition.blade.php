@extends('layouts.frontend.app')

@section('content')

@foreach ($items as $item)
<div class="category-item mark--top">
    <a href="{{ route('addition.show',$item->id) }}">
        <img src="{{ asset('images/Addition/'.$item->image) }}">
        <h3 class="title">{{ $item->title }}</h3>
    </a>
</div>
@endforeach
@endsection