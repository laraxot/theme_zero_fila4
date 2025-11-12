---
trigger: always_on
description: Regole per l'implementazione di Widget Filament in progetti Laraxot/<nome progetto>
globs: ["**/Filament/Widgets/*.php"]
---

# Regole per Widget Filament in Laraxot/<nome progetto>

## Principi Fondamentali

- **Namespace Corretto**: Utilizzare SEMPRE `Modules\{ModuleName}\Filament\Widgets` (mai `App\Filament`)
- **Estensione Base**: Estendere widget base appropriati del modulo UI quando disponibili
- **Traduzioni**: Tutte le label, titoli e descrizioni DEVONO provenire dai file di traduzione
- **Tipizzazione Rigorosa**: Tutti i metodi devono avere tipi di ritorno e parametri espliciti
- **Documentazione**: Documentazione aggiornata nel modulo pertinente con collegamenti bidirezionali

## Struttura Corretta per Widget Personalizzati

### ✅ Pattern Corretto

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Modules\ModuleName\Models\ModelName;

class StatsOverviewWidget extends BaseWidget
{
    /**
     * Determina se il widget deve essere caricato in modo lazy.
     */
    protected static ?bool $isLazy = true;

    /**
     * Determina il limite di polling per il widget.
     */
    protected static ?string $pollingInterval = null;

    /**
     * Definisce le statistiche da visualizzare.
     *
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        return [
            Stat::make(
                __('modulename::widgets.stats.total_items.label'),
                ModelName::count()
            )
                ->description(__('modulename::widgets.stats.total_items.description'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make(
                __('modulename::widgets.stats.average_value.label'),
                ModelName::avg('value')
            )
                ->description(__('modulename::widgets.stats.average_value.description'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make(
                __('modulename::widgets.stats.completion_rate.label'),
                fn (): string => number_format(
                    (ModelName::where('is_completed', true)->count() / ModelName::count()) * 100
                ) . '%'
            )
                ->description(__('modulename::widgets.stats.completion_rate.description'))
                ->color('warning'),
        ];
    }
}
```

### ❌ Anti-pattern da Evitare

```php
<?php

// ❌ Namespace errato
namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\ModelName; // ❌ Namespace Model errato

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array // ❌ Manca tipo di ritorno
    {
        return [
            Stat::make('Totale elementi', ModelName::count()), // ❌ Stringa hardcoded
            
            Stat::make('Valore medio', ModelName::avg('value')), // ❌ Stringa hardcoded
            
            Stat::make('Tasso di completamento', function () { // ❌ Manca tipizzazione
                return number_format(
                    (ModelName::where('is_completed', true)->count() / ModelName::count()) * 100
                ) . '%';
            }),
        ];
    }
}
```

## Struttura File di Traduzione per Widget

```php
// Modules/ModuleName/lang/it/widgets.php
return [
    'stats' => [
        'total_items' => [
            'label' => 'Totale elementi',
            'description' => '3% incremento',
        ],
        'average_value' => [
            'label' => 'Valore medio',
            'description' => '2% decremento',
        ],
        'completion_rate' => [
            'label' => 'Tasso di completamento',
            'description' => 'Ultimi 30 giorni',
        ],
    ],
    'chart' => [
        'title' => 'Andamento mensile',
        'description' => 'Visualizza l\'andamento degli ultimi 12 mesi',
    ],
    'table' => [
        'title' => 'Elementi recenti',
        'empty_state' => 'Nessun elemento recente trovato',
    ],
];
```

## Tipologie di Widget

### 1. StatsOverviewWidget

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Modules\ModuleName\Models\ModelName;

class StatsOverviewWidget extends BaseWidget
{
    /**
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        return [
            // Stats...
        ];
    }
}
```

### 2. ChartWidget

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Modules\ModuleName\Models\ModelName;

class ModelNameChart extends ChartWidget
{
    protected static ?string $heading = null;
    
    /**
     * {@inheritDoc}
     */
    protected function getHeading(): ?string
    {
        return __('modulename::widgets.chart.title');
    }

