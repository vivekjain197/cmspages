<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        User::create([
            'fullname' => 'John doe',
            'email' => 'vivekjain197@gmail.com',
            'mobile' => '1234567890',
            'password' => '$2y$10$y0KAtXEdcaBRkl0irAlFQ.zxNALA7jLiEZu8vU5SJLl8hftZQbl4q'
        ]);
    }
}
