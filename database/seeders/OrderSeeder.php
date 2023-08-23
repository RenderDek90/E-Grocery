<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
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
                'account_id' => 1,
                'item_id' => 2,
                'price' => 10000
            ],
            [
                'account_id' => 1,
                'item_id' => 3,
                'price' => 10000
            ],

        ];

        DB::table('orders')->insert($data);
    }
}
