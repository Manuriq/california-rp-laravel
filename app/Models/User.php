<?php

namespace App\Models;

use App\Models\Whitelist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'core_members';
    protected $primaryKey = 'member_id';
    protected $guarded = ['member_id'];

    protected $hidden = [
        'members_pass_hash',
        'remember_token'
    ];

    public function getAuthPassword()
    {
        return $this->members_pass_hash;
    }

    public function whitelist()
    {
        return $this->belongsTo(Whitelist::class);
    }

}
