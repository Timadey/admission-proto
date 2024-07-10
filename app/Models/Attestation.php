<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attestation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'application_code',
        'full_name',
        'address',
        'position_held',
        'phone_number',
        'signature_url',
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
