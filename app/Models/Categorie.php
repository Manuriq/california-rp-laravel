<?php

namespace App\Models;

use App\Models\Forum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
