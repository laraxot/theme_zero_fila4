<?php

declare(strict_types=1);

use Modules\Cms\Tests\TestCase;

uses(TestCase::class);

it('SKIP dynamic /it/pages/{slug}', function (): void {
    $this->markTestSkipped('Dynamic pages slug requires fixture.');
});
