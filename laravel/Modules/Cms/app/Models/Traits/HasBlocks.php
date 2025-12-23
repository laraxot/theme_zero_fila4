<?php

declare(strict_types=1);


namespace Modules\Cms\Models\Traits;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Modules\Cms\Datas\BlockData;
use Modules\Xot\Datas\XotData;

trait HasBlocks
{
    public function getBlocks(): array
    {
        $blocks = $this->blocks;

        if (!is_array($blocks)) {
            $primary_lang = XotData::make()->primary_lang;
            $blocks = $this->getTranslation('blocks', $primary_lang);
        }

        if (!is_array($blocks)) {
            $blocks = [];
        }

        $blocks = $this->compile($blocks);

        $res = BlockData::collect($blocks);

        return $res;
    }

    public function compile(array $blocks): array
    {
        foreach ($blocks as $key => $value) {
            if (is_array($value)) {
                $blocks[$key] = $this->compile($value);
            }
            if (is_string($value) && Str::containsAll($value, ['{{', '}}'])) {
                $blocks[$key] = Blade::render($value);
            }
        }
        return $blocks;
    }

    public static function getBlocksBySlug(string $slug): array
    {
        $model = static::class;
        $record = $model::firstWhere('slug', $slug);
        if (!$record) {
            return [];
        }
        return $record->getBlocks();
    }
}
