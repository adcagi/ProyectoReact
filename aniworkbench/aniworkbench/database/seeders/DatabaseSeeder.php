<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $data = [
            [
                'name' => 'Shonen',
                'products' => [
                    [
                        'name'        => 'One Piece Vol. 1 - Romance Dawn',
                        'description' => 'El inicio de la aventura de Monkey D. Luffy, un joven que sueña con convertirse en el Rey de los Piratas.',
                        'price'       => 7.99,
                        'stock'       => 80,
                        'image'       => 'https://www.ulduar.es//wp-content/uploads/2023/09/9788411406710.jpg',
                    ],
                    [
                        'name'        => 'Naruto Vol. 1 - Uzumaki Naruto',
                        'description' => 'Naruto Uzumaki, un ninja que lleva sellado en su interior al zorro de nueve colas, lucha por ser reconocido.',
                        'price'       => 7.99,
                        'stock'       => 75,
                        'image'       => 'https://m.media-amazon.com/images/I/71oinfFgliL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Dragon Ball Vol. 1',
                        'description' => 'Goku, un niño con una extraña cola de mono, comienza su búsqueda de las Dragon Balls junto a Bulma.',
                        'price'       => 7.99,
                        'stock'       => 90,
                        'image'       => 'https://m.media-amazon.com/images/I/61eRgJqb-YL._SY342_.jpg',
                    ],
                    [
                        'name'        => 'My Hero Academia Vol. 1',
                        'description' => 'En un mundo de superhéroes, Izuku Midoriya nace sin poderes pero sueña con convertirse en el héroe número uno.',
                        'price'       => 8.99,
                        'stock'       => 60,
                        'image'       => 'https://m.media-amazon.com/images/I/81AjnD8nvHL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Demon Slayer Vol. 1 - Tanjiro Kamado',
                        'description' => 'Tanjiro emprende un viaje para vengar a su familia y curar a su hermana convertida en demonio.',
                        'price'       => 8.99,
                        'stock'       => 70,
                        'image'       => 'https://m.media-amazon.com/images/I/81nKmDIKzZL._AC_UL320_.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Seinen',
                'products' => [
                    [
                        'name'        => 'Berserk Vol. 1',
                        'description' => 'Guts, un mercenario solitario con una enorme espada, lucha en un mundo oscuro y violento lleno de demonios.',
                        'price'       => 10.99,
                        'stock'       => 40,
                        'image'       => 'https://m.media-amazon.com/images/I/817k+9AMvSL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Vagabond Vol. 1',
                        'description' => 'La vida del legendario espadachín Miyamoto Musashi, adaptada del clásico literario Musashi de Eiji Yoshikawa.',
                        'price'       => 10.99,
                        'stock'       => 35,
                        'image'       => 'https://m.media-amazon.com/images/I/81jPkEYif0L._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Monster Vol. 1',
                        'description' => 'El Dr. Tenma salva la vida de un niño misterioso que resulta ser un asesino en serie sin escrúpulos.',
                        'price'       => 9.99,
                        'stock'       => 30,
                        'image'       => 'https://m.media-amazon.com/images/I/716iyH5MaGL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Vinland Saga Vol. 1',
                        'description' => 'Thorfinn, hijo de un legendario guerrero vikingo, busca venganza contra el hombre que mató a su padre.',
                        'price'       => 10.99,
                        'stock'       => 45,
                        'image'       => 'https://m.media-amazon.com/images/I/71pI5sI9NjL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Oyasumi Punpun Vol. 1',
                        'description' => 'Una historia de crecimiento perturbadora y honesta sobre Punpun, un niño representado como un garabato simple.',
                        'price'       => 9.99,
                        'stock'       => 25,
                        'image'       => 'https://m.media-amazon.com/images/I/917IJDfk36L._AC_UL320_.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Shojo',
                'products' => [
                    [
                        'name'        => 'Sailor Moon Vol. 1',
                        'description' => 'Usagi Tsukino descubre que es Sailor Moon, una guerrera mágica destinada a proteger la Tierra.',
                        'price'       => 8.99,
                        'stock'       => 55,
                        'image'       => 'https://m.media-amazon.com/images/I/61hPmMUetWL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Fruits Basket Vol. 1',
                        'description' => 'Tohru Honda descubre que los miembros del clan Sohma se transforman en animales del zodiaco chino.',
                        'price'       => 8.99,
                        'stock'       => 40,
                        'image'       => 'https://m.media-amazon.com/images/I/71cH0Uw08oL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Nana Vol. 1',
                        'description' => 'Dos chicas llamadas Nana se conocen en un tren a Tokio y sus vidas quedan entrelazadas para siempre.',
                        'price'       => 8.99,
                        'stock'       => 35,
                        'image'       => 'https://m.media-amazon.com/images/I/91SzVsLIF4L._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Cardcaptor Sakura Vol. 1',
                        'description' => 'Sakura Kinomoto libera accidentalmente unas cartas mágicas y debe recuperarlas antes de que causen el caos.',
                        'price'       => 7.99,
                        'stock'       => 50,
                        'image'       => 'https://m.media-amazon.com/images/I/71doVnnEUiL._AC_UL320_.jpg',
                    ],
                ],
            ],
            [
                'name' => 'Josei',
                'products' => [
                    [
                        'name'        => "Natsume's Book of Friends Vol. 1",
                        'description' => 'Takashi Natsume hereda un libro que contiene los nombres de espíritus atrapados por su abuela.',
                        'price'       => 9.99,
                        'stock'       => 30,
                        'image'       => 'https://m.media-amazon.com/images/I/91hNaNXZ9yL._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Chihayafuru Vol. 1',
                        'description' => 'Chihaya Ayase persigue su sueño de convertirse en la mejor jugadora de karuta del mundo.',
                        'price'       => 9.99,
                        'stock'       => 25,
                        'image'       => 'https://m.media-amazon.com/images/I/51v22Yani2L._AC_UL320_.jpg',
                    ],
                    [
                        'name'        => 'Honey and Clover Vol. 1',
                        'description' => 'Un grupo de estudiantes de arte en Tokio navega el amor, la amistad y los sueños no correspondidos.',
                        'price'       => 9.99,
                        'stock'       => 20,
                        'image'       => 'https://m.media-amazon.com/images/I/81qVKKFQa+L._AC_UL320_.jpg',
                    ],
                ],
            ],
        ];

        foreach ($data as $categoryData) {
            $category = Category::create(['name' => $categoryData['name']]);

            foreach ($categoryData['products'] as $productData) {
                Product::create([
                    ...$productData,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
