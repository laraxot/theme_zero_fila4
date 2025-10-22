<?php

declare(strict_types=1);

/**
 * @see https://github.com/paulvl/backup/blob/master/src/Console/Commands/MysqlDump.php
 */

namespace Modules\Xot\Console\Commands;

use Modules\Xot\Actions\Filament\GenerateTableColumnsByFileAction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;
use Webmozart\Assert\Assert;

class GenerateTableColumnsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xot:generate-table-columns {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'refresh table columns';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Assert::string($module_name = $this->argument('module'), '[' . __LINE__ . '][' . class_basename($this) . ']');
        $module_path = Module::getModulePath($module_name);
        if (!Str::endsWith($module_path, '/')) {
            $module_path .= '/';
        }
        $filament_resources_path = $module_path . 'Filament/Resources';

        $this->info($module_name); // = Progressioni
        $this->info($module_path); // = /var/www/html/ptvx/laravel/Modules/Progressioni/
        $this->info($filament_resources_path);

        $files = File::files($filament_resources_path);
        foreach ($files as $file) {
            app(GenerateTableColumnsByFileAction::class)->execute($file);
        }
    }
}
