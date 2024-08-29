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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade'); // Foreign key for students
            $table->foreignId('class_id')->constrained('class_setups')->onDelete('cascade'); // Foreign key for class
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->integer('attendance_by');
            $table->date('date');
            $table->enum('status', ['Present', 'Absent', 'Late']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
