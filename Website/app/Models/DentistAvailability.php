<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DentistAvailability extends Model
{
    use HasFactory;

    public function dentist(): BelongsTo
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }

    public function times(): HasMany 
    {
        return $this->hasMany(Times::class,'availability_id');
    }
    protected $primaryKey = 'availability_id';

    /* protected $fillable = [
        'dentist_id',
        'days',
        'time',
        'isBooked',
    ]; */

    protected $fillable = [
        'dentist_id',
        'day',
        'start_time',
        'end_time',
        'time_slot',
        'isBooked',
    ];

}
