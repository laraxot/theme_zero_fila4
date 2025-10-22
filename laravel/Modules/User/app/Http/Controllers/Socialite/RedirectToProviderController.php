<?php

declare(strict_types=1);

/**
 * @see DutchCodingCompany\FilamentSocialite.
 */

namespace Modules\User\Http\Controllers\Socialite;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use Modules\User\Actions\Socialite\GetProviderScopesAction;
use Modules\User\Actions\Socialite\IsProviderConfiguredAction;
use Modules\User\Actions\Socialite\ValidateProviderAction;
use Modules\User\Exceptions\ProviderNotConfigured;

class RedirectToProviderController extends Controller
{
    /**
     * Undocumented function.
     */
    public function __invoke(Request $_request, string $provider): RedirectResponse
    {
        // if (! app(IsProviderConfiguredAction::class)->execute($provider)) {
        //    throw ProviderNotConfigured::make($provider);
        // }
        app(ValidateProviderAction::class)->execute($provider);

        $scopes = App(GetProviderScopesAction::class)->execute($provider);
        $socialiteProvider = Socialite::with($provider);
        if (!is_object($socialiteProvider)) {
            throw new Exception('wip');
        }

        if (!method_exists($socialiteProvider, 'scopes')) {
            throw new Exception('wip');
        }

        return $socialiteProvider->scopes($scopes)->redirect();
    }
}
