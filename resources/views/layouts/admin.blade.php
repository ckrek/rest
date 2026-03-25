<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header>
        <h1>Админ-панель</h1>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Главная</a>
            <a href="{{ route('admin.products.index') }}">Продукты</a>
            <form method="POST" action="{{ route('logout') }}" style="display:inline">
                @csrf
                <button type="submit">Выход</button>
            </form>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>