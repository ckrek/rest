@include('components.header')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container">

<h2>Продукты</h2>

<a class="btn" href="{{ route('products.create') }}">Добавить</a>

<table>

<tr>
<th>Название</th>
<th>Цена</th>
<th>Действия</th>
</tr>

@foreach($products as $product)

<tr>

<td>{{ $product->name }}</td>
<td>{{ $product->price }}</td>

<td>

<a href="{{ route('products.edit',$product->id) }}">Редактировать</a>

<form method="POST" action="{{ route('products.destroy',$product->id) }}">
@csrf
@method('DELETE')

<button>Удалить</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>