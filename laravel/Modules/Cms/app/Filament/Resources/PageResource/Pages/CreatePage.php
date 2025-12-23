<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources\PageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Modules\Cms\Filament\Resources\PageResource;
use Modules\Lang\Filament\Resources\Pages\LangBaseCreateRecord;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

/**
 * Summary of CreatePage.
 */
class CreatePage extends LangBaseCreateRecord
{
    protected static string $resource = PageResource::class;
}
