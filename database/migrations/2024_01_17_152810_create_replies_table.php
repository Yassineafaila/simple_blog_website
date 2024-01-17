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
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("post_id")->constrained(table: "posts")->onDelete("cascade");
            $table->foreignId("user_id")->constrained(table: "users")->onDelete("cascade");
            $table->foreignId("comment_Id")->constrained(table: "comments")->onDelete("cascade");
            $table->longText("content");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
