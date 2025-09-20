---
trigger: manual
description:
globs:
---
# Regole per Componenti Frontend

## Regola Fondamentale
**I componenti frontend devono essere MINIMALISTI e richiamare widget Filament esistenti, NON ricreare logica.**

## Principi Guida

### DRY (Don't Repeat Yourself)
- **NON ricreare** logica già implementata nei widget Filament
- **Riutilizzare** sempre i widget esistenti
- **Mantenere** una singola fonte di verità

### KISS (Keep It Simple, Stupid)
- Componenti Blade **minimalisti**
- **Delegare** tutta la logica ai widget Filament
- **Evitare** duplicazione di configurazioni

## When
- Stai creando un componente frontend per funzionalità esistenti
- Hai widget Filament già implementati
- Devi integrare funzionalità backend nel frontend
- Stai lavorando con calendari, tabelle, form complessi

## Then
- **Richiama** i widget Filament tramite `@livewire($widgetClass)`
- **NON ricreare** configurazioni o logica
- **Usa** match() per selezionare il widget corretto
- **Mantieni** il componente sotto 20 righe
- **Delega** controlli accesso ai widget

## Struttura Corretta

### Componente Minimalista
```blade
@props([
    'type' => 'default',
])

@php
    $widgetClass = match($type) {
        'patient' => \Modules\<nome progetto>\Filament\Widgets\PatientWidget::class,
        'doctor' => \Modules\<nome progetto>\Filament\Widgets\DoctorWidget::class,
        'admin' => \Modules\<nome progetto>\Filament\Widgets\AdminWidget::class,
        default => \Modules\<nome progetto>\Filament\Widgets\DefaultWidget::class,
    };
@endphp

<div class="widget-container">
    @livewire($widgetClass)
</div>
```

### Controllo Accessi
- **Delegare** ai widget tramite `canView()`
- **NON duplicare** controlli nel componente
- **Utilizzare** i controlli esistenti dei widget

## Errori da Evitare

### ❌ Approccio Sbagliato
- Ricreare configurazioni FullCalendar/Filament
- Implementare logica di business nel componente
- Duplicare controlli di accesso
- Gestire API calls direttamente
- Componenti di centinaia di righe

### ✅ Approccio Corretto
- Richiamare widget esistenti
- Componenti sotto 20 righe
- Delegare tutto ai widget
- Usare Livewire per integrazione
- Mantenere responsabilità singola

## Testing

### Test Semplici
```php
public function test_renders_correct_widget_for_type()
{
    $component = Blade::render('<x-my-component type="patient" />');
    
    $this->assertStringContains('PatientWidget', $component);
}
```

## Documentazione

### Aggiornare Sempre
- Documentare l'approccio minimalista
- Spiegare quale widget viene richiamato
- Linkare alla documentazione del widget
- Evidenziare i principi DRY e KISS

## Zen del Frontend

### Semplicità
> "La semplicità è la sofisticazione suprema." - Leonardo da Vinci

### Responsabilità Unica
- **Componente**: Routing verso widget corretto
- **Widget**: Logica e funzionalità
- **Actions**: Business logic

### Manutenibilità
Un componente semplice è:
- Facile da testare
- Facile da debuggare
- Facile da estendere
- Facile da mantenere
