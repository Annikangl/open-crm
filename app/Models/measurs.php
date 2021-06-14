<?php
//меры по обращениям пользователей
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class measurs extends Model
{
    use HasFactory;
    protected $fillable = ['id_obr','text'];
}
