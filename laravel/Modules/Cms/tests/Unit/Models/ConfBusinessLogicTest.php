<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;
use Modules\Cms\Models\Conf;

describe('Conf Business Logic', function () {
    test('conf extends eloquent model', function () {
        expect(Conf::class)->toBeSubclassOf(Model::class);
    });

    test('conf uses sushi trait for in-memory data', function () {
        $traits = class_uses(Conf::class);

        expect($traits)->toHaveKey(Sushi::class);
    });

    test('conf has expected fillable fields', function () {
        $conf = new Conf();
        $expectedFillable = [
            'id',
            'name',
        ];

        expect($conf->getFillable())->toEqual($expectedFillable);
    });

    test('conf uses name as route key', function () {
        $conf = new Conf();

        expect($conf->getRouteKeyName())->toBe('name');
    });

    test('conf can get rows from tenant service', function () {
        $conf = new Conf();

        expect(method_exists($conf, 'getRows'))->toBeTrue();
        expect($conf->getRows())->toBeArray();
    });
});
