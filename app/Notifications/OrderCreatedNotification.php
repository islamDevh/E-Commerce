<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderCreatedNotification extends Notification
{
    use Queueable;

    protected $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable) //notifiable is the model of user
    {
        return ['mail']; //
        $channels = ['database']; //default channel
        if($notifiable->notification_preferences['order_created']['sms'] ?? false) {
            $channels[] = 'vonage';
        }
        if($notifiable->notification_preferences['order_created']['mail'] ?? false) {
            $channels[] = 'mail';
        }
        if($notifiable->notification_preferences['order_created']['broadcast'] ?? false) {
            $channels[] = 'broadcast';
        }
        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) //notifiable is the model of user
    {
        $latestOrder = $notifiable->order()->latest()->first();
        $orderNumber = $latestOrder ? $latestOrder->number : 'N/A';
        return (new MailMessage)
                    //for default template
                    ->subject("subject New Order")
                    ->from('islamAdmin@gmail', 'Ecommerce')
                    ->greeting("Hello this is order number #$orderNumber,")
                    ->line("a New Order $notifiable->name} # created by.")
                    ->action('view order', url('/dashboard'))
                    ->line('Thank you for using our application!');
                    // ->view(''); //for custom template view
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}