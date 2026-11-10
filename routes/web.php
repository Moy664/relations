<?php

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('prueba',function(){
    // Phone::create([
    //     'number'=>'3313246569',
    //     'user_id'=> 1,
    // ]);
    // return 'usuario creado y telefono creado';

    //manera de seleccionar solo los datos de la tabla phone
    // $user = User::find(1);
    // return $user->phone; // hacemos referencia a la funcion phone que creamos en el modelo

    //manera de seleccionar los 2 datos de la tabla
    // $user = User::where('id',1)->with('phone')->first();
    // return $user;

    //seleccionar la tabla user desde phone
    $phone = Phone::where('id',1)->with('user')->first();
    return $phone;
});

Route::get('prueba-1-m',function(){
    // $post = Post::create([
    //     'title' => 'Post 2',
    //     'content' => 'Contenido 2',
    // ]);
    // Comment::create([
    //     'content'=>'comentario 2',
    //     'post_id' => 1,
    // ]);

    // $post = Post::find(1);
    // return $post->comments;

    // $comment = Comment::where('id',1)->with('post')->first();
    // return $comment;

    $post = Post::find(2);
    //se crea un comentario en base al un post que ya fue creado
    $post->comments()->create([
        'content'=>'comentario de prueba'
    ]);
    return 'comentario creado';
});
