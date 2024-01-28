<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DentalExamination extends Model
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
    protected $primaryKey = 'exam_id';

    protected $fillable = [
        'student_id',
        'employee_id',
        'dentist_id',
        'exam_date',
        'debris_tooth_stain',
        'calcular_deposits',
        'gingivitis',
        'periodontal_pocket',
        'orthodontic_treatment',
        'dmft_total',
        'dmft_teeth_present',
        'dmft_caries_free',
        'dmft_extraction',
        'dmft_restoration',
        'dmft_missing',
        'dmft_filled'
    ];
}