    /**
     * {@inheritDoc}
     */
    protected function getData(): array
    {
        $data = Trend::model(ModelName::class)
            ->between(
                start: now()->subYear(),
                end: now(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => __('modulename::widgets.chart.label'),
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                    'borderColor' => 'rgb(59, 130, 246)',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function getType(): string
    {
        return 'line';
    }
}
```

### 3. TableWidget

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Modules\ModuleName\Models\ModelName;

class LatestModelNameWidget extends BaseWidget
{
    /**
     * {@inheritDoc}
     */
    protected function getTableHeading(): ?string
    {
        return __('modulename::widgets.table.title');
    }

    /**
     * {@inheritDoc}
     */
    protected function getTableQuery(): Builder
    {
        return ModelName::query()
            ->latest()
            ->limit(5);
    }

    /**
     * {@inheritDoc}
     */
    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    /**
     * {@inheritDoc}
     */
    protected function getTableEmptyStateHeading(): ?string
    {
        return __('modulename::widgets.table.empty_state');
    }

    /**
     * Configura la tabella.
     */
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('modulename::fields.name.label'))
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('modulename::fields.created_at.label'))
                    ->dateTime(),
            ]);
    }
}
```

### 4. Widget personalizzato per FullCalendar

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Widgets;

use Filament\Forms;
use Modules\UI\Filament\Widgets\CalendarWidget as BaseCalendarWidget;
use Modules\ModuleName\Models\EventModel;

class ModuleNameCalendarWidget extends BaseCalendarWidget
{
    /**
     * Il modello per gli eventi del calendario.
     *
     * @var \Illuminate\Database\Eloquent\Model|string|null
     */
    public $model = EventModel::class;
    
    /**
     * Configurazione del calendario.
     *
     * @return array<string, mixed>
     */
    public function config(): array
    {
        return [
            'firstDay' => 1,
            'headerToolbar' => [
                'left' => 'dayGridWeek,dayGridDay',
                'center' => 'title',
                'right' => 'prev,next today',
            ],
        ];
    }
    
    /**
     * Schema del form per gli eventi.
     *
     * @return array<int, \Filament\Forms\Components\Component>
     */
    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label(__('modulename::calendar.fields.title.label'))
                ->placeholder(__('modulename::calendar.fields.title.placeholder'))
                ->required(),
                
            Forms\Components\DateTimePicker::make('starts_at')
                ->label(__('modulename::calendar.fields.starts_at.label'))
                ->required(),
                
            Forms\Components\DateTimePicker::make('ends_at')
                ->label(__('modulename::calendar.fields.ends_at.label'))
                ->required(),
        ];
    }
}
```

## Registrazione dei Widget

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Providers;

use Filament\Support\Facades\FilamentView;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Registra i servizi dell'applicazione.
     */
    public function register(): void
    {
        // Registrazione...
    }

    /**
     * Bootstrap dei servizi dell'applicazione.
     */
    public function boot(): void
    {
        // Registra i widget Filament
        Livewire::component('modulename::stats-overview-widget', \Modules\ModuleName\Filament\Widgets\StatsOverviewWidget::class);
        Livewire::component('modulename::model-name-chart', \Modules\ModuleName\Filament\Widgets\ModelNameChart::class);
        Livewire::component('modulename::latest-model-name-widget', \Modules\ModuleName\Filament\Widgets\LatestModelNameWidget::class);
        Livewire::component('modulename::module-name-calendar-widget', \Modules\ModuleName\Filament\Widgets\ModuleNameCalendarWidget::class);
        
        // Registra i componenti dei widget nelle pagine
        FilamentView::registerRenderHook(
            'panels::page.start',
            fn (): string => '<livewire:modulename::stats-overview-widget />'
        );
    }
}
```

## Utilizzo in Pagine Filament

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Filament\Pages;

use Filament\Pages\Page;
use Modules\ModuleName\Filament\Widgets\ModelNameChart;
use Modules\ModuleName\Filament\Widgets\LatestModelNameWidget;
use Modules\ModuleName\Filament\Widgets\ModuleNameCalendarWidget;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'modulename::filament.pages.dashboard';
    
    /**
     * Widget da visualizzare nella pagina.
     *
     * @return array<class-string>
     */
    protected function getHeaderWidgets(): array
    {
        return [
            \Modules\ModuleName\Filament\Widgets\StatsOverviewWidget::class,
        ];
    }
    
