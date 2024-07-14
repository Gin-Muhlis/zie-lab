<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Zie Lab',
            'email' => 'zielabadmin77@gmail.com',
            'phone' => '0895616007300',
            'password' => Hash::make('bukanadmin123')
        ]);

        $this->call([
            PermissionsSeeder::class,
            UserSeeder::class,
            FaqSeeder::class,
            ProfileCompanySeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            BenefitSeeder::class,
            SectionSeeder::class,
            LessonSeeder::class,
        ]);
    }
}
