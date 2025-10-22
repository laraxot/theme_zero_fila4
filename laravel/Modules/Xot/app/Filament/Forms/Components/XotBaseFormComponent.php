<?php

declare(strict_types=1);

namespace Modules\Xot\Filament\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Filament\Forms\Components\Field;
use Illuminate\Support\Str;
use Webmozart\Assert\Assert;

/**
 * Base class for form components.
 *
 * @method static static make(string $name) Create a new instance of the component
 */
abstract class XotBaseFormComponent extends Field
{
    /**
     * Get the component name.
     */
    public function getName(): string
    {
        $name = parent::getName();
        Assert::stringNotEmpty($name, 'Component name cannot be empty');

        return $name;
    }

    /**
     * Get the component label.
     */
    public function getLabel(): string
    {
        $label = parent::getLabel();
        if ($label === null) {
            return Str::title($this->getName());
        }
        if ($label instanceof Htmlable) {
            return $label->toHtml();
        }
        return (string) $label;
    }

    /**
     * Configure the component.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->dehydrated(true)->required(false);
    }

    /**
     * Get the validation rules.
     *
     * @return array<string, mixed>
     */
    public function getValidationRules(): array
    {
        /** @var array<string, mixed> $rules */
        $rules = parent::getValidationRules();
        Assert::isArray($rules);

        return $rules;
    }
}
