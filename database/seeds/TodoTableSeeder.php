<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = ['家に帰る','食べる','寝る'];
        foreach($content as $contents){
            DB::table('todos')->insert([
                'content' => $contents,
                'created_at' => new Datetime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
