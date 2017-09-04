<?php

use App\User;
use App\Modules\Event\Event;
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
            'name'      => 'NicoAudy',
            'email'     => 'nico@tranvas.com',
            'password'  => bcrypt('secret'),
            'is_active' => 1
        ]);

        factory(Event::class, 20)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
