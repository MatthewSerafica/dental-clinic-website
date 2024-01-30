<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalHistory extends Model
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
    protected $primaryKey = 'history_id';

    protected $fillable = [
        'student_id',
        'employee_id',
        'allergies',
        'diabetes',
        'blood_dyscrasia',
        'cns_disorder',
        'cardiovascular_disease',
        'tooth_related_surgery',
        'other_conditions',
    ];
}
