<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Education;

class Grade extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'education_id',
        'subject_name',
        'grade',
    ];

    /**
     * Get the education that owns the Grade
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class);
    }

}
