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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status', ['approved','rejected','pending'])->default('pending');
            $table->float('ai_generated_score', 2)->default(0);
            $table->text('ai_generated_feedback')->nullable();
            $table->uuid('job_vacancy_id');
            $table->foreign('job_vacancy_id')->references('id')->on('job_vacancies')->onDelete('restrict');
            $table->uuid('resume_id');
            $table->foreign('resume_id')->references('id')->on('resumes')->onDelete('restrict');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
