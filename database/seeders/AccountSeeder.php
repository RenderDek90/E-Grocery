<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'role_id' => '2', //Admin
                'gender_id' => '1', //Male
                'first_name' => 'darren',
                'last_name' => 'ezra',
                'email' => 'darren@mail.com',
                'display_picture_link' => 'darren.jpg',
                'password' => bcrypt('darren123'),
            ],
            [
                'role_id' => '1', //User
                'gender_id' => '2', //Female
                'first_name' => 'Yoona',
                'last_name' => 'GG',
                'email' => 'yoona@mail.com',
                'display_picture_link' => 'yoona.jpeg',
                'password' => bcrypt('yoona123'),
            ],
            [
                'role_id' => '1',
                'gender_id' => '1',
                'first_name' => 'Kevin',
                'last_name' => 'Kopi',
                'email' => 'kkopi@mail.com',
                'display_picture_link' => 'kevin.jpg',
                'password' => bcrypt('kevin123'),
            ],
            [
                'role_id' => '2',
                'gender_id' => '2',
                'first_name' => 'Googies',
                'last_name' => 'Lorem',
                'email' => 'GoogiesLorem@mail.com',
                'display_picture_link' => 'cat.jpg',
                'password' => bcrypt('goog123'),
            ]
        ];

        DB::table('accounts')->insert($data);
    }
}
