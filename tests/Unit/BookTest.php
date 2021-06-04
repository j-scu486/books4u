<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Book;
use App\Author;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_books()
    {
        $books = factory(Book::class, 10)->make();
        $this->assertEquals(count($books), 10);
    }

    /** @test */
    public function it_returns_asc_order_query()
    {
        $search_query = ['orderby' => 'title', 'direction' => 'asc'];
        factory(Book::class)->create([
            'title' => 'A day in the life',
        ]);
        factory(Book::class)->create([
            'title' => 'Zebras for life',
        ]);

        $result = Book::orderQuery($search_query)->get();
        $this->assertTrue($result[0]->title == 'A day in the life');
    }

    /** @test */
    public function it_returns_asc_order_query_with_author()
    {
        $search_query = ['orderby' => 'author', 'direction' => 'asc'];
        factory(Author::class)->create([
            'full_name' => "Aaron Marks",
            'id' => 1
        ]);
        factory(Author::class)->create([
            'full_name' => "Xennon Bennon",
            'id' => 2
        ]);
        factory(Book::class)->create([
            'author_id' => 1
        ]);
        factory(Book::class)->create([
            'author_id' => 2
        ]);

        $result = Book::orderQuery($search_query)->get();
        $this->assertTrue($result[0]->full_name == 'Aaron Marks');
    }

    /** @test */
    public function it_returns_desc_order_query()
    {
        $search_query = ['orderby' => 'title', 'direction' => 'desc'];
        factory(Book::class)->create([
            'title' => 'A day in the life',
        ]);
        factory(Book::class)->create([
            'title' => 'Zebras for life',
        ]);

        $result = Book::orderQuery($search_query)->get();
        $this->assertTrue($result[0]->title == 'Zebras for life');
    }

    /** @test */
    public function it_returns_desc_order_query_with_author()
    {
        $search_query = ['orderby' => 'author', 'direction' => 'desc'];
        factory(Author::class)->create([
            'full_name' => "Aaron Marks",
            'id' => 1
        ]);
        factory(Author::class)->create([
            'full_name' => "Xennon Bennon",
            'id' => 2
        ]);
        factory(Book::class)->create([
            'author_id' => 1
        ]);
        factory(Book::class)->create([
            'author_id' => 2
        ]);

        $result = Book::orderQuery($search_query)->get();
        $this->assertTrue($result[0]->full_name == 'Xennon Bennon');
    }

    /** @test */
    public function it_returns_search_query_with_title()
    {
        $search_query = ['search_type' => 'title', 'search' => 'A day in the life'];
        factory(Book::class)->create([
            'title' => 'A day in the life',
        ]);
        factory(Book::class)->create([
            'title' => 'Zebras for life',
        ]);

        $result = Book::searchQuery($search_query)->get();
        $this->assertTrue($result[0]->title == 'A day in the life');
    }

    /** @test */
    public function it_returns_search_query_with_author()
    {
        $search_query = ['search_type' => 'author', 'search' => 'Aaron Marks'];
        factory(Author::class)->create([
            'full_name' => "Aaron Marks",
            'id' => 1
        ]);
        factory(Author::class)->create([
            'full_name' => "Xennon Bennon",
            'id' => 2
        ]);
        factory(Book::class)->create([
            'author_id' => 1
        ]);
        factory(Book::class)->create([
            'author_id' => 2
        ]);

        $result = Book::searchQuery($search_query)->get();
        $this->assertTrue($result[0]->full_name == 'Aaron Marks');
    }
}
