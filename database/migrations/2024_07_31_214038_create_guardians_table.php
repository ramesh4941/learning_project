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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('father_name', 60)->nullable();
            $table->string('father_occupation', 60)->nullable();
            $table->string('mother_name', 60)->nullable();
            $table->string('mother_occupation', 60)->nullable();
            $table->string('phone', 12)->unique();
            $table->string('email_address', 50)->unique();
            $table->string('password');
            $table->boolean('single_parent')->nullable();
            $table->enum('single_parent_relation', ['Father', 'Mother'])->nullable();
            $table->text('address');
            $table->string('pin_code', 10);
            $table->string('city', 40);
            $table->string('state', 40);
            $table->string('emergency_contact_relation', 60)->nullable();
            $table->string('emergency_contact_name', 60)->nullable();
            $table->string('emergency_contact_contact', 60)->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guardians');
    }
};
