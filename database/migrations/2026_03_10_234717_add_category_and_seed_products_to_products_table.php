<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('category')->after('price')->default('');
            $table->string('image')->nullable()->after('category');
        });

        $now = Carbon::now();

        DB::table('products')->insert([
            
            // салаты
            ['name' => 'Зеленый салат', 'description' => 'Свежие листовые овощи с огурцом, помидорами и зеленью, заправленные оливковым маслом', 'price' => 990, 'category' => 'Салаты', 'image'=>'/img/food4.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Салат с лососем', 'description' => 'Филе свежего лосося, микс салатных листьев, огурцы, помидоры и лимонная заправка', 'price' => 520, 'category' => 'Салаты', 'image'=>'/img/food5.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Овощной салат', 'description' => 'Ассорти из сезонных овощей: болгарский перец, морковь, редис, зелень и легкая заправка', 'price' => 730, 'category' => 'Салаты', 'image'=>'/img/food6.webp', 'created_at' => $now, 'updated_at' => $now],

            // супы
            ['name' => 'Суп томатный', 'description' => 'Ароматный суп из свежих томатов с базиликом и оливковым маслом, подается с гренками', 'price' => 820, 'category' => 'Супы', 'image'=>'/img/food7.webp', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Куриный суп', 'description' => 'Домашний бульон с курицей, морковью, луком и зеленью, легкий и питательный', 'price' => 750, 'category' => 'Супы', 'image'=>'/img/food8.jpg', 'created_at' => $now, 'updated_at' => $now],

            // закуски
            ['name' => 'Моцарелла', 'description' => 'Сыр моцарелла с помидорами, базиликом и ароматной бальзамической заправкой', 'price' => 1290, 'category' => 'Закуски', 'image'=>'/img/food9.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Буррата', 'description' => 'Нежная сырная буррата с оливковым маслом, томатами и свежей зеленью', 'price' => 1080, 'category' => 'Закуски', 'image'=>'/img/food10.webp', 'created_at' => $now, 'updated_at' => $now],

            // горячее
            ['name' => 'Стейк из говядины', 'description' => 'Сочный стейк из отборной говядины, обжаренный до золотистой корочки, подается с овощами гриль', 'price' => 2500, 'category' => 'Горячее', 'image'=>'/img/food11.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Курица в соусе терияки', 'description' => 'Нежная куриная грудка в сладковато-соленом соусе терияки с овощами', 'price' => 1200, 'category' => 'Горячее', 'image'=>'/img/food12.webp', 'created_at' => $now, 'updated_at' => $now],

            // гриль
            ['name' => 'Стейк на гриле', 'description' => 'Говядина на углях с ароматной корочкой, подается с соусом по выбору', 'price' => 1200, 'category' => 'Гриль', 'image'=>'/img/food13.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Курица на гриле', 'description' => 'Куриные грудки, приготовленные на гриле с ароматными специями, подаются с овощами', 'price' => 950, 'category' => 'Гриль', 'image'=>'/img/food14.jpg', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Шашлык из свинины', 'description' => 'Маринованные кусочки свинины, приготовленные на открытом огне до золотистой корочки', 'price' => 1500, 'category' => 'Гриль', 'image'=>'/img/food15.webp', 'created_at' => $now, 'updated_at' => $now],

        ]);
    }

    public function down(): void
    {
        // удаляем поле категории и картинки
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['category', 'image']);
        });

        // удаляем тестовые продукты
        DB::table('products')->whereIn('name', [
            'Зеленый салат','Салат с лососем','Овощной салат',
            'Суп томатный','Куриный суп',
            'Моцарелла','Буррата',
            'Стейк из говядины','Курица в соусе терияки',
            'Стейк на гриле','Курица на гриле','Шашлык из свинины'
        ])->delete();
    }
};