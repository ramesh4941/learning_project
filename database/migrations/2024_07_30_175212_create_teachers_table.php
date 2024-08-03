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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('father_name',60);
            $table->date('dob');
            $table->string('gender',15);
            $table->string('phone',12)->unique();
            $table->string('email_address',50)->unique();
            $table->string('password');
            $table->string('subject');
            $table->string('experience',40);
            $table->string('highest_degree',50);
            $table->text('address');
            $table->string('pin_code',10);
            $table->string('city',40);
            $table->string('state',40);
            $table->string('ifsc',15);
            $table->string('account_number',40);
            $table->string('photo');
            $table->string('aadhar');
            $table->string('degree_attachment');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
