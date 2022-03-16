<?php

namespace App\Models;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;

    use HasFactory;

    // protected $fillable =
    // [
    //     'title', 'excerpt', 'body', 'slug', 'category_id'
    // ];
    
    //local scope query
    public function scopeFiler($query,array $filters){
        // if (isset($filters['search']) ? $filters['search'] : false){
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }


        //when itu kalo argunmen true maka

        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        //pencarian untuk query ke database yang mana nanti akan join table
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category' ,function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        //pencarian untuk query ke database yang mana nanti akan join table
        $query->when($filters['author'] ?? false, fn($query, $author) =>
        $query->whereHas('author', fn($query) =>
        $query->where('username', $author)  
        )
    );

    }


    //eager load = langsung ambil semua datanya
    protected $with = [
        'category', 'author'
    ];

    

    protected $guarded = 
    [
        'id'
    ];

    function category (){
        return $this->belongsTo(Category::class);
    }

    //karena mengubah nama relasi sehingga harus ada variable penanda  
    function author () {
        return $this->belongsTo(User::class, 'user_id');
    }

    //selalu menggunakan kolom slug bukan id lagi
    public function getRouteKeyName()
    {
        return 'slug';
    }

   
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
