<?php

declare(strict_types=1);

namespace Modules\UI\Services;

use Modules\Xot\Actions\File\AssetAction;

class UIService
{
    public static function asset(string $asset): null|string
    {
        return app(AssetAction::class)->execute($asset);
    }
}
