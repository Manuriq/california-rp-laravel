<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnage extends Model
{
    public $timestamps = false;

    protected $fillable = ['ep_Temps'];
    use HasFactory;
}