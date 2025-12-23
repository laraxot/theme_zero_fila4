<?php

declare(strict_types=1);

use Modules\Chart\Models\Chart;

describe('Chart Factory', function () {
    it('creates chart with factory', function () {
        $chart = Chart::factory()->create();
        
        expect($chart)->toBeChart()
            ->and($chart->exists)->toBeTrue()
            ->and($chart->id)->toBeInt()
            ->and($chart->post_id)->toBeInt()
            ->and($chart->post_type)->toBeString()
            ->and($chart->type)->toBeString()
            ->and($chart->width)->toBeInt()
            ->and($chart->height)->toBeInt();
    });

    it('creates chart with custom attributes', function () {
        $attributes = [
            'type' => 'bar',
            'width' => 800,
            'height' => 600,
            'color' => '#ff0000',
        ];
        
        $chart = Chart::factory()->create($attributes);
        
        expect($chart->type)->toBe('bar')
            ->and($chart->width)->toBe(800)
            ->and($chart->height)->toBe(600)
            ->and($chart->color)->toBe('#ff0000');
    });

    it('makes chart without persisting', function () {
        $chart = Chart::factory()->make();
        
        expect($chart)->toBeChart()
            ->and($chart->exists)->toBeFalse();
    });

    it('creates multiple charts', function () {
        $charts = Chart::factory()->count(3)->create();
        
        expect($charts)->toHaveCount(3)
            ->and($charts->first())->toBeChart()
            ->and($charts->last())->toBeChart();
    });

    it('creates chart with colors array', function () {
        $colors = ['#ff0000', '#00ff00', '#0000ff'];
        $chart = Chart::factory()->create(['colors' => $colors]);
        
        expect($chart->colors)->toBe($colors)
            ->and($chart->colors)->toBeArray();
    });
});