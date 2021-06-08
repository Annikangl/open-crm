<?php
//органы Минюста
namespace App\Models;

use App\Http\Resources\reference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_ref extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','id_refer'];
    public function takeId(){

   
        return $this->hasMany(references::class,'id','id_refer');
    }
}
