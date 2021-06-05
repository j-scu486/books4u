<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Book;
use App\Author;


class EditAuthorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_edits_name()
    {        
        factory(Author::class)->create(['full_name' => 'azir peanut', 'id' => 1]);
        $response = $this->call('POST', 'author/1', array(
            '_token' => csrf_token(),
            'full_name' => 'brick mugger',
        ));
        $this->assertDatabaseHas('authors', [
            'full_name' => 'brick mugger',
        ]);
        $this->assertTrue(true);
    }
}
