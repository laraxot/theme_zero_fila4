<?php

declare(strict_types=1);


namespace Modules\Cms\Filament\Forms\Components;

use Exception;
use Filament\Forms\Components\Placeholder;
use Illuminate\Support\HtmlString;
use Modules\Cms\Models\Attachment;
use Webmozart\Assert\Assert;

class DownloadAttachmentPlaceHolder extends Placeholder
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->label('')->content($this->generateContent(...))->columnSpanFull();
    }

    protected function generateContent(): HtmlString
    {
        $name = $this->getName();
        $attachment = Attachment::firstWhere('slug', $name);
        Assert::isInstanceOf($attachment, Attachment::class);
        $data = [
            'title' => $attachment->title,
            'description' => $attachment->description,
            'asset' => $attachment->asset(),
        ];

        /** @var view-string $view */
        $view = 'pub_theme::filament.forms.components.download-attachment-place-holder';
        if (!view()->exists($view)) {
            throw new Exception('View ' . $view . ' not found');
        }
        $out = view($view, $data);

        return new HtmlString($out->render());
    }
}
