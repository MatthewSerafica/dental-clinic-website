<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory, Notifiable;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function medicals(): HasOne
    {
        return $this->hasOne(MedicalHistory::class, 'employee_id', 'id_number');
    }

    public function charts(): HasMany
    {
        return $this->hasMany(DentalChart::class, 'employee_id', 'id_number');
    }

    public function examinations(): HasOne
    {
        return $this->hasOne(DentalExamination::class, 'employee_id', 'id_number');
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(TreatmentRecord::class, 'employee_id', 'id_number');
    }

    protected $primaryKey = 'id_number';
    protected $keyType = 'string';


    protected $fillable = [
        'id_number',
        'user_id',
        'employee_type',
        'last_name',
        'first_name',
        'middle_name',
        'sex',
        'address',
        'contact_number',
        'civil_status',
        'department',
        'age',
        'birth_date',
        'updated_at',
    ];
}
