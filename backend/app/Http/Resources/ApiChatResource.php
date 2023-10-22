<?php

namespace App\Http\Resources;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "chat_content" => $this->chat_content,
            "user" => Chat::where("user_id",$this->user_id)->first()->user->fullname,
            "user_id"=>$this->user_id,
            "user_to"=>$this->user_to,
            "created_at"=>$this->created_at
        ];
    }
}
