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
            ['title' => '山田哲人ヤクルト残留',
            'content' => '{"time":1608018160431,"blocks":[{"type":"header","data":{"text":"山田哲人FA権行使せず","level":1}},{"type":"image","data":{"file":{"url":"storage/article_img/s59KRkEo8rG4uDCZqf5b1Yq06CFZRsxjIxnkTPmw.jpeg"},"caption":"","withBorder":false,"stretched":false,"withBackground":true}},{"type":"header","data":{"text":"スワローズ山田哲人内野手は１１月２０日にFA権を行使せず、長年お世話になったヤクルトに残留することを決めた。山田は「自分は本当に恵まれている。ファンにも愛されていると感じた」と発言し、ファンに感謝の気持ちを伝えた。","level":2}},{"type":"header","data":{"text":"来季の予想スタメンはこれだ","level":1}},{"type":"list","data":{"style":"ordered","items":["山田","青木","サンタナ","村上","オスナ","塩見","廣岡","中村","奥川"]}}],"version":"2.19.1"}',
            'created_at' => time(),
            'updated_at' => time()],
            ['title' => 'サンプル記事２',
            'content' => 'これはサンプル記事２です',
            'created_at' => time(),
            'updated_at' => time()],
            ['title' => 'サンプル記事３',
            'content' => 'これはサンプル記事３です',
            'created_at' => time(),
            'updated_at' => time(),]
        ]);
    }
}
