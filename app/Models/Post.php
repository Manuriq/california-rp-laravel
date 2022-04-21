<?php

namespace App\Models;

use App\Models\Forum;
use App\Models\Compte;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function compte()
    {
        return $this->belongsTo(Compte::class);
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function countMessage($id)
    {
        return Message::where('post_id', $id)
            ->count();
    }
}
