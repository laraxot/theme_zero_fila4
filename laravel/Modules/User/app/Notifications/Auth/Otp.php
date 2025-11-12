<?php

declare(strict_types=1);

namespace Modules\User\Notifications\Auth;

use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Contracts\UserContract;

class Otp extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        public UserContract $user,
        public string $code,
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $_notifiable L'entità da notificare
     * @return array<int, string>
     */
    public function via(mixed $_notifiable): array
    {
        return ['mail']; // Puoi aggiungere anche 'database', 'slack', ecc. se vuoi supportare altri canali.
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param AnonymousNotifiable $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $pwd = PasswordData::make();
        /** @var string */
        $app_name = config('app.name');

        return new MailMessage()
            ->template('user::notifications.email')
            ->subject(__('user::otp.mail.subject'))
            ->greeting(__('user::otp.mail.greeting'))
            ->line(__('user::otp.mail.line1', ['code' => $this->code]))
            ->line(__('user::otp.mail.line2', ['minutes' => $pwd->otp_expiration_minutes]))
            ->line(__('user::otp.mail.line3'))
            ->action('vai', url('/'))
            ->salutation(__('user::otp.mail.salutation', ['app_name' => $app_name]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray(UserContract $notifiable)
    {
        return [];
    }
}
