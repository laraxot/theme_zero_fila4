<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Image;

use Intervention\Image\ImageManager as InterventionImageManager;

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
        // Compatibile con Intervention Image v2 (Laravel 10):
        $manager = new InterventionImageManager(['driver' => 'gd']);

        // Carica le immagini
        $image1 = $manager->make($path1);
        $image2 = $manager->make($path2);

        // Inserisce image2 sopra image1 (centrato)
        $image1->insert($image2, 'center');

        // Salva il risultato
        $image1->save($outputPath);

        return true;
    }
}
