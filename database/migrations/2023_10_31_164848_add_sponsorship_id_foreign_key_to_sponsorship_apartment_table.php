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
        Schema::table('sponsorship_apartment', function (Blueprint $table) {
            $table->unsignedBigInteger("sponsorship_id")->after("apartment_id");

            $table->foreign("sponsorship_id")
                ->references("id")
                ->on("sponsorships")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sponsorship_apartment', function (Blueprint $table) {
            $table->dropForeign("sponsorship_apartment_sponsorship_id_foreign");
            $table->dropColumn("sponsorship_id");
        });
    }
};
