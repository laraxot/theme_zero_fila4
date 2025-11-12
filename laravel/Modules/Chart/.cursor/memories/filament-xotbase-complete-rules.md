# Memoria Completa: Regole Filament XotBaseResource

## REGOLE CRITICHE DA RICORDARE SEMPRE

### 1. Struttura File vs Namespace
- **File**: `Modules/<Nome>/app/Filament/Resources/UserResource.php`
- **Namespace**: `Modules\<Nome>\Filament\Resources` (SENZA `app`)
- **TUTTI i file PHP devono essere in `app/` ma il namespace NON include `app`**

### 2. Estensioni Obbligatorie
- Resources → `Modules\Xot\Filament\Resources\XotBaseResource`
- Pages → `Modules\Xot\Filament\Resources\Pages\XotBaseListRecords`
- Widgets → `Modules\Xot\Filament\Widgets\XotBaseWidget`
- **MAI** estendere direttamente le classi Filament standard

### 3. Proprietà/Metodi VIETATI in XotBaseResource
**NON dichiarare mai:**
- `protected static ?string $navigationGroup`
- `protected static ?string $navigationLabel`
- `protected static ?string $navigationIcon`
- `protected static ?string $translationPrefix`
- `public static function table(Table $table): Table`
- `public static function getListTableColumns(): array`
- `public static function getTableFilters(): array`
- `public static function getBulkActions(): array`
- `public static function getPages(): array` (se restituisce solo index,create,edit)

### 4. Metodi con Array Associativo
**SEMPRE restituire array associativo con chiavi string:**
- `getFormSchema(): array` - chiavi: sezioni del form
- `getTableActions(): array` - chiavi: nomi delle azioni
- `getTableColumns(): array` - chiavi: nomi delle colonne
- `getTableFilters(): array` - chiavi: nomi dei filtri
- `getTableBulkActions(): array` - chiavi: nomi delle azioni bulk

### 5. Traduzioni
- **MAI** usare `->label()` sui componenti Filament
- **SEMPRE** usare file di traduzione in `Modules/<Nome>/lang/`
- LangServiceProvider gestisce automaticamente le traduzioni

### 6. Enum vs Array Options
- Se una select ha options array, convertire agli enum PHP 8.1+
- Utilizzare enum con `HasLabel`, `HasIcon`, `HasColor`

## CHECKLIST RAPIDA PRIMA DI OGNI MODIFICA

### File e Namespace
- [ ] File in `app/`?
- [ ] Namespace senza `app`?
- [ ] Estende XotBase*?

### Resource Filament
- [ ] Nessuna proprietà navigationGroup/navigationLabel/navigationIcon?
- [ ] Nessun metodo table()?
- [ ] Metodi restituiscono array associativo?
- [ ] Nessun `->label()` sui componenti?
- [ ] Array options convertiti in enum?

### Verifica Post-Modifica
- [ ] IDE riconosce il file?
- [ ] `php artisan` non da errori?
- [ ] Traduzioni funzionano?
- [ ] Test passano?

## ERRORI COMUNI DA EVITARE

### Namespace Errati
- ❌ `Modules\<nome progetto>\App\Filament\Resources`
- ✅ `Modules\<nome progetto>\Filament\Resources`

### File fuori da app/
- ❌ `Modules/<nome progetto>/Filament/Resources/UserResource.php`
- ✅ `Modules/<nome progetto>/app/Filament/Resources/UserResource.php`

### Estensioni Dirette
- ❌ `extends Resource`
- ✅ `extends XotBaseResource`

### Proprietà Vietate
- ❌ `protected static ?string $navigationGroup = 'Users';`
- ✅ Rimuovere completamente, gestito dalla classe base

### Traduzioni Hardcoded
- ❌ `TextInput::make('name')->label('Nome')`
- ✅ `TextInput::make('name')` (traduzione automatica)

## MOTIVAZIONI

### Perché queste regole?
- **Centralizzazione**: Configurazioni comuni gestite in un punto
- **Coerenza**: Tutti i moduli seguono le stesse regole
- **Manutenibilità**: Modifiche globali senza toccare ogni risorsa
- **Scalabilità**: Architettura che cresce senza complessità
- **DRY**: Don't Repeat Yourself
- **KISS**: Keep It Simple, Stupid

### Filosofia
> "La semplicità è la sofisticazione suprema. Un sistema ben progettato nasconde la complessità dietro un'interfaccia semplice."

## DOCUMENTAZIONE CORRELATA

### Regole Complete
- [Regole Cursor](../.cursor/rules/filament-xotbase-resource-best-practices.mdc)
- [Regole Windsurf](../.windsurf/rules/filament-xotbase-resource-best-practices.mdc)
- [Regole Namespace](../.cursor/rules/namespace-structure-rules.mdc)

### Documentazione Moduli
- [<nome progetto> Filament Best Practices](../laravel/Modules/<nome progetto>/docs/filament-best-practices.mdc)
- [Xot Filament Best Practices](../laravel/Modules/Xot/docs/filament-best-practices.md)

**QUESTA MEMORIA VA CONSULTATA PRIMA DI OGNI MODIFICA AI FILE FILAMENT** 
