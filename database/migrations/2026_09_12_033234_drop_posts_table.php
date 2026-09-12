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
        // Leftover from the pre-CariBali personal blog; unused by the app.
        Schema::dropIfExists('posts');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('post_status')->nullable();
            $table->string('usertype')->nullable();
            $table->timestamps();
        });
    }
};
