<?php
declare(strict_types=1);
namespace Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Filament\Resources\Pages\CreateRecord;
use Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource;

class CreateSurveyFlipResponse extends XotBaseCreateRecord
{
    protected static string $resource = SurveyFlipResponseResource::class;
}
