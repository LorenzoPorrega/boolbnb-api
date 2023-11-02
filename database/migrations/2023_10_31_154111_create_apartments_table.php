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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            
            $table->string("title");
            $table->string("adress");
            $table->integer("price");
            $table->json("images");
            $table->text("description");
            $table->integer("rooms_num");
            $table->integer("beds_num");
            $table->integer("bathroom_num");
            $table->boolean("visibility");
            $table->integer("square_meters");
            $table->decimal("longitude", 8, 2);
            $table->decimal("latitude", 8, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
