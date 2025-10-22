<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Throwable;
use Illuminate\Support\Str;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class GetTransPathAction
{
    use QueueableAction;

    /**
     * Restituisce il path completo del file di traduzione dato un key.
     */
    public function execute(string $key): string
    {
        $ns = Str::of($key)->before('::')->toString();
        $item = Str::of($key)->after('::')->toString();
        $piece = explode('.', $item);
        $lang = app()->getLocale();
        try {
            $lang_path = app(GetModulePathByGeneratorAction::class)->execute($ns, 'lang');
            Assert::string($lang_path, 'Il percorso del modulo deve essere una stringa');
        } catch (Throwable $e) {
            $lang_path = base_path('Modules/' . $ns . '/lang');
        }
        $file_name = $piece[0] ?? '';
        Assert::string($file_name, 'Il nome del file deve essere una stringa');
        return $lang_path . '/' . $lang . '/' . $file_name . '.php';
    }
}
