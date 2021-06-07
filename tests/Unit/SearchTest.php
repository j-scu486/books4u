<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;
use App\Author;


class SearchTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_result_by_title()
    {
        factory(Book::class, 50)->create();
        factory(Book::class)->create([
            'title' => 'the wind in the willows'
        ]);
        $response = $this->get('/search?search=the+wind+in+the+willows&search_type=title');
        $response->assertSee('<td class="table__item">the wind in the willows</td>');
    }
    /** @test */
    public function it_returns_result_by_author()
    {
        factory(Author::class)->create([
            'full_name' => 'Alex Trender',
            'id' => 1,
        ]);
        factory(Book::class, 50)->create();
        factory(Book::class)->create(['author_id' => 1]);

        $response = $this->get('/search?search=Alex+Trender&search_type=author');
        $response->assertSee('<td class="table__item">Alex Trender</td>');
    }
}
