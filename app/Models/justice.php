<?php
//органы Минюста
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class justice extends Model
{
    use HasFactory;
    protected $fillable = ['idOtdel','name'];
}
