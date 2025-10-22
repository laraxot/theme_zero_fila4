<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Actions;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Modules\Quaeris\Models\SurveyPdf;
use Modules\UI\Enums\TableLayoutEnum;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Enums\ActionsPosition;
use Modules\Limesurvey\Models\LimeQuestion;
use Modules\Xot\Filament\Traits\TransTrait;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\DeleteBulkAction;
use Modules\Limesurvey\Models\SurveyResponse;
use Modules\Limesurvey\Models\SurveyFlipResponse;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Limesurvey\Actions\PopulateSurveyFlipBySurveyIdAction;
use Modules\UI\Filament\Actions\Table\TableLayoutToggleTableAction;
use Modules\Limesurvey\Filament\Resources\SurveyFlipResponseResource;

class ListSurveyFlipResponses extends XotBaseListRecords
{

    public TableLayoutEnum $layoutView = TableLayoutEnum::LIST;

    public string $survey_id = '';

    protected static string $resource = SurveyFlipResponseResource::class;


    public function getListTableColumns(): array
    {
        return [
            TextColumn::make('survey_id'),
            TextColumn::make('token'),
            TextColumn::make('answer'),
            TextColumn::make('value'),
            TextColumn::make('submitdate'),
            TextColumn::make('fieldname'),

        ];
    }


    public function getQuestions(): Collection
    {
        return LimeQuestion::where('sid', $this->survey_id)
            ->where('parent_qid', 0)
            //->whereNotIn('type', [ 'M', 'F' ])
            //['B', '!','F']
            ->get()
            //->take(10) //MariaDB can only use 61 tables in a join
            //->take(2)
        ;
    }

    public function populate(array $data): void
    {
        //892883

        $this->survey_id = Arr::get($data, 'survey_id');

        app(PopulateSurveyFlipBySurveyIdAction::class)->execute($this->survey_id);
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            /*
            Actions\Action::make('export')

                //->action('exportResponses')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('primary'),
            */
            Action::make('populate')

                ->schema([
                    Select::make('survey_id') //892883

                        ->options(fn () => SurveyPdf::all()->pluck('name', 'survey_id')->toArray())
                        ->required()
                    //->rules('required|string', Rule::exists('lime_tokens_'.request()->get('survey_id'), 'token'))
                    ,
                ])
                ->action(fn ($data) => $this->populate($data))
                ->icon('heroicon-o-plus')
                ->color('success'),
        ];
    }


}
