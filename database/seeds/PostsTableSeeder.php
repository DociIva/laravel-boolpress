<?php

use App\Post;
use Illuminate\Database\Seeder;

//STR inclusione

use illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for( $i = 0; $i < 5; $i++) {

            $new_post = new Post();

            $new_post->title = 'Post  Title' . ($i + 1);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = 'Tuttavia, perché voi intendiate da dove sia nato tutto questo errore, di quelli che incolpano il piacere ed esaltano il dolore, io spiegherò tutta la questione, e presenterò le idee espresse dal famoso esploratore della verità, vorrei quasi dire dal costruttore della felicità umana.';
            
            //save
            $new_post->save();
        }
    }
}
