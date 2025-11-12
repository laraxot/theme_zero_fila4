<?php

declare(strict_types=1);

namespace Modules\UI\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;

/**
 * Radio Card Selector Component
 *
 * Componente riutilizzabile per selezione tramite card radio.
 * Popola automaticamente un TextInput con il nome dell'elemento selezionato.
 */
class RadioCardSelector extends Field
{
    protected string $view = 'ui::forms.components.radio-card-selector';

    /**
     * @var array<int, array<string, mixed>>|Closure
     */
    protected array|Closure $cards = [];

    /**
     * @var string|null
     */
    protected null|string $sectionTitle = null;

    /**
     * @var string|null
     */
    protected null|string $sectionSubtitle = null;

    /**
     * @var string|null
     */
    protected null|string $targetFieldName = null;

    /**
     * @var string|null
     */
    protected null|string $emptyStateTitle = null;

    /**
     * @var string|null
     */
    protected null|string $emptyStateDescription = null;

    /**
     * Imposta le card disponibili per la selezione.
     *
     * @param array<int, array<string, mixed>>|Closure $cards
     * @return static
     */
    public function cards(array|Closure $cards): static
    {
        $this->cards = $cards;

        return $this;
    }

    /**
     * Imposta il titolo della sezione.
     *
     * @param string|null $title
     * @return static
     */
    public function sectionTitle(null|string $title): static
    {
        $this->sectionTitle = $title;

        return $this;
    }

    /**
     * Imposta il sottotitolo della sezione.
     *
     * @param string|null $subtitle
     * @return static
     */
    public function sectionSubtitle(null|string $subtitle): static
    {
        $this->sectionSubtitle = $subtitle;

        return $this;
    }

    /**
     * Campo da popolare quando si seleziona una card.
     *
     * @param string $fieldName
     * @return static
     */
    public function populatesField(string $fieldName): static
    {
        $this->targetFieldName = $fieldName;

        return $this;
    }

    /**
     * Imposta il titolo dello stato vuoto.
     *
     * @param string|null $title
     * @return static
     */
    public function emptyStateTitle(null|string $title): static
    {
        $this->emptyStateTitle = $title;

        return $this;
    }

    /**
     * Imposta la descrizione dello stato vuoto.
     *
     * @param string|null $description
     * @return static
     */
    public function emptyStateDescription(null|string $description): static
    {
        $this->emptyStateDescription = $description;

        return $this;
    }

    /**
     * Ottiene le card per la visualizzazione.
     *
     *
     */
    public function getCards(): array
    {
        $result = $this->evaluate($this->cards);

        return is_array($result) ? $result : [];
    }

    /**
     * Ottiene il titolo della sezione.
     *
     * @return string|null
     */
    public function getSectionTitle(): null|string
    {
        return $this->sectionTitle;
    }

    /**
     * Ottiene il sottotitolo della sezione.
     *
     * @return string|null
     */
    public function getSectionSubtitle(): null|string
    {
        return $this->sectionSubtitle;
    }

    /**
     * Ottiene il nome del campo target.
     *
     * @return string|null
     */
    public function getTargetFieldName(): null|string
    {
        return $this->targetFieldName;
    }

    /**
     * Ottiene il titolo dello stato vuoto.
     *
     * @return string|null
     */
    public function getEmptyStateTitle(): null|string
    {
        return $this->emptyStateTitle;
    }

    /**
     * Ottiene la descrizione dello stato vuoto.
     *
     * @return string|null
     */
    public function getEmptyStateDescription(): null|string
    {
        return $this->emptyStateDescription;
    }
}
