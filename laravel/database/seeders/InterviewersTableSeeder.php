<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // テーブルの初期化
        DB::table('interviewers')->truncate();

        // サンプルレコードの投入
        DB::table('interviewers')->insert([
            ['name' => '平井',
            'introduce' => 'みんな電力の平井です。',
            'image_path' => 'EiRS9of2kKBi7lcT7Na6pBDgJFEdXfsvXPmCqarc.png',
            'created_at' => time(),
            'updated_at' => time()]
        ]);
    }
}
