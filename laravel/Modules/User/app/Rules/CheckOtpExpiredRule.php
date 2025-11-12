<?php

declare(strict_types=1);

namespace Modules\User\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\User;

/**
 * Regola di validazione per verificare se un codice OTP è scaduto.
 */
class CheckOtpExpiredRule implements ValidationRule
{
    private string $message = 'Il codice OTP è scaduto. Richiedi un nuovo codice.';

    public function __construct(
        private User $user,
    ) {}

    /**
     * Run the validation rule.
     */
    public function validate(string $_attribute, mixed $_value, Closure $fail): void
    {
        if ($this->user->updated_at === null) {
            $fail($this->message);
            return;
        }

        $pwd_data = PasswordData::make();
        $otpExpirationMinutes = $pwd_data->otp_expiration_minutes;
        $otp_expires_at = $this->user->updated_at->addMinutes($otpExpirationMinutes);

        if (now()->greaterThan($otp_expires_at)) {
            $fail($this->message);
        }
    }

    /**
     * Ottiene il messaggio di errore da visualizzare.
     *
     * @return string Il messaggio di errore
     */
    public function message(): string
    {
        return __('user::otp.notifications.otp_expired.body');
    }
}
