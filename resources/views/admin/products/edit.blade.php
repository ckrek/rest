@extends('layouts.admin')

@section('content')
<h1>Редактировать продукт</h1>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="name" placeholder="Название" value="{{ old('name', $product->name) }}" required>
    <input type="text" name="description" placeholder="Описание" value="{{ old('description', $product->description) }}" required>
    <input type="number" name="price" placeholder="Цена" value="{{ old('price', $product->price) }}" required>
    <input type="text" name="category" placeholder="Категория" value="{{ old('category', $product->category) }}">
    <input type="file" name="image">
    @if($product->image)
        <p>Текущее изображение:</p>
        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="150">
    @endif

    <button type="submit">Сохранить</button>
</form>

@if($errors->any())
    <div class="error">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@endsection