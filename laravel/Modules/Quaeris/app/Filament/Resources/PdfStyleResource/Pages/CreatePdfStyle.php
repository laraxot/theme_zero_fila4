<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Quaeris\Filament\Resources\PdfStyleResource;

class CreatePdfStyle extends XotBaseCreateRecord
{
    protected static string $resource = PdfStyleResource::class;
}
