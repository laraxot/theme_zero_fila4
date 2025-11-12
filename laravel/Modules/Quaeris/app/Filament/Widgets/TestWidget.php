<?php

declare(strict_types=1);

namespace Modules\Quaeris\Filament\Widgets;

use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\Widget as BaseWidget;

class TestWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    public string $title = 'no-set';

    protected static ?string $pollingInterval = null;

    protected string $view = 'quaeris::filament.widgets.test';
    protected static bool $isLazy = true;

    /** @var array<string, string> */
    protected $listeners = ['refresh' => '$refresh'];

    protected int | string | array $columnSpan = 'full';

    public function getViewData(): array
    {
        // $survey_pdf_id=Arr::get($this->filters,'survey_pdf_id');
        // $this->title.=' ['.$survey_pdf_id.']';
        return [];
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    // public function getColumns(): int | string | array
    // {
    //     return 'full';
    // }
}
