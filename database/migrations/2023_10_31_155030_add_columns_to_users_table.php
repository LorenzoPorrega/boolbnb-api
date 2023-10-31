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
        Schema::table('users', function (Blueprint $table) {
            $table->string("surname")->after("name");
            $table->string("telephone_num")->nullable()->after("surname");
            $table->date("date_birth")->nullable()->after("telephone_num");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("surname");
            $table->dropColumn("telephone_num");
            $table->dropColumn("date_birth");
        });
    }
};
