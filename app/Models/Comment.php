<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
        //Jeden Comment jest napisany przez jednego User(relacja 1:1)
    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
