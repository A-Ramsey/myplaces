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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->longText("notes");
            $table->double("latitude");
            $table->double("longitude");
        });

        Schema::create("place_user", function (Blueprint $table) {
            $table->id();
            $table->integer("place_id");
            $table->integer("user_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
        Schema::dropIfExists('place_user');
    }
};
