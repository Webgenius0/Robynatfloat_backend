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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->morphs('payable'); // Polymorphic relation
             $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('amount');
            $table->string('currency', 3)->default('USD');
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('stripe_transfer_id')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
