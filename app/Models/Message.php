<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Compte;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
