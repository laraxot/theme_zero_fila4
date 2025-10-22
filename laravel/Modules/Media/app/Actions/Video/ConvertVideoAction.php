<?php

/**
 * @see https://github.com/protonemedia/laravel-ffmpeg
 */

declare(strict_types=1);

namespace Modules\Media\Actions\Video;

use FFMpeg\Format\Video\X264;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ProtoneMedia\LaravelFFMpeg\MediaOpener;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

class ConvertVideoAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(string $disk_mp4, string $file_mp4, string $file_new): string
    {
        $media = FFMpeg::fromDisk($disk_mp4);

        $openedMedia = $media->open($file_mp4);

        $exportedMedia = $openedMedia->export();

        $format = new X264();
        $format->setKiloBitrate(1000);

        $toDiskMedia = $exportedMedia->toDisk($disk_mp4);

        $formattedMedia = $toDiskMedia->inFormat($format);

        $formattedMedia->save($file_new);

        return Storage::disk($disk_mp4)->url($file_new);
    }
}
