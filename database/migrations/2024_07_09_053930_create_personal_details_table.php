<?php

use App\Gender;
use App\Religion;
use App\Title;
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
        Schema::create('personal_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('application_code')->constrained('admission_applications', 'application_code');
            $table->enum('title', Title::values());
            $table->string('surname', 64);
            $table->string('other_names', 128);
            $table->enum('gender', Gender::values());
            $table->date('date_of_birth');
            $table->enum('religion', Religion::values());
            $table->string('current_residential_address', 256);
            $table->string('local_government', 256);
            $table->string('state_of_origin', 256);
            $table->string('phone_number', 12);
            $table->string('signature_url', 256);
            $table->string('passport_photograph_url', 256);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details');
    }
};
