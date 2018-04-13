<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cat_id' => $this->cat_id,
            'detail' => $this->detail,
            'show_on_nav' => $this->show_on_nav,
            'show_on_side' => $this->show_on_side,
          ];
    }
}
