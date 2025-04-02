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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('doctor_document')->nullable();
            $table->string('phone', 20)->unique()->nullable();
            $table->foreignId('specialization_id')->nullable()->constrained('specializations')->onDelete('set null');
            $table->text('bio')->nullable();
            $table->integer('experience_years')->nullable();
            $table->enum('governorate', [
                'Amman', 'Irbid', 'Ajloun', 'Aqaba', 'Balqa',
                'Zarqa', 'Mafraq', "Maan", 'Tafilah', 'Karak', 'Jerash'
            ])->nullable()->default('Amman');
            $table->string('address')->nullable();
            $table->decimal('price_per_appointment', 10, 2)->nullable();
            $table->json('available_days')->nullable();
            $table->json('working_hours')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
