<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Biraj Shrestha',
                'email' => 'birajshrestha51@gmail.com',
                'password' => Hash::make('biraj123'),
                'age' => '25',
                'bio' => 'Its me Biraj Shrestha.',
            ],
            [
                'name' => 'Biraj Shrestha',
                'email' => 'birajshrestha51@gmail.com',
                'password' => Hash::make('biraj123'),
                'age' => '25',
                'bio' => 'Its me Biraj Shrestha.',
            ],
        );
    }
}
