<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;
    public function chat_conversation()
    {
        return $this->belongsTo(ChatConversation::class);
    }

    public function chat_participant()
    {
        return $this->belongsTo(ChatParticipant::class);
    }

}
