<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageloadTest extends TestCase
{
    /**
     * Test availability of index.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

//        $this->assertTrue(true);
    }

    /**
     * Test availability of pastevents.
     *
     * @return void
     */
    public function test_pastevents()
    {
        $response = $this->get('/pastevents');
        $response->assertStatus(200);
    }
}
