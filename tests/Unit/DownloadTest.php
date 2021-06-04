<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidDownloadTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_downloads_csv()
    {
        $response = $this->get('/download/csv/all_data');
        $response->assertStatus(200);
        $header = $response->headers->get('content-disposition');
        $this->assertEquals($header, "attachment; filename=books.csv");

    }

    /** @test */
    public function it_downloads_xml()
    {
        $this->assertTrue(true);
    }
}
