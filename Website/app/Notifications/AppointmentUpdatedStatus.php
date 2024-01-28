<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentUpdatedStatus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private Appointment $appointment,
        private ?string $reason
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
            if ($this->appointment->status === 'pending' || $this->appointment->status === 'ongoing') {
                return ['database'];
            }
            return ['database', 'mail'];
        }
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $mailMessage = (new MailMessage);

        if ($this->appointment->status === 'approved') {
            $mailMessage
                ->line('Your appointment at the SLU Dental Clinic has now been approved.')
                ->action('See Your Appointments', route('patient.appointments'))
                ->line('Thank you for using our application!');
        } else if ($this->appointment->status === 'cancelled') {
            $mailMessage
                ->line('Your appointment at the SLU Dental Clinic has been cancelled. We are sorry for the inconvenience.')
                ->action('See Your Appointments', route('patient.appointments'))
                ->line('Thank you for using our application!');
        } else if ($this->appointment->status === 'completed') {
            $mailMessage
                ->line('Your appointment at the SLU Dental Clinic is now complete.')
                ->line('Thank you for using our application!');
        }

        return $mailMessage;
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
            'reason' => $this->reason,
        ];
    }
}
