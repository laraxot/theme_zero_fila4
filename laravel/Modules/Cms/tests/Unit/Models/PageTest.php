<?php

declare(strict_types=1);

namespace Modules\Cms\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Cms\Models\Page;
use Modules\Cms\Models\PageContent;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    $this->page = Page::factory()->create();
});

test('page can be created', function () {
    expect($this->page)->toBeInstanceOf(Page::class);
});

test('page has fillable attributes', function () {
    $fillable = $this->page->getFillable();

    expect($fillable)->toContain('title');
    expect($fillable)->toContain('slug');
    expect($fillable)->toContain('status');
    expect($fillable)->toContain('template');
});

test('page has casts defined', function () {
    $casts = $this->page->getCasts();

    expect($casts)->toHaveKey('created_at');
    expect($casts)->toHaveKey('updated_at');
    expect($casts)->toHaveKey('published_at');
    expect($casts)->toHaveKey('meta');
});

test('page has proper table name', function () {
    expect($this->page->getTable())->toBe('pages');
});

test('page has content relationship', function () {
    expect($this->page->content())->toBeInstanceOf(HasMany::class);
});

test('page can be published', function () {
    $this->page->update(['status' => 'published', 'published_at' => now()]);

    expect($this->page->fresh()->isPublished())->toBeTrue();
});

test('page can be draft', function () {
    $this->page->update(['status' => 'draft']);

    expect($this->page->fresh()->isDraft())->toBeTrue();
});

test('page can be searched by title', function () {
    $searchResult = Page::search('test')->get();

    expect($searchResult)->toHaveCount(1);
    expect($searchResult->first()->id)->toBe($this->page->id);
});

test('page can be filtered by status', function () {
    $publishedPage = Page::factory()->create(['status' => 'published']);
    $draftPage = Page::factory()->create(['status' => 'draft']);

    $publishedPages = Page::published()->get();
    $draftPages = Page::draft()->get();

    expect($publishedPages)->toHaveCount(1);
    expect($publishedPages->first()->id)->toBe($publishedPage->id);

    expect($draftPages)->toHaveCount(1);
    expect($draftPages->first()->id)->toBe($draftPage->id);
});

test('page can be filtered by template', function () {
    $templatePage = Page::factory()->create(['template' => 'default']);

    $templatePages = Page::byTemplate('default')->get();

    expect($templatePages)->toHaveCount(1);
    expect($templatePages->first()->id)->toBe($templatePage->id);
});

test('page has proper relationships', function () {
    expect($this->page->content())->toBeInstanceOf(HasMany::class);
});

test('page can get url', function () {
    $this->page->update(['slug' => 'test-page']);

    $url = $this->page->getUrlAttribute();

    expect($url)->toBe('/test-page');
});

test('page can check if is public', function () {
    $this->page->update(['status' => 'published', 'published_at' => now()]);

    expect($this->page->fresh()->isPublic())->toBeTrue();

    $this->page->update(['status' => 'draft']);

    expect($this->page->fresh()->isPublic())->toBeFalse();
});
