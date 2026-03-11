@extends('layouts.app')
@section('content')

<section class="hero">
    <div class="container hero-grid">
        <div class="hero-left">
            <h1 id="home">
                DAY <br>
                <span>& NIGHT</span>
            </h1>
            <p>
                Проведите время вместе с изысканной кухней и уникальным интерьером
            </p>
            <a href='#req' class="btn">
                Забронировать стол
            </a>
        </div>
        <div class="hero-right">
            <img src="/img/food3.jpg.png">
        </div>
    </div>
</section>

<section class="menu">
    <div class="container">
        <h2 id="menu">Меню</h2>

        <div class="menu-tabs">
            <a href="{{ route('menu') }}" class="{{ !($category ?? false) ? 'active' : '' }}">Все</a>
            @foreach($categories as $cat)
                <a href="{{ route('menu', $cat) }}" class="{{ ($category ?? '') == $cat ? 'active' : '' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <div class="menu-grid">
            @forelse($products as $product)
                <div class="dish">
                    <a href="{{ route('product.show', $product->id) }}">
                        <img src="{{ asset($product->image ?? 'img/food_placeholder.jpg') }}" alt="{{ $product->name }}" style="height: 233px; width: 350px;">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->price }} ₽</p>
                    </a>
                </div>
            @empty
                <p>Продукты не найдены.</p>
            @endforelse
        </div>
    </div>
</section>

<section id="about" class="about" style="padding:120px 0;  color:white;">
    <div class="container" style="display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center;">
        <div class="about-text" style="font-size:18px; line-height:1.8;">
            <h2 style="font-size:40px; margin-bottom:20px;">О нас</h2>
            <p>
                Ресторан <strong>DAY & NIGHT</strong> — это место, где встречаются изысканная кухня и уникальная атмосфера. 
                Мы создаём уют и комфорт для каждого гостя, заботимся о качестве блюд и сервисе. 
                У нас вы можете насладиться авторскими блюдами, провести романтический ужин или деловую встречу. 
                Каждая деталь интерьера продумана для вашего комфорта, а каждое блюдо готовится с любовью.
            </p>
        </div>
        <div class="about-image">
            <img src="{{ asset('img/shef.jpg') }}" alt="О нас" style="width:100%; border-radius:12px;">
        </div>
    </div>
</section>

<section id="contacts" class="location">
    <div class="container">
        
        <div class="location-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center;">
            <div class="location-text">
                <h2>Где нас найти</h2>
                <p>Мы находимся в центре Ижевска, рядом с метро. Удобная парковка и уютная атмосфера ждут вас!</p>
                <p>Адрес: Ижевск, ул. Ленина, д. 10</p>
                <p>Телефон: +7 (912) 207-1000</p>
            </div>
            <div class="location-map">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aexample&source=constructor" 
                        width="100%" height="400" frameborder="0" style="border:0; border-radius:12px;"></iframe>
            </div>
        </div>
    </div>
</section>

<sectionc class="booking">
    <div class="container booking-flex">
        <div class="booking-form">
            <h2 id='req'>Бронирование</h2>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Имя" required>
                <input type="text" name="phone" placeholder="Телефон" required>
                <label for="date" style="margin-top:10px; display:block; font-size:20px;">Выберите дату</label>
                <input type="date" id="date" name="date" required min="{{ \Carbon\Carbon::today()->format('Y-m-d') }}">
                <label for="time" style="margin-top:10px; display:block; font-size:20px;">Выберите время</label>
                <input type="time" id="time" name="time" required min="12:00" max="20:00" step="3600">
                <button class="btn" type="submit" style="margin-top:20px;">Забронировать</button>
                @if(session('success'))
                    <p style="color:white; margin-top:10px;">{{ session('success') }}</p>
                @endif
            </form>
        </div>
        <div class="booking-image">
            <img src="{{ asset('img/restaurant.jpg') }}" alt="">
        </div>
    </div>
</section>

<section class="contacts">
    <div class="contacts-line"></div>

    <div class="container contacts-flex">
        <div class="contacts-info">
            <h2>Контакты</h2>
            <p>Ижевск</p>
            <p>+7 (912) 207-1000</p>
            <p>info@dayandnight.ru</p>
        </div>
        
    </div>
</section>

@endsection