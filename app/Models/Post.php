<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    //Usersテーブルとのリレーション（従テーブル側）
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    //ategoryテーブルとのリレーション
    public function category(){
        return $this->belongsTo(Category::class); //talk(投稿)は必ず一つのカテゴリーに属すため
    }
}
