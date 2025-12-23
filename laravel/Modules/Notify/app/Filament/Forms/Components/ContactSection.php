<?php

declare(strict_types=1);

namespace Modules\Notify\Filament\Forms\Components;

use Filament\Schemas\Components\Section;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Modules\Notify\Enums\ContactTypeEnum;
use Webmozart\Assert\Assert;

// use Squire\Models\Country;

class ContactSection extends Section
{
    //protected string $view = 'filament-forms::components.group';

    protected bool $disableLiveUpdates = false;

    protected function setUp(): void
    {
        parent::setUp();
        $this->schema($this->getFormSchema());
        $this->columns(2);
    }

    protected function getFormSchema(): array
    {
        $res = ContactTypeEnum::getFormSchema();
        return $res;
    }

    /*
     * public function saveRelationships(): void
     * {
     *
     * $state = $this->getState();
     * $record = $this->getRecord();
     * $relationship = $record->{$this->getRelationship()}();
     *
     * if (null === $relationship) {
     * return;
     * }
     * if ($address = $relationship->first()) {
     * $address->update($state);
     * } else {
     * $relationship->updateOrCreate($state);
     * }
     *
     * $record->touch();
     * }
     */
}
