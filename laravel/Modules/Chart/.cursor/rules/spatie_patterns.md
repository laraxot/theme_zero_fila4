# Regole per l'Utilizzo di Spatie Laravel Data e QueueableActions

## Utilizzo di Spatie Laravel Data per i DTO

Utilizzare sempre `Spatie\LaravelData\Data` per i Data Transfer Objects:

### Posizione Corretta dei Data Objects
- ✅ CORRETTO: `Modules/ModuleName/app/Datas/`
- ❌ ERRATO: `Modules/ModuleName/app/DataObjects/` o `Modules/ModuleName/app/DTOs/`

### Namespace Corretto
- ✅ CORRETTO: `namespace Modules\ModuleName\Datas;`
- ❌ ERRATO: `namespace Modules\ModuleName\App\Datas;` o `namespace Modules\ModuleName\DataObjects;`

### Implementazione dei Data Objects

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Datas;

use Spatie\LaravelData\Data;

class RatingData extends Data
{
    public function __construct(
        public int $value,
        public string $comment,
        public ?string $user_id = null,
        public ?string $rated_type = null,
        public ?string $rated_id = null,
    ) {
    }
    
    public static function fromRequest(array $data): self
    {
        return new self(
            value: $data['value'] ?? 0,
            comment: $data['comment'] ?? '',
            user_id: $data['user_id'] ?? null,
            rated_type: $data['rated_type'] ?? null,
            rated_id: $data['rated_id'] ?? null,
        );
    }
}
```

## Utilizzo di Spatie QueueableAction per le Azioni

Utilizzare sempre `Spatie\QueueableAction\QueueableAction` per le azioni anziché Services:

### ✅ CORRETTO
```php
// In Modules/Rating/app/Actions/CreateRatingAction.php
<?php

declare(strict_types=1);

namespace Modules\Rating\Actions;

use Modules\Rating\Datas\RatingData;
use Modules\Rating\Models\Rating;
use Spatie\QueueableAction\QueueableAction;

class CreateRatingAction
{
    use QueueableAction;
    
    public function execute(RatingData $data): Rating
    {
        $rating = new Rating();
        $rating->value = $data->value;
        $rating->comment = $data->comment;
        $rating->user_id = $data->user_id;
        $rating->rated_type = $data->rated_type;
        $rating->rated_id = $data->rated_id;
        $rating->save();
        
        return $rating;
    }
}
```

### ❌ ERRATO (Service Pattern)
```php
// EVITARE questo pattern con Services
namespace Modules\Rating\Services;

class RatingService
{
    public function createRating(array $data)
    {
        // Implementazione...
    }
    
    public function updateRating($id, array $data)
    {
        // Implementazione...
    }
}
```

## Utilizzo nei Controller

```php
<?php

declare(strict_types=1);

namespace Modules\Rating\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Rating\Actions\CreateRatingAction;
use Modules\Rating\Datas\RatingData;

class RatingController extends Controller
{
    public function store(Request $request, CreateRatingAction $createRatingAction)
    {
        $validated = $request->validate([
            'value' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);
        
        $ratingData = new RatingData(
            value: $validated['value'],
            comment: $validated['comment'],
            user_id: auth()->id(),
        );
        
        $rating = $createRatingAction->execute($ratingData);
        
        return redirect()->back()->with('success', 'Valutazione creata con successo');
    }
}
```

## Esecuzione in Background

Un grande vantaggio delle QueueableActions è la possibilità di eseguirle in background:

```php
// Esecuzione sincrona
$rating = $createRatingAction->execute($ratingData);

// Esecuzione in background (coda)
$createRatingAction->onQueue('ratings')->execute($ratingData);
```

## Vantaggi dell'Approccio

1. **Responsabilità Singola**: Ogni action è focalizzata su un solo compito
2. **Forte Tipizzazione**: Input e output chiaramente definiti
3. **Facilità di Test**: Actions isolate facili da testare
4. **Compatibilità con PHPStan**: Struttura adatta per analisi livello 9
5. **Asincronia Semplice**: Facile conversione da sincrono ad asincrono
6. **Manutenibilità**: Codice più facile da comprendere e mantenere 