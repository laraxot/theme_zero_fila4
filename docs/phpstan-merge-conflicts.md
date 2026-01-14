# Risoluzione Conflitti di Merge e Analisi PHPStan nei Temi

## Introduzione

Durante l'analisi e la gestione del progetto, è emersa la necessità di risolvere conflitti di merge e applicare analisi PHPStan anche ai temi. Questo documento raccoglie le best practices e le procedure adottate per mantenere elevati standard di qualità del codice nei temi.

---

## Conflitti di Merge nei Temi

### Identificazione dei Conflitti

I conflitti di merge nei temi possono essere identificati utilizzando il comando:

```bash
grep -r "<<<<<<< HEAD" Themes/ --include="*.php" --include="*.blade.php"
```

### Risoluzione dei Conflitti

Come abbiamo visto nei moduli, anche i temi possono contenere conflitti di merge che devono essere risolti:

1. **Conflitti in Blade Templates**:
   ```blade
   {{-- Prima --}}
   <<<<<<< HEAD
   <div class="old-layout">
       {{ $content }}
   </div>
   =======
   <div class="new-layout">
       <x-main-layout>
           {{ $content }}
       </x-main-layout>
   </div>
   >>>>>>> commit-hash
   ```

2. **Conflitti in Folio Pages**:
   ```php
   <?php
   // Prima
   <<<<<<< HEAD
   render(fn () => [
       'users' => User::all(),
   ]);
   =======
   render(fn () => [
       'users' => User::paginate(20),
   ]);
   >>>>>>> commit-hash
   ?>
   ```

### Best Practices per la Risoluzione

1. **Mantenere la qualità del codice**: Anche nei temi, è importante mantenere standard elevati
2. **Preservare la logica di presentazione**: I temi devono rimanere focalizzati sulla presentazione
3. **Verificare la compatibilità**: Assicurarsi che le modifiche non rompano la compatibilità con i moduli

---

## PHPStan nei Temi

### Analisi del Codice PHP nei Temi

Anche se i temi sono principalmente layer di presentazione, contengono comunque codice PHP che deve essere analizzato:

```bash
# Analizzare il codice PHP nei temi
./vendor/bin/phpstan analyse Themes/Zero/app --level=8

# Analizzare le Folio pages con logica PHP
./vendor/bin/phpstan analyse Themes/Zero/resources/views/pages --level=8
```

### Tipi di Codice PHP nei Temi

1. **Folio Pages con logica**:
   ```php
   <?php
   use Modules\User\Models\User;
   
   render(fn (): array => [
       'users' => User::query()->paginate(20),
   ]);
   ?>
   ```

2. **Service Providers dei Temi**:
   ```php
   class ThemeServiceProvider extends ServiceProvider
   {
       public function boot(): void
       {
           View::composer('theme::layouts.main', function ($view) {
               $view->with('globalData', $this->getGlobalData());
           });
       }
   }
   ```

3. **Componenti Blade Custom** (se presenti):
   ```php
   class AlertComponent extends Component
   {
       public string $type;
       
       public function __construct(string $type = 'info')
       {
           $this->type = $type;
       }
   }
   ```

---

## DRY/KISS nei Temi

### Applicazione dei Principi

I principi DRY (Don't Repeat Yourself) e KISS (Keep It Simple, Stupid) sono fondamentali anche nei temi:

#### Esempi di Applicazione DRY

**✅ CORRETTO - Componenti Riutilizzabili**:
```blade
{{-- components/card.blade.php --}}
<div class="card {{ $attributes->get('class') }}">
    <div class="card-header">{{ $header ?? '' }}</div>
    <div class="card-body">{{ $slot }}</div>
    <div class="card-footer">{{ $footer ?? '' }}</div>
</div>

{{-- Utilizzo --}}
<x-card header="Titolo">
    <p>Contenuto della card</p>
</x-card>
```

**❌ ERRATO - Codice Duplicato**:
```blade
{{-- In molteplici file --}}
<div class="card">
    <div class="card-header">Titolo</div>
    <div class="card-body">
        <p>Contenuto della card</p>
    </div>
    <div class="card-footer"></div>
</div>
```

#### Esempi di Applicazione KISS

**✅ CORRETTO - Logica Separata**:
```php
<?php
// resources/views/pages/users/show.blade.php

use Modules\User\Models\User;
use function Laravel\Folio\{name, render};

name('users.show');

render(function (User $user): array {
    return [
        'user' => $user,
        'canEdit' => auth()->user()->can('edit', $user),
        'profileData' => $user->profileData, // Accessor o metodo del modello
    ];
});
?>

<x-layouts.main>
    <div class="user-profile">
        <h1>{{ $user->display_name }}</h1>
        @if($canEdit)
            <a href="{{ route('users.edit', $user) }}">Modifica</a>
        @endif
    </div>
</x-layouts.main>
```

**❌ ERRATO - Logica nel Template**:
```blade
<div class="user-profile">
    @php
        // ❌ Logica di business nel template
        $permissions = \Modules\User\Models\Permission::where('user_id', $user->id)->get();
        $canEdit = $permissions->contains('name', 'edit_users');
        $formattedName = ucwords(strtolower($user->name));
    @endphp
    
    <h1>{{ $formattedName }}</h1>
    @if($canEdit)
        <a href="/users/{{ $user->id }}/edit">Modifica</a>
    @endif
</div>
```

---

## Checklist per la Qualità del Codice nei Temi

### Prima di Eseguire PHPStan

- [ ] Risolti tutti i conflitti di merge identificati
- [ ] Codice PHP nei temi segue le best practices
- [ ] Nessuna logica di business nei template
- [ ] Utilizzo corretto dei componenti
- [ ] Tipizzazione adeguata (dove applicabile)

### Dopo l'Analisi PHPStan

- [ ] Risolti eventuali errori di tipo
- [ ] Verificata la compatibilità con i moduli
- [ ] Controllata la qualità del codice con livello PHPStan appropriato
- [ ] Aggiornata la documentazione se necessario

---

## Esempi Pratici

### Prima e Dopo la Risoluzione

**Prima (con conflitto)**:
```blade
<<<<<<< HEAD
<x-layouts.old>
    {{ $slot }}
</x-layouts.old>
=======
<x-layouts.new>
    <main class="container">
        {{ $slot }}
    </main>
</x-layouts.new>
>>>>>>> commit-hash
```

**Dopo (risolto)**:
```blade
<x-layouts.new>
    <main class="container">
        {{ $slot }}
    </main>
</x-layouts.new>
```

---

## Considerazioni Finali

La gestione dei conflitti di merge e l'analisi PHPStan nei temi sono fondamentali per mantenere:

1. **Coerenza del codice** tra moduli e temi
2. **Qualità elevata** del codice di presentazione
3. **Facilità di manutenzione** del codice
4. **Sicurezza e stabilità** del sistema

Ricordiamo che anche se i temi sono principalmente presentation layer, devono comunque rispettare gli standard di qualità del codice stabiliti dal progetto.

---

*Ultimo aggiornamento: 11 Novembre 2025*
*Autore: Sistema di Documentazione*