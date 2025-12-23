# Memoria Componenti Filament

## Dropdown

### Struttura Base
Il dropdown in Filament richiede questa struttura:
```blade
<x-filament::dropdown>
    <x-slot name="trigger">
        <!-- Trigger button -->
    </x-slot>

    <x-filament::dropdown.list>
        <!-- List items -->
    </x-filament::dropdown.list>
</x-filament::dropdown>
```

### Componenti Disponibili
- ✅ `x-filament::dropdown`
- ✅ `x-filament::dropdown.list`
- ✅ `x-filament::dropdown.list.item`

### Componenti NON Disponibili
- ❌ `x-filament::dropdown.item`
- ❌ `x-filament::dropdown.separator`
- ❌ `x-filament::dropdown.list.separator`

### Separatori
Per creare un separatore, usare:
```blade
<div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
```

### Form Submit
Per i pulsanti di form (es. logout):
```blade
<form method="POST" action="{{ route('logout') }}" class="w-full">
    @csrf
    <x-filament::dropdown.list.item
        icon="heroicon-m-arrow-right-on-rectangle"
        type="submit"
    >
        {{ __('Log Out') }}
    </x-filament::dropdown.list.item>
</form>
```

### Attributi Importanti
- `icon`: Per aggiungere un'icona
- `type="submit"`: Per pulsanti di form
- `href`: Per link
- `tag="a"`: Per forzare un elemento come link

### Best Practices
1. Usare sempre `x-filament::dropdown.list.item` per gli elementi
2. Aggiungere icone per migliorare l'UX
3. Usare `type="submit"` invece di `onclick` per i form
4. Aggiungere la classe `w-full` ai form per il corretto allineamento 