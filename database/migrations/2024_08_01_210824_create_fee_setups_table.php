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
        Schema::create('fee_setups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->unique();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->integer('registration_fee');
            $table->integer('admission_form');
            $table->integer('admission_fee');
            $table->integer('annual_charge');
            $table->integer('examination_fee');
            $table->integer('monthly_fee');
            $table->integer('monthly_late_fine')->nullable();
            $table->integer('late_fine_date')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_setups');
    }
};
