<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfessionalOrganisation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'application_code',
        'organisation',
        'subject',
        'result',
        'date',
    ];

    /**
     * Get the application that owns the CourseApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application(): BelongsTo
    {
        return $this->belongsTo(AdmissionApplication::class, 'application_code', 'application_code');
    }
}
