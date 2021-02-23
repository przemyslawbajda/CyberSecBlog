<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    protected $fillable = ["header", "subheader", "content", "author_id", "file_path", "created_at", "updated_at"];
    use HasFactory;
    
    
}
