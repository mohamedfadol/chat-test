<?php

use App\Models\ChatConversation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ChatConversation::class);
            $table->morphs('chat_participant','chat_participants_type_id_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_participants');
    }
}
