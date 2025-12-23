<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters;

use Filament\Clusters\Cluster;

class Appearance extends Cluster
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-squares-2x2';
}
