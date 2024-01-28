<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Times extends Model
{
    use HasFactory;

    public function dentistAvailability(): BelongsTo
    {
        return $this->belongsTo(DentistAvailability::class,'availability_id');
    }

    public function appointment(): HasOne
    {
        return $this->hasOne(Appointment::class, 'availability_id');
    }
    protected $primaryKey = 'times_id';
    protected $fillable = [
        'availability_id',
        'days',
        'time',
        'isBooked',
    ];
}
