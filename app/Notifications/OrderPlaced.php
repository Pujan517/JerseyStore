<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification
{
    use Queueable;

    protected $image;
    protected $product_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($image = null, $product_id = null)
    {
        $this->image = $image;
        $this->product_id = $product_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Order Placed Successfully')
            ->line('Your order has been placed successfully!')
            ->action('View Orders', url('/orders'))
            ->line('Thank you for shopping with us!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Your order has been placed successfully!',
            'url' => url('/orders'),
            'image' => $this->image, // just the filename, not asset()
            'product_id' => $this->product_id,
        ];
    }
}
