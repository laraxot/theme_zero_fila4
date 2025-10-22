<?php

declare(strict_types=1);

/**
 * @see https://github.com/barryvdh/laravel-translation-manager/blob/master/src/Models/Translation.php
 */

namespace Modules\Lang\Models;

use Sushi\Sushi;
use Override;
use Modules\Xot\Contracts\ProfileContract;
use Modules\Lang\Database\Factories\TranslationFileFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Lang\Actions\GetAllTranslationAction;
use Modules\Lang\Actions\ReadTranslationFileAction;
use Modules\Lang\Actions\WriteTranslationFileAction;

use function Safe\json_encode;

/**
 * @property string|null $key
 * @property string|null $path
 * @property string|null $id
 * @property string|null $name
 * @property array<array-key, mixed>|null $content
 * @property-read ProfileContract|null $creator
 * @property-read ProfileContract|null $updater
 * @method static TranslationFileFactory factory($count = null, $state = [])
 * @method static Builder<static>|TranslationFile newModelQuery()
 * @method static Builder<static>|TranslationFile newQuery()
 * @method static Builder<static>|TranslationFile query()
 * @method static Builder<static>|TranslationFile whereContent($value)
 * @method static Builder<static>|TranslationFile whereId($value)
 * @method static Builder<static>|TranslationFile whereKey($value)
 * @method static Builder<static>|TranslationFile whereName($value)
 * @method static Builder<static>|TranslationFile wherePath($value)
 * @mixin IdeHelperTranslationFile
 * @mixin \Eloquent
 */
class TranslationFile extends BaseModel
{
    use Sushi;

    protected $fillable = [
        'id',
        'name',
        'path',
        'content',
    ];

    protected array $schema = [
        'key' => 'string',
        'path' => 'string',
        'id' => 'string',
        'name' => 'string',
        'content' => 'json',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    #[Override]
    protected function casts(): array
    {
        return [
            'content' => 'array',
        ];
    }

    public function getRows(): array
    {
        $files = app(GetAllTranslationAction::class)->execute();
        $rows = Arr::map($files, function ($item) {
            $item['id'] = $item['key'];
            $item['name'] = basename($item['path'], '.php');

            $item['content'] = json_encode(File::getRequire($item['path']));
            /*
             * // Carica il contenuto del file
             * try {
             * $readAction = app(ReadTranslationFileAction::class);
             * $item['content'] = $readAction->execute($item['path']);
             * } catch (\Exception $e) {
             * $item['content'] = [];
             * }
             */
            //dddx($item);
            return $item;
        });
        return $rows;
    }
}
