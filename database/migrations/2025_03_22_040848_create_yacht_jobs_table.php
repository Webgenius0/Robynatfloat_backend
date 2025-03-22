<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('yacht_jobs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('job_title');
            $table->string('job_category');
            $table->string('location');
            $table->enum('employment_type', ['rotational', 'permanent', 'temporary', 'day_work']);
            $table->dateTime('application_deadline');
            $table->integer('number_of_openings');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('rate_amount_from', 10, 2);
            $table->decimal('rate_amount_to', 10, 2);
            $table->text('job_description');

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
        Schema::dropIfExists('yacht_jobs');
    }
};
