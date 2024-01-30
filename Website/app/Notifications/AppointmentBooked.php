<?php

namespace App\Notifications;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentBooked extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private Appointment $appointment
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        if ($notifiable->user_type === 'dentist' || $notifiable->user_type === 'assistant') {
            return ['database'];
        } else {
            return ['database', 'mail'];
        }
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $formatTime = Carbon::createFromFormat('H:i:s', $this->appointment->app_time)->format('h:i A');
        $formatDate = Carbon::createFromFormat('Y-m-d', $this->appointment->app_date)->format('F d, Y');

        return (new MailMessage)
            ->line('An appointment was booked for you at the SLU Dental Clinic on ' . $formatDate . ' at ' . $formatTime . ' for ' . $this->appointment->app_type . '. Please come early')
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
