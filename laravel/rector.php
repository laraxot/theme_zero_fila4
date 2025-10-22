<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Core\Configuration\Option;
use RectorLaravel\Set\LaravelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use RectorLaravel\Rector\MethodCall\RedirectRouteToToRouteHelperRector;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {
   // $rectorConfig->set(Option::PARALLEL, true);
   // $rectorConfig->set(Option::PARALLEL_MAX_NUMBER_OF_PROCESSES, 4);

    $rectorConfig->paths([
        __DIR__.'/Modules',
        __DIR__.'/Themes',
    ]);
    $rectorConfig->skip([
        __DIR__.'/Modules/*/docs',
        __DIR__.'/Modules/*/docs/*',
        __DIR__.'/*/vendor',
        __DIR__.'/*/build',
        __DIR__.'/*/node_modules',
        '*/vendor',
        '*/build',
    ]);

    // register a single rule
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
    $rectorConfig->rule(TypedPropertyFromStrictConstructorRector::class);

    // define sets of rules
    $rectorConfig->sets([
        PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
        //SetList::DEAD_CODE,
        //SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_81,
        LaravelSetList::LARAVEL_100,

        // SetList::NAMING, //problemi con injuction
        SetList::TYPE_DECLARATION,
        // SetList::CODING_STYLE,
        // SetList::PRIVATIZATION,//problemi con final
        // SetList::EARLY_RETURN,
        // SetList::INSTANCEOF,
    ]);

    $rectorConfig->importNames();
};
