<?php

namespace App\Notifications;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TestNotifications extends Notification
{
    use Queueable;

    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'product'=>$this->product
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(['product'=>$this->product]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
