<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Книга',
            'content' => 'флырвоаидфлывриафлырвидфлырвоаидфлывриафлырвидфлырвоаидфлывриафлырвидфлырвоаидфлывриафлырвидфлырвоаидфлывриафлырвидфлырвоаидфлывриафлырвид',
            'img' => 'https://img3.labirint.ru/rc/590d01bcd8c7c5c336da43793552e082/363x561q80/books74/732953/cover.jpg?1579076758',
            'author' => User::get()->random()->id
        ];
    }
}
