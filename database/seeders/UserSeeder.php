<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Zie Lab',
                'email' => 'zielab@gmail.com',
                'phone' => '0895616007300',
                'password' => Hash::make('bukanadmin123')
            ],
            [
                'name' => 'User1',
                'email' => 'user1@gmail.com',
                'phone' => '089765415421',
                'password' => Hash::make('user1pass')
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'phone' => '089765425422',
                'password' => Hash::make('user2pass')
            ],
            [
                'name' => 'User3',
                'email' => 'user3@gmail.com',
                'phone' => '089765435423',
                'password' => Hash::make('user3pass')
            ],
            [
                'name' => 'User4',
                'email' => 'user4@gmail.com',
                'phone' => '089765445424',
                'password' => Hash::make('user4pass')
            ],
            [
                'name' => 'User5',
                'email' => 'user5@gmail.com',
                'phone' => '089765455425',
                'password' => Hash::make('user5pass')
            ],
        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
