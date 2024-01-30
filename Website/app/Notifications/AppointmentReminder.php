<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentReminder extends Notification implements ShouldQueue
{
    use Queueable;

    private Appointment $appointment;

    /**
     * Create a new notification instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Reminder: You have an appointment tomorrow at the SLU Dental Clinic. Please come early')
            ->action('See Your Appointments', route('patient.appointments'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'app_id' => $this->appointment->app_id,
            'user_id' => $this->appointment->user_id,
            'dentist_id' => $this->appointment->dentist_id,
            'app_time' => $this->appointment->app_time,
            'app_date' => $this->appointment->app_date,
            'app_type' => $this->appointment->app_type,
            'status' => $this->appointment->status,
            'pat_notes' => $this->appointment->pat_notes,
        ];
    }
}
