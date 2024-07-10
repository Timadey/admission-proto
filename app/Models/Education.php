<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'application_code',
        'examination_type',
        'subject_name',
        'grade',
        'year',
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
