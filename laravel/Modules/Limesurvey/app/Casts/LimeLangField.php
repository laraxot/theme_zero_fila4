<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class LimeLangField implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * param \Illuminate\Database\Eloquent\Model $model
     *
     * @param string $key
     * @param array  $attributes
     *
     * @return int|string|array|null
     */
    public function get($model, $key, $value, $attributes)
    {
        if ($value !== null) {
            return $value;
        }

        $l10n = $model->l10n;

        if ($l10n === null) {
            return;
        }

        return $l10n->{$key};
    }

    /**
     * Prepare the given value for storage.
     *
     * param \Illuminate\Database\Eloquent\Model $model
     *
     * @param string $key
     * @param array  $attributes
     *
     * @return int|string|array|null
     */
    public function set($model, $key, $value, $attributes)
    {
        // Access to an undefined property Illuminate\Database\Eloquent\Model::$user.

        return $attributes;
    }
}
