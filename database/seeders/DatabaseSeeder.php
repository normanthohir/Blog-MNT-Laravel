<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Norman Thohir',
            'username' => 'NormanThiohir',
            'email' => 'norman@gmail.com',
            'password' => bcrypt('norman')
        ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-ptograming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // User::create([
        //     'name' => 'Jodi Lane',
        //     'email' => 'jpdi@gmail.com',
        //     'password' => bcrypt('jodi')
        // ]);



      


        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem. Error hic totam culpa dolores ullam minus alias odio nulla eos. Autem
        //     itaque magni ad asperiores non, impedit quis tenetur voluptate in unde sequi necessitatibus reprehenderit dolorum ullam
        //     voluptates voluptas error quibusdam nihil nesciunt explicabo! Esse facilis placeat eius omnis atque vitae sed laudantium
        //     sapiente debitis veritatis, suscipit, cumque minima eum accusantium saepe animi quos earum maiores? Voluptatibus nihil
        //     nemo et provident nisi, aut magnam placeat saepe eos facere beatae inventore, quasi, reprehenderit praesentium fugiat
        //     quidem! Quia quis minima, repellat omnis vero unde. Error natus laudantium eos corporis! Adipisci ratione itaque aut
        //     quibusdam porro autem minus a! Exercitationem vitae eius voluptatum distinctio eos maxime, possimus velit autem
        //     obcaecati facilis error! Nobis quidem aspernatur dolorum magni consequuntur?',
        //     'category_id' => 1,
        //     'user_id' => 1

        // ]);

        // Post::create([
        //     'title' => 'Judul Ke dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem. Error hic totam culpa dolores ullam minus alias odio nulla eos. Autem
        //     itaque magni ad asperiores non, impedit quis tenetur voluptate in unde sequi necessitatibus reprehenderit dolorum ullam
        //     voluptates voluptas error quibusdam nihil nesciunt explicabo! Esse facilis placeat eius omnis atque vitae sed laudantium
        //     sapiente debitis veritatis, suscipit, cumque minima eum accusantium saepe animi quos earum maiores? Voluptatibus nihil
        //     nemo et provident nisi, aut magnam placeat saepe eos facere beatae inventore, quasi, reprehenderit praesentium fugiat
        //     quidem! Quia quis minima, repellat omnis vero unde. Error natus laudantium eos corporis! Adipisci ratione itaque aut
        //     quibusdam porro autem minus a! Exercitationem vitae eius voluptatum distinctio eos maxime, possimus velit autem
        //     obcaecati facilis error! Nobis quidem aspernatur dolorum magni consequuntur?',
        //     'category_id' => 1,
        //     'user_id' => 1

        // ]);

        // Post::create([
        //     'title' => 'Judul Ke tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem. Error hic totam culpa dolores ullam minus alias odio nulla eos. Autem
        //     itaque magni ad asperiores non, impedit quis tenetur voluptate in unde sequi necessitatibus reprehenderit dolorum ullam
        //     voluptates voluptas error quibusdam nihil nesciunt explicabo! Esse facilis placeat eius omnis atque vitae sed laudantium
        //     sapiente debitis veritatis, suscipit, cumque minima eum accusantium saepe animi quos earum maiores? Voluptatibus nihil
        //     nemo et provident nisi, aut magnam placeat saepe eos facere beatae inventore, quasi, reprehenderit praesentium fugiat
        //     quidem! Quia quis minima, repellat omnis vero unde. Error natus laudantium eos corporis! Adipisci ratione itaque aut
        //     quibusdam porro autem minus a! Exercitationem vitae eius voluptatum distinctio eos maxime, possimus velit autem
        //     obcaecati facilis error! Nobis quidem aspernatur dolorum magni consequuntur?',
        //     'category_id' => 2,
        //     'user_id' => 1

        // ]);
        
        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti maiores ipsum amet quis quos iure quae veniam, soluta
        //     est provident modi incidunt, consequuntur dolorem. Error hic totam culpa dolores ullam minus alias odio nulla eos. Autem
        //     itaque magni ad asperiores non, impedit quis tenetur voluptate in unde sequi necessitatibus reprehenderit dolorum ullam
        //     voluptates voluptas error quibusdam nihil nesciunt explicabo! Esse facilis placeat eius omnis atque vitae sed laudantium
        //     sapiente debitis veritatis, suscipit, cumque minima eum accusantium saepe animi quos earum maiores? Voluptatibus nihil
        //     nemo et provident nisi, aut magnam placeat saepe eos facere beatae inventore, quasi, reprehenderit praesentium fugiat
        //     quidem! Quia quis minima, repellat omnis vero unde. Error natus laudantium eos corporis! Adipisci ratione itaque aut
        //     quibusdam porro autem minus a! Exercitationem vitae eius voluptatum distinctio eos maxime, possimus velit autem
        //     obcaecati facilis error! Nobis quidem aspernatur dolorum magni consequuntur?',
        //     'category_id' => 2,
        //     'user_id' => 2

        // ]);

    }
}
