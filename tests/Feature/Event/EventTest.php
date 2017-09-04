<?php

namespace Tests\Feature\Event;

use App\User;
use Tests\TestCase;
use App\Modules\Event\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function a_guest_should_not_see_event_section()
    {
        $this->get(route('events'))->assertRedirect(route('login'));
    }

    /** @test */
    public function a_user_can_see_list_of_events()
    {
        $event = factory(Event::class)->create();

        $this->actingAs($this->user)->get(route('events'))
        ->assertStatus(200)
        ->assertSeeText($event->title)
        ->assertSeeText($event->description);
    }
}