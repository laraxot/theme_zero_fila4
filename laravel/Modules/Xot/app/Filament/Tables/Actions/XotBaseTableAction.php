<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Tables\Actions;

use Filament\Actions\Action;
use Closure;
use Illuminate\Database\Eloquent\Model;

/**
 * @property ?Model $record
 * @method ?Model getRecord()
 */
abstract class XotBaseTableAction extends Action
{
    /**
     * @return Model|null
     */
    public function getRecord(bool $withDefault = true): null|Model
    {
        if ($this->record instanceof Closure) {
            return null;
        }

        return $this->record;
    }
}
