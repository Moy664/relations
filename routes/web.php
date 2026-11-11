<?php

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Tag;
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

Route::get('prueba-m-m',function(){
    // Tag::create([
    //     'name'=> 'Frontend'
    // ]);

    // $post = Post::find(1);
    // return $post;

    $post = Post::find(1);
    // $post->tags()->attach([1,2]); //asignar valores a la tabla pivote de union
    // return $post->tags; //recupero etiquetas asociadas al post    

    // $post->tags()->detach([2]); //quita relacion con la tabla pivote

    $post->tags()->sync([1,3]); //verifica que la etiqueta no esten agregadas ya para no volver a agregarlas, pero si tambien elimina etiquetas que no esten asociadas
    return $post->tags;
});

Route::get('prueba-poli-1-1',function(){
    // User::create([
    //     'name'=>'Moises Otero',
    //     'email'=> 'moises@gmail.com',
    //     'password'=> bcrypt('123')
    // ]);
    // return User::find(1);

    // Asignar manualmente el telefono al usuario
    // $user = User::find(1);
    // Phone::create([
    //     'number'=> '1234567890',
    //     'phoneable_id'=> $user->id,
    //     'phoneable_type'=> User::class,
    // ]);

    //Asiganar el telefono por medio de la relacion
    $user = User::find(1);
    $user->phone()->create([
        'number'=> '1234567890',
    ]);
});
Route::get('prueba-poli-1-m',function(){
    Post::create([
        'title' => 'Post 2',
        'content' => 'Contenido 2',
    ]);

    // Comment::create([
    //     'content' => 'Este es un contenido de prueba',
    //     'commentable_id' => $post->id,
    //     'commentable_type' => Post::class,
    // ]);

    // $post = Post::find(1);
    // $post->comments()->create([
    //     'content'=> 'Este es un contenido de prueba',
    // ]);

    //Forma de recuperar el post desde el comentario
    $comment = Comment::find(1);
    return $comment->commentable;
});

Route::get('prueba-poli-m-m',function(){
    $post = Post::find(1);
    $post->tags()->detach([1]);
});

