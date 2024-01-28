<?php

namespace App\Console\Commands;

use App\Models\Appointment;
use App\Notifications\AppointmentReminder;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendAppointmentNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointments:send-reminder';
    protected $description = 'Send notifications for upcoming appointments';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $daysBeforeReminder = 1;

        $appointments = Appointment::getUpcomingAppointments($daysBeforeReminder);

        foreach ($appointments as $appointment) {
            $appointment->sendAppointmentReminderNotification();
        }

        $this->info('Appointment notifications sent successfully.');

        return 0;
    }
}
