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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("description");
            $table->date("deadline");
            $table->foreignId("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreignId("client_id")->references("id")->on("clients")->onDelete("cascade");
            $table->foreignId("project_id")->references("id")->on("projects")->onDelete("cascade");
            $table->enum("status",["open","blocked","in progress","cancelled","complated"]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
