<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetail extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'application_code',
        'title',
        'surname',
        'other_names',
        'gender',
        'date_of_birth',
        'religion',
        'current_residential_address',
        'local_government',
        'state_of_origin',
        'phone_number',
        'signature_url',
        'passport_photograph_url',
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