<?php

namespace Tests\Feature\Event;

use Tests\TestCase;
use App\Modules\Event\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_see_list_of_events()
    {
        $event = factory(Event::class)->create();

        $this->get(route('events'))->assertStatus(200)
        ->assertSeeText($event->title)
        ->assertSeeText($event->description);
    }
}
