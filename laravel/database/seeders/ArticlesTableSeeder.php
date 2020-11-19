<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルの初期化
        DB::table('Articles')->truncate();

        // サンプルレコードの投入
        DB::table('articles')->insert([
            ['title' => 'サンプル記事１',
            'content' => 'これはサンプル記事１です'],
            ['title' => 'サンプル記事２',
            'content' => 'これはサンプル記事２です'],
            ['title' => 'サンプル記事３',
            'content' => 'これはサンプル記事３です']
        ]);
    }
}
