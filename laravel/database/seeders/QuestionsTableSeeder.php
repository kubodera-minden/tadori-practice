<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルの初期化
        DB::table('Questions')->truncate();

        // サンプルレコードの投入
        DB::table('questions')->insert([
            ['title' => '環境に優しい家ってあるの？',
            'content' => '家を建てたいのですが、アレルギーなどが心配です。なにか人にも環境にも優しいお家って建てられるのですか？',
            'opening_comment' => 'アトリエさんは昔からの付き合いで取材させていただきました。',
            'interviewee_name' => 'アトリエ',
            'interviewer_comment' => '〇〇さんのハテナは解決できたでしょうか。力になっていれば幸いです。',
            'questioner_comment' => 'こんな素晴らしい家があるのですね。ありがとうございます！今買いました！',
            'user_id' => 1,
            'interviewer_id' => 1,
            'article_id' => 1,
            'created_at' => time(),
            'updated_at' => time()
            ]
        ]);
    }
}
