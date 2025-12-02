<?php

declare(strict_types=1);

namespace Modules\Cms\Filament\Resources;

use Override;
use Filament\Schemas\Components\Utilities\Get;
use Modules\Cms\Filament\Resources\AttachmentResource\Pages\ListAttachments;
use Modules\Cms\Filament\Resources\AttachmentResource\Pages\CreateAttachment;
use Modules\Cms\Filament\Resources\AttachmentResource\Pages\EditAttachment;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Modules\Cms\Enums\AttachmentDiskEnum;
use Modules\Cms\Filament\Resources\AttachmentResource\Pages;
use Modules\Cms\Models\Attachment;
use Modules\Lang\Filament\Resources\LangBaseResource;

class AttachmentResource extends LangBaseResource
{
    protected static null|string $model = Attachment::class;

    #[Override]
    public static function getFormSchema(): array
    {
        return [
            'title' => TextInput::make('title')->required(),
            //->live(onBlur: true)
            //->afterStateUpdated(function ($state, callable $set) {
            //    $set('slug', Str::slug($state));
            //})
            'slug' => TextInput::make('slug')->required(),
            //->unique(ignoreRecord: true)
            'description' => Textarea::make('description'),
            'disk' => Select::make('disk')->options(AttachmentDiskEnum::class),
            'attachment' => FileUpload::make('attachment')
                ->directory('attachments')
                ->preserveFilenames()
                ->maxSize(10240) // 10MB
                ->multiple(false)
                ->downloadable()
                ->openable()
                ->disk(fn(Get $get) => $get('disk')),
            //->getUploadedFileNameForStorageUsing(
            //    fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
            //),
        ];
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            
        ];
    }

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListAttachments::route('/'),
            'create' => CreateAttachment::route('/create'),
            'edit' => EditAttachment::route('/{record}/edit'),
        ];
    }
}
