<?php

namespace App\Models;


class Post 
{
    private static $blog_post = [
        [
            "title" => "Judul Post yang 1",
            "slug" => "Judul yang 1",
            "author" => "Nizar Fazari",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro enim debitis beatae quibusdam asperiores fugiat magni, doloribus ullam laudantium laboriosam rerum saepe omnis? Laborum, ea quibusdam incidunt velit nulla eaque, consequatur eveniet exercitationem blanditiis voluptas quis quae aliquid ut. Maiores vero veniam animi quos? Reprehenderit odit maiores quisquam doloribus quod illum est fugit suscipit non, minus cupiditate, soluta facilis quasi dolores? Reprehenderit aspernatur, voluptas totam non rerum nulla, ipsa excepturi, dicta ipsum provident earum? Minima veniam autem iste culpa tenetur."

        ],
        [
            "title" => "Judul Post yang 2",
            "slug" => "judul yang 2",
            "author" => "Iqbal R",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro enim debitis beatae quibusdam asperiores fugiat magni, doloribus ullam laudantium laboriosam rerum saepe omnis? Laborum, ea quibusdam incidunt velit nulla eaque, consequatur eveniet exercitationem blanditiis voluptas quis quae aliquid ut. Maiores vero ven."

        ]
    ];

    public static function all () {

        return collect(self::$blog_post);
    }

    public static function find ($slug) {
        $posts = static::all();

        // Penjelasan mengenai method find
        // $post = [];
        // foreach ( $posts as $p){
        //     if ( $p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
