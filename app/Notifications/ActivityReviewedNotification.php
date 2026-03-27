<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivityReviewedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $activity;

    public function __construct($activity)
    {
        $this->activity = $activity;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'activity_id' => $this->activity->id,
            'status' => $this->activity->status,
            'teacher_name' => auth()->user()->name,
            'activity_date' => $this->activity->activity_date,
            'message' => 'Your activity on ' . $this->activity->activity_date . ' has been ' . $this->activity->status . '.',
        ];
    }
}
