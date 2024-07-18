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
        Schema::create('subject_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->integer('quiz1')->nullable();
            $table->integer('quiz2')->nullable();
            $table->integer('quiz3')->nullable();
            $table->integer('quiz4')->nullable();
            $table->integer('homework1')->nullable();
            $table->integer('midterm_test')->nullable();
            $table->integer('quiz5')->nullable();
            $table->integer('quiz6')->nullable();
            $table->integer('quiz7')->nullable();
            $table->integer('quiz8')->nullable();
            $table->integer('homework2')->nullable();
            $table->integer('final_test')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_grades');
    }
};
