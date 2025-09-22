<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Image;

use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class Merge
{
    /**
     * Unisce due immagini in una sola.
     *
     * @param string $path1 Percorso della prima immagine
     * @param string $path2 Percorso della seconda immagine
     * @param string $outputPath Percorso di salvataggio
     * @return bool
     */
    public function handle(string $path1, string $path2, string $outputPath): bool
    {

        // Salva il risultato
        $image1->save($outputPath);

        return true;
    }
}
