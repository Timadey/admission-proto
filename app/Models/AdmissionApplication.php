<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AdmissionApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_code',
        'completed',
        'applied_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'completed' => 'boolean',
        ];
    }

   /**
    * Get the user that owns the AdmissionApplication
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user(): BelongsTo
   {
       return $this->belongsTo(User::class);
   }

   /**
    * Get the courseApplication associated with the AdmissionApplication
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
   public function courseApplication(): HasOne
   {
       return $this->hasOne(CourseApplication::class, 'application_code', 'application_code');
   }

    /**
    * Get the educations associated with the AdmissionApplication
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'application_code', 'application_code');
    }

    /**
    * Get the personalDetails associated with the AdmissionApplication
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function personalDetails(): HasOne
    {
        return $this->hasOne(PersonalDetail::class, 'application_code', 'application_code');
    }

    /**
    * Get the professionalQualification associated with the AdmissionApplication
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function professionalQualification(): HasOne
    {
        return $this->hasOne(ProfessionalQualification::class, 'application_code', 'application_code');
    }

    /**
     * Get the professionalOrganisation associated with the AdmissionApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function professionalOrganisation(): HasOne
    {
        return $this->hasOne(ProfessionalOrganisation::class, 'application_code', 'application_code');
    }

    /**
     * Get the attestation associated with the AdmissionApplication
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function attestation(): HasOne
    {
        return $this->hasOne(Attestation::class, 'application_code', 'application_code');
    }

}
