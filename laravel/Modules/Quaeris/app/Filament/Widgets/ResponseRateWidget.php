<?php
declare(strict_types=1);
namespace Modules\Quaeris\Filament\Widgets;

use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Widgets\Widget;

// use Filament\Tables\Table\Concerns\HasActions;

class ResponseRateWidget extends Widget implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;

    public ?string $tot = null;

    public ?string $sms = null;

    public ?string $emails = null;

    public ?string $title = 'Percentuale Risposte';

    public array $stats;

    // use HasActions;

    protected string $view = 'quaeris::filament.widgets.stats';

    // /**
    //  * @var int | string | array<string, int | null>
    //  */
    // protected int|string|array $columnSpan = 2;

    public function mount(): void
    {
        $this->tot = $this->stats['tot'][0] ?? 0;
        $this->sms = $this->stats['sms'][0] ?? 0;
        $this->emails = $this->stats['emails'][0] ?? 0;
    }
}
