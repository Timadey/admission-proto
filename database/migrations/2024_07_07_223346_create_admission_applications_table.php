<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admission_applications', function (Blueprint $table) {
            $table->integer('application_code')->unique()->primary();
            $table->foreignUuid('user_id')->constrained('users');
            // $table->foreignUuid('course_application_id')->nullable()->constrained('course_applications');
            // $table->foreignUuid('personal_details_id')->nullable()->constrained('personal_details');
            // $table->foreignUuid('education_id')->nullable()->constrained('education');
            // $table->foreignUuid('professional_qualifications_id')->nullable()->constrained('professional_qualifications');
            // $table->foreignUuid('professional_organisations_id')->nullable()->constrained('professional_organisations');
            // $table->foreignUuid('attestations_id')->nullable()->constrained('attestations');
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admission_applications');
    }
};
