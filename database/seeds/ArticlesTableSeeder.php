<?php

use Illuminate\Database\Seeder;
use App\Models\ArticleModel;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++){
            $articals = new ArticleModel;
            $articals->title = "Title ".$i;
            $articals->content = "Content ".$i;
            $articals->save();
        }
    }
}
