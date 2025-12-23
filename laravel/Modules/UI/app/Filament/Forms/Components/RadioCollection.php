<?php

declare(strict_types=1);

namespace Modules\UI\Filament\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Illuminate\Support\Collection;
use Modules\Xot\Actions\Cast\SafeStringCastAction;

class RadioCollection extends Field
{
    protected string $view = 'ui::filament.forms.components.radio-collection';

    /**
     * Callback per ottenere gli studi.
     */
    protected Closure|Collection|null $options = null;
    protected string $itemView;
    protected string $valueKey = 'id';

    /**
     * Set the options collection for the radio buttons.
     */
    public function options(Closure|Collection|null $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Set the custom item view template.
     */
    public function itemView(string $view): static
    {
        $this->itemView = $view;

        return $this;
    }

    /**
     * Set the key to use as the value for each option.
     */
    public function valueKey(string $key): static
    {
        $this->valueKey = $key;

        return $this;
    }

    /**
     * Get the options collection.
     */
    public function getOptions(): Collection
    {
        $options = $this->evaluate($this->options);
        return $options;
    }

    /**
     * Get the item view template path.
     */
    public function getItemView(): string
    {
        return $this->itemView ?? 'ui::filament.forms.components.radio-collection-item';
    }

    /**
     * Get the value key for options.
     */
    public function getValueKey(): string
    {
        return $this->valueKey;
    }

    /**
     * Comparazione type-safe per determinare se un'opzione è selezionata.
     *
     * @param mixed $option
     * @return bool
     */
    public function isOptionSelected($option): bool
    {
        $state = SafeStringCastAction::cast($this->getState());
        $currentValue = (string) $state;
        $optionData = data_get($option, $this->getValueKey());
        /** @phpstan-ignore-next-line */
        $optionValue = SafeStringCastAction::cast($optionData);

        return $currentValue === $optionValue;
    }
}
