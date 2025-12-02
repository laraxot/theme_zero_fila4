<?php

declare(strict_types=1);

namespace Modules\Quaeris\Exports;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Xot\Actions\Collection\TransCollectionAction;

// use Staudenmeir\LaravelCte\Query\Builder as CteBuilder;

class QueryExport implements FromQuery, ShouldQueue, WithChunkReading, WithHeadings, WithMapping
{
    use Exportable;

    public array $headings = [];

    public ?array $fields = null;

    public ?string $transKey = null;

    public QueryBuilder|EloquentBuilder $query;

    public function __construct(QueryBuilder|EloquentBuilder $query, ?string $transKey = null, ?array $fields = null)
    {
        $this->query = $query;
        $this->transKey = $transKey;
        $this->fields = $fields;

        /*
        $this->headings = collect($query->first())
            ->keys()
            ->map(
                function ($item) use ($transKey) {
                    $t = $transKey.'.'.$item;
                    $trans = trans($t);
                    if ($trans != $t) {
                        return $trans;
                    }

                    return $item;
                }
            )
            ->toArray();
        */
    }

    public function getHead(): Collection
    {
        if (is_array($this->fields)) {
            return collect($this->fields);
        }
        /**
         * @var Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null
         */
        $first = $this->query->first();
        if ($first === null) {
            return collect([]);
        }

        // Parameter #1 $value of function collect expects Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null, object given.
        return collect($first)->keys();
    }

    public function headings(): array
    {
        $headings = $this->getHead();

        $transKey = $this->transKey;
        $headings = app(TransCollectionAction::class)->execute($headings, $transKey);

        return $headings->toArray();
    }

    /**
     * se si usa scout aggiungere |ScoutBuilder.
     */
    public function query(): QueryBuilder|EloquentBuilder|Relation
    {
        return $this->query;
        // ->orderBy('id');
    }

    public function chunkSize(): int
    {
        return 200;
    }

    /**
     * @param Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null $item
     */
    public function map($item): array
    {
        if ($this->fields === null) {
            return collect($item)->toArray();
        }
        // dddx([
        //     $item,
        //     $this->fields,
        //     $this->query->get()->take(5)
        // ]);

        // if($item->token == 'ilE6jL6LTpg0d4I'){
        //     dddx([
        //         $item,
        //         $this->fields,
        //     ]);
        // }

        $priority = ['token', 'attribute_3', 'email'];

        // Ordinamento
        $sortedArray = $this->reorderWithPriority($this->getHead()->toArray(), $priority);

        return collect($this->fields)
            ->mapWithKeys(function ($key) use ($item) {
                return [$key => $item[$key] ?? null]; // Assicura che i valori mancanti siano impostati a null
            })
            ->toArray();

        // rameter #1 $value of function collect expects Illuminate\Contracts\Support\Arrayable<(int|string), mixed>|iterable<(int|string), mixed>|null, object given.
        // return collect($item)
        //     ->only($this->fields)
        //     ->toArray();
    }

    public function reorderWithPriority(array $array, array $priority): array
    {
        // Estrai i valori prioritari in ordine specificato
        $prioritized = array_intersect($priority, $array);

        // Ottieni i valori rimanenti esclusi i prioritari
        $remaining = array_diff($array, $prioritized);

        // Ordina alfabeticamente i rimanenti
        sort($remaining);

        // Combina i valori prioritari con quelli ordinati
        return array_merge($prioritized, $remaining);
    }
}
