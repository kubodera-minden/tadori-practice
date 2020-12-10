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
        DB::table('Interviewers')->truncate();

        // サンプルレコードの投入
        DB::table('interviewers')->insert([
            ['name' => '平井',
            'introduce' => 'みんな電力の平井です。',
            'created_at' => time(),
            'updated_at' => time()]
        ]);
    }
}
