@include('components.header')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">


<div class="container">

<div class="card">

<h2>Вход</h2>

<form method="POST" action="{{ route('login') }}">
@csrf

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Пароль">

<button type="submit">Войти</button>

</form>

@if(session('error'))
<p class="error">{{ session('error') }}</p>
@endif

</div>

</div>