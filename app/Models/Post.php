<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'imagen', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->select(['name', 'username']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function checkLike($user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
    	