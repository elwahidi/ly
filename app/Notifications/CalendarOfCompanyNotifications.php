<?php

namespace App\Notifications;

use App\Calendar;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CalendarOfCompanyNotifications extends Notification
{
    use Queueable;

    public $calendar;

    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'calendarInfo'=>$this->calendar
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(['calendarInfo'=>$this->calendar]);
    }
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
