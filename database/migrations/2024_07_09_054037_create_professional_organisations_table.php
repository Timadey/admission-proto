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
        Schema::create('professional_organisations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('application_code')->constrained('admission_applications', 'application_code');
            $table->string('organistaion', 256);
            $table->string('subject', 256);
            $table->string('result', 256);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_organisations');
    }
};
