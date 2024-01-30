<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Dentist extends Model
{
    use HasFactory, Notifiable;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function examinations(): HasMany
    {
        return $this->hasMany(DentalExamination::class, 'dentist_id');
    }

    public function charts(): HasMany
    {
        return $this->hasMany(DentalChart::class, 'dentist_id');
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(TreatmentRecord::class, 'dentist_id');
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(DentistAvailability::class, 'dentist_id');
    }
    protected $primaryKey = 'dentist_id';

    protected $fillable = [
        'dentist_id',
        'user_id',
        'last_name',
        'first_name',
        'middle_name',
        'contact_number'
    ];
}
