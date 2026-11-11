<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    

    /* 
        Convenciones:
        los nombres de llaves foraneas siempre tiene que ser name-table_id
        el nombre de la tabla pivote es por ordenada por orden alfabetico y separado con un guion bajo
        ejemplo si existe post y tags, la tabla queda como post_tags
        Si se rompe alguna convencion es necesario especificar en la relacion los nombres de estas variables
    */
    protected $fillable =[
        'title',
        'content',
    ];

    //relacion 1 a muchos
    // public function comments(){
    //     return $this->hasMany(Comment::class); //funcion 1 a muchos
    // }

    //Relacion polimorfica 1 a muchos
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    //relacion muchos a muchos
    // public function tags(){
    //     return $this->belongsToMany(Tag::class); //si no se siguio la convecion de una tabla pivote es necesario poner una coma y especificar el nombre de la tabla
    // }

    //Realcion polimorfica muchos a muchos
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
}
