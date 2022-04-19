<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categorie()
    {
        return $this->hasOne(Categorie::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getLastPost($id)
    {
        return Post::where('forum_id', $id)
            ->orderBy('updated_at', 'DESC')
            ->limit(1)
            ->first();
    }

    public function countPost($id)
    {
        return Post::where('forum_id', $id)
            ->count();
    }
}
