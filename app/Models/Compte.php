<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Message;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Compte extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->cAdmin >= 5;
    }

    public function countPost($id)
    {
        return Post::where('compte_id', $id)
            ->count();
    }

    public function countMessage($id)
    {
        $post = $this->countPost($id);

        return Message::where('compte_id', $id)
            ->count()+$post;
    }

    public function roleName()
    {
        if($this->cAdmin == 0){
            return "Joueur";
        }elseif($this->cAdmin == 1){
            return "Helper";
        }elseif($this->cAdmin == 2){
            return "Modérateur";
        }elseif($this->cAdmin == 3){
            return "Administrateur";
        }elseif($this->cAdmin > 4){
            return "Fondateur";
        }
    }
}
