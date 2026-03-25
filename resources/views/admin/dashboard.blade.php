@include('components.header')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container">
    <h1>Админ панель</h1>

    <div class="admin-menu">
    <a href="{{ route('admin.products.index') }}">Продукты</a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        
        <button>Выйти</button>
    </form>
</div>