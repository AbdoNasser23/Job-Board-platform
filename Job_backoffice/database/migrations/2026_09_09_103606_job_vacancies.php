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
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->enum('type',['full-time','contract','remote','hybrid'])->default('full-time');
            $table->decimal('salary', 10, 2);
            $table->uuid('company_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('restrict');
            $table->uuid('category_id');
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_vacancies');
    }
};
