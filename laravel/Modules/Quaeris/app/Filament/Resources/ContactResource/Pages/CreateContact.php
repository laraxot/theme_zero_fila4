<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\ContactResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Quaeris\Filament\Resources\ContactResource;

class CreateContact extends XotBaseCreateRecord
{
    //use \SevendaysDigital\FilamentNestedResources\ResourcePages\NestedPage;
    protected static string $resource = ContactResource::class;
}
