<?php

declare(strict_types=1);

namespace Modules\Lang\Actions;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Lang\Datas\TranslationData;
use Modules\Xot\Actions\Array\SaveArrayAction;
use Spatie\QueueableAction\QueueableAction;

class PublishTranslationAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     */
    public function execute(TranslationData $translationData): void
    {
        /*
         * $hints=app('translator')->getLoader()->namespaces();
         * $path=collect($hints)->get($row->namespace);
         * if($path==null){
         * throw new Exception('['.__LINE__.']['.class_basename($this).']');
         * }
         * $filename=app(\Modules\Xot\Actions\File\FixPathAction::class)->execute($path.'/'.$row->lang.'/'.$row->group.'.php');
         */
        $filename = $translationData->getFilename();
        /*
         * $data=[];
         * if(File::exists($filename)){
         * $data=File::getRequire($filename);
         * }
         */
        $data = $translationData->getData();
        $data_up = $data;
        Arr::set($data_up, $translationData->item, $translationData->value);
        if ($data !== $data_up) {
            app(SaveArrayAction::class)->execute(
                data: $data_up,
                filename: $filename,
            );
        }
    }
}
