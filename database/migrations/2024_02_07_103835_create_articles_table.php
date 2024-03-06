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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->unsignedBigInteger('user_id')->nullable();// lo nichiaro nullable senno non riesco a creare l'oggetto article
            //$table->unsignedBigInteger('category_id');
            $table->string('description', 250);
            $table->text('body')->nullable();
            $table->string('image', 255)->nullable();
            $table->boolean('visible')->default(false);
            $table->timestamps();

            //inserisco il  vincolo
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
