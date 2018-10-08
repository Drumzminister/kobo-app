<?php

namespace Koboaccountant\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Koboaccountant\Models\Sales;

class MadeSales extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sales_id)
    {
        $this->sales = $sales_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $sale = Sales::find($this->sales);
        return (new MailMessage)
                    ->line('A sale was made by one of your client: ' .$sale->company->name)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    

    public function toDatabase($notifiable)
    {
        return [
            'sale_id' => $this->sale_id,
        ];
    }
}
