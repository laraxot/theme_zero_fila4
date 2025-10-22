<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Resources\SurveyPdfResource\Pages;

use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Modules\Quaeris\Filament\Resources\SurveyPdfResource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\Notify\Models\MailTemplate;
use Modules\Notify\Filament\Resources\MailTemplateResource;

class ManageMailTemplates extends Page implements HasTable, HasForms
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithRecord;

    protected static string $resource = SurveyPdfResource::class;
    protected string $view = 'quaeris::filament.pages.manage-mail-templates';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-envelope';
    // protected static bool $shouldRegisterNavigation = false; // se tolgo commento a questa riga non visualizzo più il tasto

    public function mount(SurveyPdf $record): void
    {
        $this->record = $record;
    }


    public static function getNavigationLabel(): string
    {
        return 'Mail Templates';
    }


    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn () => MailTemplate::query()
                    ->where('slug', 'like', 'survey_pdf_' . $this->record->id . '%')
            )
            ->columns([
                TextColumn::make('name')->label('Nome'),
                TextColumn::make('slug'),
                TextColumn::make('subject')->label('Oggetto'),
                TextColumn::make('updated_at')->dateTime('d/m/Y H:i'),
            ])
            ->headerActions([
                CreateAction::make()
                    ->schema(MailTemplateResource::getFormSchema())
                    ->mutateDataUsing(function (array $data) {
                        $data['slug'] = 'survey_pdf_' . $this->record->id . '_' . Str::slug($data['slug']);
                        return $data;
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->schema(MailTemplateResource::getFormSchema()),
                DeleteAction::make(),
            ]);
    }

}
