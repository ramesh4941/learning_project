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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('addmission_number',50);
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->date('dob');
            $table->string('gender',15);
            $table->string('phone',12);
            $table->string('email_address',50);
            $table->string('password')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('guardians')->onDelete('cascade');
            $table->unsignedBigInteger('class_id')->nullable();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->unsignedBigInteger('section_id')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->text('address');
            $table->string('pin_code',10);
            $table->string('city',40);
            $table->string('state',40);
            $table->string('photo');
            $table->string('aadhar')->nullable();
            $table->string('transfer_certificate')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
