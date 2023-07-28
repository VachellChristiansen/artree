<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chatbot', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('chat_id');
            $table->string('actor');
            $table->text('chat');
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('chat_id')->references('id')->on('chatlog');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