    /**
     * Widget da visualizzare nella pagina.
     *
     * @return array<class-string>
     */
    protected function getFooterWidgets(): array
    {
        return [
            ModelNameChart::class,
            LatestModelNameWidget::class,
            ModuleNameCalendarWidget::class,
        ];
    }
}
```

## Documentazione dei Widget

La documentazione dei widget deve includere:

1. **Scopo**: Descrizione del widget e del suo utilizzo previsto
2. **Configurazione**: Opzioni di configurazione disponibili
3. **Dati**: Origini dei dati e elaborazione
4. **Personalizzazione**: Guide per estendere o personalizzare
5. **Esempi**: Esempi di implementazione e utilizzo

Esempio di struttura di documentazione:

```markdown

# ModuleNameCalendarWidget

## Descrizione
Widget calendario per la visualizzazione e gestione degli eventi del modulo ModuleName.

## Estende
`Modules\UI\Filament\Widgets\CalendarWidget`

## Modello Associato
`Modules\ModuleName\Models\EventModel`

## Configurazione
```php
public function config(): array
{
    return [
        'firstDay' => 1,
        'headerToolbar' => [
            'left' => 'dayGridWeek,dayGridDay',
            'center' => 'title',
            'right' => 'prev,next today',
        ],
    ];
}
```

## Schema del Form
- `title`: Titolo dell'evento (testo)
- `starts_at`: Data e ora di inizio (datetime)
- `ends_at`: Data e ora di fine (datetime)

## File di Traduzione
Utilizza traduzioni da `modulename::calendar.*`

## Registrazione
Registrato in `Modules\ModuleName\Providers\FilamentServiceProvider`

## Utilizzo in Pagine
```php
protected function getFooterWidgets(): array
{
    return [
        ModuleNameCalendarWidget::class,
    ];
}
```
```

## Best Practice

1. **Lazy Loading**:
   - Utilizzare `protected static ?bool $isLazy = true;` per widget con caricamento costoso
   - Considerare il polling solo quando necessario

2. **Responsività**:
   - Assicurarsi che i widget siano reattivi su tutti i dispositivi
   - Utilizzare `protected static ?int $sort = 1;` per controllare l'ordine

3. **Prestazioni**:
   - Ottimizzare le query del database nei widget
   - Utilizzare il caching quando appropriato
   - Minimizzare le operazioni costose

4. **Architettura**:
   - Separare la logica di business dalla presentazione
   - Utilizzare trait per funzionalità comuni tra widget

5. **Accessibilità**:
   - Assicurare che i widget seguano le linee guida di accessibilità
   - Utilizzare ARIA labels quando necessario

## Test dei Widget

```php
<?php

declare(strict_types=1);

namespace Modules\ModuleName\Tests\Feature\Filament\Widgets;

use Livewire\Livewire;
use Modules\ModuleName\Filament\Widgets\StatsOverviewWidget;
use Modules\ModuleName\Models\ModelName;
use Tests\TestCase;

class StatsOverviewWidgetTest extends TestCase
{
    /** @test */
    public function it_correctly_displays_stats(): void
    {
        // Arrange
        ModelName::factory()->count(5)->create();
        
        // Act & Assert
        Livewire::test(StatsOverviewWidget::class)
            ->assertSee('Totale elementi')
            ->assertSee('5');
    }
}
```

## Errori Comuni e Soluzioni

### Errore: Widget non visibile

**Causa**: Il widget non è registrato correttamente o non è incluso nei metodi della pagina.

**Soluzione**:
1. Verificare la registrazione in `FilamentServiceProvider`
2. Assicurarsi che il widget sia incluso in `getHeaderWidgets()` o `getFooterWidgets()`

### Errore: Dati non aggiornati

**Causa**: Mancanza di polling o eventi di aggiornamento.

**Soluzione**:
1. Impostare `protected static ?string $pollingInterval = '15s';` per aggiornamenti periodici
2. Utilizzare eventi Livewire per aggiornare i dati quando cambiano

### Errore: Layout rotto su mobile

**Causa**: Mancanza di classi responsive o layout troppo complesso.

**Soluzione**:
1. Utilizzare le classi Tailwind responsive
2. Testare il widget su diverse dimensioni di schermo
3. Semplificare il layout per schermi piccoli
