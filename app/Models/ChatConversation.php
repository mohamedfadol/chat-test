<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatConversation extends Model
{
    use HasFactory;
    
    public function chat_participants()
    {
        return $this->hasMany(ChatParticipant::class);
    }

    public function chat_messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

}
