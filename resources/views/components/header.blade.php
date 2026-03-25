<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<header class="header">
<div class="container nav">
        <div href="#main" class="logo">DN</div>

        <nav>
            <a href="{{ url('/') }}#about">О нас</a>
            <a href="{{ url('/') }}#menu">Меню</a>
            <a href="{{ url('/') }}#">Интерьер</a>
            <a href="{{ url('/') }}#req">Банкет</a>
            <a href="{{ url('/') }}#contacts">Контакты</a>
            @guest
        <a href="{{ route('login') }}">Вход</a>
        <a href="{{ route('register') }}">Регистрация</a>
    @else
        <span>{{ auth()->user()->name }}</span>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}">Админ-панель</a>
        @endif
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Выход</button>
        </form>
    @endguest
        </nav>

        <a class="phone">+7 (912) 207-1000</a>
    </div>
</header>