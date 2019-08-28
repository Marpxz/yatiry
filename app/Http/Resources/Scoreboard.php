<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Scoreboard extends JsonResource
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
            'name' => $this->user->name . " " . $this->user->lastname,
            'course' => $this->user->course->level . " " . $this->user->course->letter,
            'score' => $this->score,
            'avatar' => $this->user->avatar
        ];
    }
}
