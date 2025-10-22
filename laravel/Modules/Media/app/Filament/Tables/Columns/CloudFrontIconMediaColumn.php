<?php

declare(strict_types=1);

namespace Modules\Media\Filament\Tables\Columns;

use Exception;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Actions\CloudFront\GetCloudFrontSignedUrlAction;
use Modules\SaluteOra\Models\User;
use Spatie\ModelStates\State;

class CloudFrontIconMediaColumn extends IconColumn
{
    protected function setUp(): void
    {
        parent::setUp();
        $attachment = $this->getName();

        $this->default(fn($record) => $record->getFirstMedia($attachment))
            ->icon('heroicon-o-document-text')
            ->color(fn($record) => $record->getFirstMedia($attachment) ? 'success' : 'danger')
            ->tooltip(fn($record) => $record->getFirstMedia($attachment)->file_name ?? 'Documento non caricato')
            ->url(function ($record) use ($attachment) {
                $media = $record->getFirstMedia($attachment);
                if (!$media) {
                    return;
                }
                $signedUrl = app(GetCloudFrontSignedUrlAction::class)->execute($media->getPath(), 60);
                return $signedUrl;
            })
            ->openUrlInNewTab();
    }
}
