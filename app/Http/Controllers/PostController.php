<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index (){

        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '. $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' in '. $author->name;
        }
        echo view('blog', 
        [
            "title" => "All posts" . $title,
            // "post" => Post::all()     
            "post" => Post::latest()->filer(request(['search', 'category', 'author']))
            ->paginate(7)->withQueryString(),
            'active' => 'posts',
        ]);
        
    }

    public function show (Post $post) {
        return view('post', [
            "title" => "Sigle Post",
            "post" => $post,
            'active' => 'posts', 
        ]);
    }
    

}
