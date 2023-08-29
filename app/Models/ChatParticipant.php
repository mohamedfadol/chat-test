<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ChatParticipant extends Pivot
{
    protected $table = 'chat_participants';

    public function chat_participant()
    {
        return $this->morphTo();
    }

    public function chat_messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

}
