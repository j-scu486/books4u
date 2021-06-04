<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Author;

class ValidUrlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_shows_downloads_page()
    {
        $response = $this->get('/download');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_shows_author_edit_page()
    {
        factory(Author::class)->create(['id' => 1]);
        $response = $this->get('/author/1');
        $response->assertStatus(200);
    }
}
