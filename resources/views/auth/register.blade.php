@include('components.header')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

<div class="container">

<div class="card">

<h2>Регистрация</h2>

<form method="POST" action="{{ route('register') }}">
@csrf

<input type="text" name="name" placeholder="Имя">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Пароль">

<button type="submit">Зарегистрироваться</button>

</form>

<a href="{{ route('login') }}">Уже есть аккаунт?</a>

</div>

</div>