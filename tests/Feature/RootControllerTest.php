<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RootControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get('/')
            ->assertSuccessful()
            ->assertSee('Papa-gram');
    }
}
