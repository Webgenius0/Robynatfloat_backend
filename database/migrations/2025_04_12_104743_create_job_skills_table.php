<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('yacht_job_id');
            $table->unsignedBigInteger('skill_id');

            $table->foreign('yacht_job_id')
                ->references('id')->on('yacht_jobs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('skill_id')
                ->references('id')->on('skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['yacht_job_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('job_skills');
    }
};
