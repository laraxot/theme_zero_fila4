<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Resources\PdfStyleResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Modules\Quaeris\Filament\Resources\PdfStyleResource;

class EditPdfStyle extends XotBaseEditRecord
{
    protected static string $resource = PdfStyleResource::class;

    
}
