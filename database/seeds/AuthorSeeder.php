<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use App\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $author_list = [
            'Seneca',
            'Marcus Aurelius',
            'Aristotle',
            'Cicero',
            'Epictetus',
            'Schopenhauer'
        ];

        for ($i = 0; $i < count($author_list); $i++) {
            $author = new Author();
            $author->full_name = $author_list[$i];
            $author->date_of_birth = $faker->date;
            $author->save();
        }
    }
}

