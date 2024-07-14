<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Education extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'application_code',
        'examination_type',
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

    /**
     * Get all of the grades for the Education
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }


}
