<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'email' => 'jared@vynyl.com',
            'name' => 'Jared',
            'api_token' => '268a3ef2-6c97-11e6-a18e-08002746f3a1',
        ]);

        // ids: 2, 3, 4, ...
        factory(App\Models\User::class, 5)->create();
    }
}
