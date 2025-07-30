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
        ->markdown('emails.approved', [
            'business' => $this->business,
            'notifiable' => $notifiable,  // pass this here
        ]);
}

}
