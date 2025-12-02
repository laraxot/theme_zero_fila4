<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\CustomerResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Quaeris\Filament\Resources\CustomerResource;

class CreateCustomer extends XotBaseCreateRecord
{
    protected static string $resource = CustomerResource::class;
}
