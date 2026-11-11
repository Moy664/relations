<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Realcion muchos a muchos
    // public function tags(){
    //     return $this->belongsToMany(Post::class);
    // }
    
    //Realcion polimorfica muchos a muchos
    public function posts(){
        return $this->morphedByMany(Post::class,'taggable');
    }
}
