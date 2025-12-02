<?php

declare(strict_types=1);

namespace Modules\Lang\Models\Contracts;

/**
 * Interfaccia per modelli che supportano traduzioni.
 */
interface HasTranslationsContract
{
    /**
     * Ottiene la traduzione di un attributo in una specifica lingua.
     *
     * @param string $key               Il nome dell'attributo da tradurre
     * @param string $locale            Il codice della lingua richiesta
     * @param bool   $useFallbackLocale Se utilizzare o meno la lingua di fallback quando la traduzione richiesta non è disponibile
     *
     * @return string|array<mixed>|int|null Il valore tradotto dell'attributo, o null se non disponibile
     */
    public function getTranslation(string $key, string $locale, bool $useFallbackLocale = true): string|array|int|null;

    /**
     * Imposta la traduzione di un attributo in una specifica lingua.
     *
     * @param string                       $key    Il nome dell'attributo da tradurre
     * @param string                       $locale Il codice della lingua per cui impostare la traduzione
     * @param int|array<mixed>|string|null $value  Il valore da impostare per la traduzione
     *
     * @return self L'istanza corrente del modello, per supportare method chaining
     */
    public function setTranslation(string $key, string $locale, $value): self;
}
