<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class user extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // "id"=>$this->id,
            // "Name"=>$this->name,
            // "Role"=>$this->id_role,
            "take_id"=>new user_refCollection($this->takeId) ,
            
            

        ];
    }
}
