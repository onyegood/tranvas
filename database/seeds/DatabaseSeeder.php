<?php

use App\Models\Event\Event;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Onyeka',
           'email' => 'onyegood@yahoo.com',
           'password' => bcrypt('password'),
           'is_active' => 1,
        ]);

        factory(Event::class, 20);
        // $this->call(UsersTableSeeder::class);
    }
}