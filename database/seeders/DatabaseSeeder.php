<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Muhammad Nizar Fazari',
            'username' => 'NizarFazari',
            'email' => 'nizar@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::factory(3)->create();
        Category::create([
            'name' => 'Web Programming', 
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Multimedia', 
            'slug' => 'multimedia'
        ]);

        Category::create([
            'name' => 'E Commerce', 
            'slug' => 'E-Commerce'
        ]);

        Category::create([
            'name' => 'Web Design', 
            'slug' => 'web-design'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     "title" => "Judul yang ke 2",
        //     "slug" => "Judul yang ke 2",
        //     "category_id" => 1,
        //     "excerpt" => "ini adalah bagian kutipan",
        //     "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas qui quo maxime perspiciatis mollitia voluptas laboriosam, ad soluta porro deserunt amet laborum voluptatum necessitatibus nam, fugit sunt! Praesentium corporis adipisci deserunt tempore libero officia tenetur perferendis soluta eaque illo maxime ex voluptates eos eius corrupti, nesciunt fugit unde ab voluptatem pariatur alias? Minima quas nobis aspernatur dicta neque dolorum hic, maxime quia ullam sunt quos facere doloribus, natus eaque ut ducimus, incidunt veniam. Quisquam amet dicta adipisci neque ipsam, veniam necessitatibus cumque placeat quo ea velit illum rerum sit rem beatae unde sed, ut nihil. Mollitia accusantium dolor repellat ipsum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas qui quo maxime perspiciatis mollitia"
        // ]);
    }
}
