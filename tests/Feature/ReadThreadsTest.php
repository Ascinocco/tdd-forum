<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $thread = factory('App\Thread')->create();
    }

    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads');
        $response->assertSee($this->thread->title);
        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_browse_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->thread->title);
        $response->assertStatus(200);
    }
        
    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/' . $this->thread->id);
        $response->assertSee($thread->thread->title);
        $response->assertStatus(200);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {

    }
}
