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
        DB::table('products')->truncate();

        // サンプルレコードの投入
        DB::table('products')->insert([
            ['name' => 'アトリエのマイホーム',
            'content' => '環境に配慮したエコなハウスです。',
            'price' => 50000000,
            'image_path' => 'bCmhQwu99iqrtu5ps1wTtsdih8RdVyj3kqJNAGtg.png',
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s")
            ]
        ]);
    }
}
