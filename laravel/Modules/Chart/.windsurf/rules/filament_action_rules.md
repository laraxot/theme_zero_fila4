---
trigger: always_on
description: Regole per Action Filament personalizzate
globs: ["**/Filament/Actions/*.php", "**/Filament/Resources/**/Actions/*.php"]
---

# Regole per Action Filament Custom (aggiornamento 2025-05)

## Principi Fondamentali

- Override di `setUp()` per configurare tutte le proprietà dell'action custom (label, icona, conferma, azione, ecc.)
- Nome univoco e documentato passato a parent::make (o gestito internamente da Filament)
- Tutte le label, heading e descrizioni devono provenire dai file di traduzione del modulo (mai stringhe hardcoded)
- Tipizzazione rigorosa di tutti i metodi, evitare mixed se non strettamente necessario
- Documentazione aggiornata e collegata (modulo e root)
- Validazione statica con phpstan e test di regressione dopo ogni bugfix

## Pattern Corretto

```php
namespace Modules\Performance\Filament\Actions;

use Filament\Actions\Action;
use Filament\Support\Colors\Color;

class ExportOrganizzativaAction extends Action
{
    /**
     * Configure the action.
     */
    public function setUp(): void
    {
        parent::setUp();
        
        $this->label(trans('performance::actions.export_organizzativa.label'))
             ->icon('heroicon-o-document-download')
             ->color(Color::BLUE)
             ->requiresConfirmation()
             ->modalHeading(trans('performance::actions.export_organizzativa.modal.heading'))
             ->modalDescription(trans('performance::actions.export_organizzativa.modal.description'))
             ->modalSubmitActionLabel(trans('performance::actions.export_organizzativa.modal.confirm'))
             ->action(fn () => $this->exportAction());
    }
    
    /**
     * Export action implementation.
     *
     * @return void
     */
    protected function exportAction(): void
    {
        // Implementazione
    }
}
```

## Anti-Pattern da Evitare

```php
// ❌ NON USARE QUESTO PATTERN
namespace Modules\Performance\Filament\Actions;

use Filament\Actions\Action;

class ExportOrganizzativaAction extends Action
{
    public static function make(?string $name = null): static
    {
        $static = parent::make($name);
        
        return $static
            ->label('Esporta') // ❌ Stringa hardcoded
            ->icon('heroicon-o-document-download')
            ->requiresConfirmation()
            ->action(fn () => $static->exportAction());
    }
    
    protected function exportAction() // ❌ Senza tipizzazione
    {
        // Implementazione
    }
}
```

## Traduzioni Richieste

Ogni Action deve avere traduzioni complete nel file di traduzione del modulo:

```php
// Modules/Performance/lang/it/actions.php
return [
    'export_organizzativa' => [
        'label' => 'Esporta dati',
        'modal' => [
            'heading' => 'Esportazione dati organizzativa',
            'description' => 'Stai per esportare tutti i dati dell\'organizzativa. Questo processo potrebbe richiedere alcuni minuti.',
            'confirm' => 'Procedi con l\'esportazione',
        ],
        'messages' => [
            'success' => 'Esportazione completata con successo',
            'error' => 'Si è verificato un errore durante l\'esportazione: :error'
        ]
    ],
    // Altre azioni...
];
```

## Documentazione Obbligatoria

Ogni Action custom deve essere documentata in:
1. Documentazione del modulo specifico (es. `Modules/Performance/docs/azioni_organizzativa.md`)
2. Documentazione root collegata con link bidirezionali
3. Collegamenti da entrambe alla presente regola

## Validazione e Testing

- Eseguire PHPStan livello 9+ prima di ogni commit
- Implementare test di regressione per ogni Action
- Verificare che tutte le traduzioni siano presenti
- Controllare che non ci siano stringhe hardcoded

## Backlink e Riferimenti

- [Modules/Performance/docs/azioni_organizzativa.md](mdc:../../laravel/Modules/Performance/docs/azioni_organizzativa.md)
- [Modules/Xot/docs/FILAMENT_ACTIONS.md](mdc:../../laravel/Modules/Xot/docs/FILAMENT_ACTIONS.md)
- [docs/FILAMENT-BEST-PRACTICES.md](mdc:../../docs/FILAMENT-BEST-PRACTICES.md)

*Ultimo aggiornamento: maggio 2025*