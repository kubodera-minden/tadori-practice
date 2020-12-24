<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルの初期化
        DB::table('Products')->truncate();

        // サンプルレコードの投入
        DB::table('products')->insert([
            ['name' => 'アトリエのマイホーム',
            'content' => '環境に配慮したエコなハウスです。',
            'price' => 50000000,
            'created_at' => time(),
            'updated_at' => time()
            ]
        ]);
    }
}
