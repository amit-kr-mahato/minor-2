<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentSuccess extends Notification
{
    use Queueable;

    public $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🎉 Payment Successful')
            ->greeting('Hello ' . $notifiable->name)
            ->line('Your payment was successful.')
            ->line('Amount: Rs. ' . number_format($this->payment->amount / 100, 2))
            ->line('Transaction ID: ' . ($this->payment->token ?? $this->payment->txn_id ?? 'N/A'))
            ->line('Status: ' . $this->payment->status)
            ->action('View Payment History', route('businessdashboard.payment.history'))
            ->line('Thank you for using our service!');
    }
}
