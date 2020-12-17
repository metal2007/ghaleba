<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function path(){
        //  وقتی رویه دیدن کامل یک مقاله کلیک میکنیم بر اساس دیس یعنی همین  اسلاگ مقاله رو نشون میده
        return "/articels/$this->slug";
    }


}
