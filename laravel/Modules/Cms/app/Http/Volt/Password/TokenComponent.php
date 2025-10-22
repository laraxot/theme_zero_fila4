<?php

declare(strict_types=1);

namespace Modules\Cms\Http\Volt\Password;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Modules\Xot\Contracts\UserContract;
use Webmozart\Assert\Assert;

/**
 * Summary of TokenComponent.
 *
 * @see https://github.com/thedevdojo/genesis/blob/main/stubs/class/resources/views/pages/auth/password/%5Btoken%5D.blade.php
 */
class TokenComponent extends Component
{
    #[Validate('required')]
    public string $token = '';
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|min:8|same:passwordConfirmation')]
    public string $password;
    public string $passwordConfirmation;

    public function mount(string $token): void
    {
        Assert::string($email = request()->query('email', ''));
        $this->email = $email;
        $this->token = $token;
    }

    public function resetPassword(): Redirector|RedirectResponse
    {
        $this->validate();

        $response = Password::broker()->reset(
            [
                'token' => $this->token,
                'email' => $this->email,
                'password' => $this->password,
            ],
            function (UserContract $user, string $password) {
                $user->password = Hash::make($password);

                $user->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));

                Auth::guard()->login($user);
            },
        );
        Assert::string($response, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        Assert::string($trans = trans($response));
        if (Password::PASSWORD_RESET === $response) {
            session()->flash($trans);

            return redirect('/');
        }

        $this->addError('email', $trans);

        return redirect('/');
    }
}
