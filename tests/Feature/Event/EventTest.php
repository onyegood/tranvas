<?php

namespace Tests\Feature\Event;

use App\Models\Event\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{

   use DatabaseMigrations;

   public function test_a_user_can_see_list_of_events()
   {
       $eventList = factory(Event::class)->create();

       $this->get(route('events'))
           ->assertStatus(200)
           ->assertSeeText($eventList->title)
           ->assertSeeText($eventList->description);

   }
}
