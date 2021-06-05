<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;
use App\Author;


class DeleteBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_deletes_book_from_db()
    {
        $book = factory(Book::class)->create(['id' => 1]);
        $this->assertDatabaseHas('books', [
            'id' => 1
        ]);    
        $response = $this->call('DELETE', 'books/delete/1', array(
            '_token' => csrf_token(),
        ));
        $this->assertDeleted($book);

    }

    /** @test */
    public function it_returns_redirect()
    {
        factory(Book::class)->create(['id' => 1]);
        $response = $this->call('DELETE', 'books/delete/1', array(
            '_token' => csrf_token(),
        ));
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/');
    }
}
