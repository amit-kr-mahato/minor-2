<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends VerifyEmail
{
    /**
     * Get the verification URL for the given notifiable.
     *
     * Overriding to customize URL expiration, etc.
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',  // Route name
            Carbon::now()->addMinutes(60), // Link expires after 60 minutes
            ['id' => $notifiable->getKey(), 'hash' => sha1($notifiable->getEmailForVerification())]
        );
    }

    /**
     * Get the mail representation of the notification.
     */
   public function toMail($notifiable)
{
    $verificationUrl = $this->verificationUrl($notifiable);

    return (new MailMessage)
        ->subject('Verify Your Email Address')
        ->markdown('emails.verify-email', [
            'url' => $verificationUrl,
            'user' => $notifiable,  // Pass the whole user as 'user'
        ]);
}

}
