@extends('layouts.admin')

@section('content')
<h1>Создать новый продукт</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Название" required>
    <input type="text" name="description" placeholder="Описание" required>
    <input type="number" name="price" placeholder="Цена" required>
    <input type="text" name="category" placeholder="Категория" required>
    <input type="file" name="image">
    <button type="submit">Создать</button>
</form>
@endsection