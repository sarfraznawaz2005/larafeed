<?php

namespace Sarfraznawaz2005\LaraFeed\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Sarfraznawaz2005\LaraFeed\Models\LaraFeedModel;

class LaraFeedNotification extends Notification
{
    use Queueable;

    public $feedback = null;

    /**
     * Create a new notification instance.
     *
     * @param LaraFeedModel $feedback
     */
    public function __construct(LaraFeedModel $feedback)
    {
        $this->feedback = $feedback;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $mailMessage = new MailMessage;
        $mailMessage->subject(config('larafeed.mail.mail_subject', 'New Feedback Received'));
        $mailMessage->greeting(config('larafeed.mail.mail_subject', 'New Feedback Received'));

        $mailMessage->line('Name : ' . $this->feedback->name);
        $mailMessage->line('Email : ' . $this->feedback->email);
        $mailMessage->line('Message : ' . $this->feedback->message);
        $mailMessage->line('IP : ' . $this->feedback->ip);
        $mailMessage->line('URL : ' . $this->feedback->uri);
        $mailMessage->line('Date : ' . $this->feedback->created_at);

        return $mailMessage;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
