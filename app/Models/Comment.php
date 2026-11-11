<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'content',
        // 'post_id',
        'commentable_id',
        'commentable_type',
    ];

    //Relacion 1 a muchos
    // public function post(){
    //     return $this->belongsTo(Post::class);
    // }

    // Relacion polimorfica 1 a muchos
    public function commentable(){
        return $this->morphTo();
    }   
}
