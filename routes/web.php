<?php

use App\Models\Phone;
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
