<?php

namespace Tests\Feature\Event;

use App\Models\Event\Event;
use App\User;
use SebastianBergmann\Comparator\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{

   use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function test_a_guest_sholud_not_see_event_section()
    {
        $this->get(route('events'))
            ->assertRedirect(route('login'));
    }


    public function test_a_user_can_see_list_of_events()
   {
       $eventList = factory(Event::class)->create();

       $this->get(route('events'))
           ->assertStatus(200)
           ->assertSeeText($eventList->title)
           ->assertSeeText($eventList->description);

   }

   public function test_a_user_can_view_event_details()
   {
        $event = factory(Event::class)->create();

        dd($event->creator->name);

        $this->actingAs($this->user)
            ->get(route('event-view', $event->id))
            ->assertSeeText($event->title)
            ->assertSeeText($event->creator->name);
   }

   public function test_a_user_can_create_event_and_view_it()
   {
      $faker = Factory::create();

      $title = $faker->sentence(3);

      $postData = [
        'title' => $title,
        'description' => $faker->paragraph(3),
        'address' => $faker->address,
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
      ];

      $this->actingAs($this->user)
          ->post(route('save-event'), $postData)
          ->assertRedirect(route('events'));

      $this->get(route('events'))
          ->assertSee($title);
   }

   public function test_confirm_fields_are_required_to_create_event()
   {
       $this->actingAs($this->user)
           ->post(route('save-event'), [])
           ->asstSessionHasErrors([
              'title','description','address','start_date','end_date','lat','lng'
           ]);
   }

}
