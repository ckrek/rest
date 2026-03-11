@extends('layouts.app')

@section('content')
<div class="container" style="padding:50px 0;">
    <div class="product-detail">
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width:400px; border-radius:12px;">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p><strong>Цена:</strong> {{ $product->price }} ₽</p>
        <a href="{{ route('menu') }}" class="btn">Назад к меню</a>
    </div>
</div>
@endsection