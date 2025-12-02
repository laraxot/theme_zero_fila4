<?php

declare(strict_types=1);

namespace Modules\Gdpr\Filament\Pages;

class EditProfile extends \Filament\Auth\Pages\EditProfile
{
    protected static bool $shouldRegisterNavigation = true;

    protected static bool $isDiscovered = false;
}
