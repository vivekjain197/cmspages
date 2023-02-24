<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pages;
use Illuminate\Support\Facades\Hash;
class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pages::create(
            [
            'parent_id' => NULL,
            'title' => 'Page 1',
            'slug' => 'page-1',
            'short_description' => 'This is short descrition 1',
            'long_description' => 'This is long descrition 1'
            ],
            [
                'parent_id' => 1,
                'title' => 'Page 2',
                'slug' => 'page-2',
                'short_description' => 'This is short descrition 2',
                'long_description' => 'This is long descrition 2'
            ],
            [
                'parent_id' => 1,
                'title' => 'Page 3',
                'slug' => 'page-3',
                'short_description' => 'This is short descrition 3',
                'long_description' => 'This is long descrition 3'
            ],
            [
                'parent_id' => 3,
                'title' => 'Page 4',
                'slug' => 'page-4',
                'short_description' => 'This is short descrition 4',
                'long_description' => 'This is long descrition 4'
            ],
            [
                'parent_id' => NULL,
                'title' => 'Page 5',
                'slug' => 'page-5',
                'short_description' => 'This is short descrition 5',
                'long_description' => 'This is long descrition 5'
            ],

        );
    }
}
