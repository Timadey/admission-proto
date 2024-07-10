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
        Schema::create('attestations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('application_code')->constrained('admission_applications', 'application_code');
            $table->string('full_name', 256);
            $table->string('address', 256);
            $table->string('position_held', 256);
            $table->string('phone_number', 256);
            $table->string('signature_url', 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attestations');
    }
};
