<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $book_list = [
            'Letters from a Stoic',
            'Meditations',
            'Nicomachean Ethics',
            'On Old Age',
            'Enchiridion',
            'Essays and Aphorisims'
        ];

        for ($i = 0; $i < count($book_list); $i++) {
            $book = new Book();
            $book->title = $book_list[$i];
            $book->author_id = $i + 1;
            $book->save();
        }
    }
}
