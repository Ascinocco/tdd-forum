<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $this->post('/thread/1/replies', []);
    }

    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        $user = factory('App\User')->create();
        // set currently logged in user for application
        $this->be($user); // terrible function name lol

        $thread = factory('App\Thread')->create();
        $reply = factory('App\Reply')->make();

        // hit server with submitted reply data
        $this->post($thread->path() .'/replies', $reply->toArray());

        $this->get($thread->path())->assertSee($reply->body);
    }
}
