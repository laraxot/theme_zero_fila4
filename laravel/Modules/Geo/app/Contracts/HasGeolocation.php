<?php

declare(strict_types=1);

namespace Modules\Geo\Contracts;

/**
 * Interfaccia per modelli che supportano la geolocalizzazione.
 */
interface HasGeolocation
{
    /**
     * Ottiene la latitudine.
     */
    public function getLatitude(): null|float;

    /**
     * Ottiene la longitudine.
     */
    public function getLongitude(): null|float;

    /**
     * Ottiene l'indirizzo formattato.
     */
    public function getFormattedAddress(): null|string;

    /**
     * Verifica se le coordinate sono valide.
     */
    public function hasValidCoordinates(): bool;

    /**
     * Ottiene il tipo di luogo.
     */
    public function getLocationType(): null|string;

    /**
     * Ottiene l'icona per la mappa.
     */
    public function getMapIcon(): null|string;
}
