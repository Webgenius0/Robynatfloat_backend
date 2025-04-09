<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('yacht_job_id');
            $table->foreign('yacht_job_id')->references('id')->on('yacht_jobs')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('slug')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('cv');

            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('job_applications');
    }
};
