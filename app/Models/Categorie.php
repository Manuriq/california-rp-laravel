<?php

namespace App\Models;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function boot() {
        parent::boot();

        static::deleting(function(Categorie $categorie) {

            $forums = Forum::where('categorie_id', $categorie->id)->get();

            foreach ($forums as $forum) {
                
                $posts = Post::where('forum_id', $forum->id)->get();

                foreach ($posts as $post) {
                    Message::where('post_id', $post->id)->delete();
                    $post->delete();
                }
                $forum->delete();
            }
        });
    }

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
