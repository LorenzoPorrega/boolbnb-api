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
        Schema::table('amenity_apartment', function (Blueprint $table) {
            $table->unsignedBigInteger("amenity_id")->after("apartment_id");

            $table->foreign("amenity_id")
                ->references("id")
                ->on("amenities");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('amenity_apartment', function (Blueprint $table) {
            $table->dropForeign("amenity_apartment_amenity_id_foreign");
            $table->dropColumn("amenity_id");
        });
    }
};
