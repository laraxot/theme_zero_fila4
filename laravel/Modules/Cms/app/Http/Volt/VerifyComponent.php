<?php

declare(strict_types=1);

namespace Modules\Cms\Http\Volt;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;
use Webmozart\Assert\Assert;

/**
 * Summary of VerifyComponent.
 *
 * @see https://github.com/thedevdojo/genesis/blob/main/stubs/class/resources/views/pages/auth/verify.blade.php
 */
class VerifyComponent extends Component
{
    public function resend(): void
    {
        /*
         * if (auth()->user()->hasVerifiedEmail()) {
         * return redirect()->intended(route('dashboard'));
         * }
         *
         * auth()->user()->sendEmailVerificationNotification();
         *
         * return back()->with('status', 'verification-link-sent');
         */
        Assert::notNull($user = auth()->user());
        if ($user->hasVerifiedEmail()) {
            redirect('/');
        }

        $user->sendEmailVerificationNotification();

        // Cast to MustVerifyEmail for the Verified event
        if ($user instanceof MustVerifyEmail) {
            event(new Verified($user));
        }

        $this->dispatch('resent');
        session()->flash('resent');
    }
}
