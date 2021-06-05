<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Book;

class ValidDownloadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_downloads_csv()
    {
        factory(Book::class)->create();
        $response = $this->get('/download/csv/all_data');
        $response->assertStatus(200);
        $header = $response->headers->get('content-disposition');
        $this->assertEquals($header, "attachment; filename=books.csv");

    }

    /** @test */
    public function it_downloads_csv_title_only()
    {
        factory(Book::class)->create();
        $response = $this->get('/download/csv/title_only');
        $response->assertStatus(200);
        $header = $response->headers->get('content-disposition');
        $this->assertEquals($header, "attachment; filename=books.csv");

    }
    /** @test */
    public function it_downloads_csv_author_only()
    {
        factory(Book::class)->create();
        $response = $this->get('/download/csv/author_only');
        $response->assertStatus(200);
        $header = $response->headers->get('content-disposition');
        $this->assertEquals($header, "attachment; filename=books.csv");

    }

    /** @test */
    public function it_downloads_xml()
    {
        factory(Book::class)->create();
        $response = $this->get('/download/xml/all_data');
        $response->assertStatus(200);
        $header = $response->headers->get('content-disposition');
        $this->assertEquals($header, "attachment; filename=books.xml");
    }
}
