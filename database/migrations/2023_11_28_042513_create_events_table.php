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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('main_img_url')->nullable();
            $table->string('sub_img_url_one')->nullable();
            $table->string('sub_img_url_two')->nullable();
            $table->string('sub_img_url_three')->nullable();
            $table->string('sub_img_url_four')->nullable();
            $table->dateTime('hold_date');
            $table->decimal('premium_ticket_price', 10, 2)->nullable();
            $table->decimal('normal_ticket_price', 10, 2);
            $table->string('venue');
            $table->timestamps();
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
