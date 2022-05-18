<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Discount extends JsonResource
{

    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id'=> $this->id,
        //     'disc_name'=> $this->disc_name,
        //     'disc_value'=> $this->disc_value,
        //     'disc_code'=> $this->disc_code,
        //     'created_at'=> $this->created_at?->format('d/m/Y'),
        //     'updated_at'=> $this->updated_at?->format('d/m/Y'),
        // ];
    }
}
