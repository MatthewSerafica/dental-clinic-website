<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DentalChart extends Model
{
    use HasFactory;

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function dentist(): BelongsTo
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }
    protected $primaryKey = 'chart_id';

    protected $fillable = [
        'patient_id',
        'dentist_id',
        'chart_date',
        'tooth_type',
        'tooth_number',
        'buccal',
        'lingual',
        'mesial',
        'distal',
        'occlusal',
        'condition_one',
        'condition_two',
    ];
}
