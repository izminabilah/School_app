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
        Schema::table('subject_grades', function (Blueprint $table) {
            //
            $table->integer('keterampilan')->nullable()->after('final_test');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subject_grades', function (Blueprint $table) {
            //
            $table->dropColumn('keterampilan');
        });
    }
};
