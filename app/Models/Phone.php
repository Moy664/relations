<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'number',
        // 'user_id',
        'phoneable_id',
        'phoneable_type',
    ];

    //relacion inversa
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    // relacion inversa polimorfica
    public function phoneable(){
        return $this->morphTo();
    }
}
