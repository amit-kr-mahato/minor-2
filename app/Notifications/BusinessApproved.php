<?php
namespace App\Notifications;

use App\Models\Business;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BusinessApproved extends Notification implements ShouldQueue
{
    use Queueable;

    public $business;

    public function __construct(Business $business)
    {
        $this->business = $business;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Your Business Has Been Approved')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('We’re happy to inform you that your business "' . $this->business->business_name . '" has been approved by the admin.')
            ->action('View Your Dashboard', url('/businessdashboard'))
            ->line('Thank you for being part of our platform.');
    }
}
