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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('confirmed_by')->nullable();
            $table->string('type'); // Type of occasion (e.g., birthday party, corporate event)
            $table->dateTime('date'); // Event date
            $table->integer('participants'); // Estimated number of participants
            $table->text('setup')->nullable(); // Preferred setups or special requests
            $table->timestamps();

           $table->foreign('confirmed_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
