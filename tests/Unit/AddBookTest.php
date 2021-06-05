<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;
use App\Author;

class AddBookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_adds_book_to_db()
    {
        factory(Author::class)->create(['id' => 1]);
        $response = $this->call('POST', 'books/create', array(
            '_token' => csrf_token(),
            'title' => 'the wind in the willows',
            'author' => 1
        ));
        $this->assertDatabaseHas('books', [
            'title' => 'the wind in the willows',
            'author_id' => 1
        ]);
    }

    /** @test */
    public function it_returns_redirect()
    {
        $response = $this->call('POST', 'books/create', array(
            '_token' => csrf_token(),
        ));
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('/');
    }
}
