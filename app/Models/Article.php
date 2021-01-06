<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title', 'email', 'description', 'body','images','tags','user_id','created_at', ' updated_at',
    ];

    protected $casts = [
        'images' => 'array'
    ];


    // protected $guarded = [];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    public function path(){
        return "/article/$this->slug";
    }
    public function User()
    {
        return $this->belongsTo('App\Models\User');
        // return $this->belongsTo(User::class);

    }



}
