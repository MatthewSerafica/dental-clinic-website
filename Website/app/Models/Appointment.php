<?php

namespace App\Models;

use App\Notifications\AppointmentReminder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function dentist(): BelongsTo
    {
        return $this->belongsTo(Dentist::class, 'dentist_id', 'dentist_id');
    }

    public function time(): BelongsTo
    {
        return $this->belongsTo(Times::class, 'times_id', 'times_id');
    }

    public static function getUpcomingAppointments(int $days): \Illuminate\Database\Eloquent\Collection
    {
        $now = now();
        $reminderDate = $now->addDays($days)->format('Y-m-d');

        return self::whereDate('app_date', '=', $reminderDate)
            ->whereIn('status', ['approved'])
            ->get();
    }

    public function sendAppointmentReminderNotification(): void
    {
        $this->user->notify(new AppointmentReminder($this));
    }

    protected $fillable = [
        'user_id',
        'dentist_id',
        'app_date',
        'app_time',
        'app_type',
        'pat_notes',
        'status',
        'school',
        'times_id'
    ];

    const STATUSES = ['approved', 'pending', 'ongoing'];

    protected $primaryKey = 'app_id';
}
