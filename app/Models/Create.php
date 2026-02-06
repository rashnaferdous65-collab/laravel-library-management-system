<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Create extends Model
{
    
   
    protected $table = 'creates';

   
    protected $fillable = [
        'title',
        'phone',
        'email',
        'description',
        'address',
        'user_img',
    ];
}