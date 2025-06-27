<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderDelivered extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Order Has Been Delivered')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Your order for "' . $this->order->product_title . '" has been delivered!')
            ->line('Thank you for shopping with us!')
            ->action('View Order', url('/show_order'))
            ->line('If you have any questions, feel free to contact us.');
    }

    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'product_title' => $this->order->product_title,
            'image' => $this->order->image, // Add image for notification display
            'message' => 'Your order has been delivered!',
            'url' => url('/show_order'),
        ];
    }
}
