<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class podrazdel extends JsonResource
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
            "id"=>$this->id,
            "NameOtdel"=>$this->nameOtdel,
            "NamePodrazdel"=>new NamePodrazdelCollection($this->takeName) 

        ];
    }
}
