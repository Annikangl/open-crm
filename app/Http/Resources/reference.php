<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class reference extends JsonResource
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
            "FIO"=>$this->FIO,
            "email"=>$this->email,
            "telephone"=>$this->telephone,
            "prichinaObr"=>$this->prichinaObr,
            "textObr"=>$this->prichinaObr,
            "idPodr"=>$this->prichinaObr,
            "status"=>$this->prichinaObr,
            "created_at"=>$this->created_at->format('d.m.Y'),
            "updated_at"=>$this->updated_at->format('d.m.Y'),
            // "NamePodrazdel"=>new NamePodrazdelCollection($this->takeName)
            

        ];
    }
}
