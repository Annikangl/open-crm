<?php
//подразделения
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\justice;
use App\Models\notarial;

class podrazdel extends Model
{
    use HasFactory;


    
    // protected $fillable = ['idOrganMinusta','idTerritorial','idNotarial'];
    protected $fillable = ['nameOtdel'];

    public function takeName(){
        // $justice=$this->hasMany(justice::class,'id','idOrganMinusta');
        // $territorial=$this->hasMany(territorial::class,'id','idTerritorial');
        // $notarial=$this->hasMany(notarial::class,'id','idNotarial');

   
        return $this->hasMany(podrazdelList::class,'idOtdel','id');
    }
 
}

