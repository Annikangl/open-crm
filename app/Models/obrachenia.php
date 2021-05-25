<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obrachenia extends Model
{
    use HasFactory;
    protected $fillable = ['idUser','FIO','telephone','prichinaObr','textObr','idPodr'];
}
