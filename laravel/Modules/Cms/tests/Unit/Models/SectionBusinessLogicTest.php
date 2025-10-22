<?php

declare(strict_types=1);

use Modules\Cms\Models\BaseModelLang;
use Modules\Tenant\Models\Traits\SushiToJsons;
use Modules\Cms\Models\Traits\HasBlocks;
use Modules\Cms\Models\Section;

describe('Section Business Logic', function () {
    test('section extends base model lang for multilingual support', function () {
        expect(Section::class)->toBeSubclassOf(BaseModelLang::class);
    });

    test('section has translatable fields configured', function () {
        $section = new Section();

        expect($section->translatable)->toEqual([
            'name',
            'blocks',
        ]);
    });

    test('section has expected fillable fields', function () {
        $section = new Section();
        $expectedFillable = [
            'name',
            'slug',
            'blocks',
        ];

        expect($section->getFillable())->toEqual($expectedFillable);
    });

    test('section has sushi to json trait', function () {
        $traits = class_uses(Section::class);

        expect($traits)->toHaveKey(SushiToJsons::class);
    });

    test('section has has blocks trait', function () {
        $traits = class_uses(Section::class);

        expect($traits)->toHaveKey(HasBlocks::class);
    });

    test('section has correct casts for multilingual and structured data', function () {
        $section = new Section();
        $casts = $section->getCasts();

        expect($casts['name'])->toBe('array');
        expect($casts['blocks'])->toBe('array');
        expect($casts['id'])->toBe('string');
    });

    test('section has schema definition for structured data', function () {
        $section = new Section();

        expect($section)->toHaveProperty('schema');
        expect($section->schema['name'])->toBe('json');
        expect($section->schema['blocks'])->toBe('json');
        expect($section->schema['slug'])->toBe('string');
    });

    test('section can get rows for sushi functionality', function () {
        $section = new Section();

        expect(method_exists($section, 'getRows'))->toBeTrue();
        expect($section->getRows())->toBeArray();
    });
});
