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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clearance_id');
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->timestamp('updated_at')->useCurrent();

            $table->foreign('clearance_id')->references('id')->on('clearance');
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
