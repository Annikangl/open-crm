<?php
//Нотариальные конторы
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notarial extends Model
{
    use HasFactory;


    protected $fillable = ['idOtdel','name'];

}
