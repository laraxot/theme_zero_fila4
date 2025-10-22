<?php

declare(strict_types=1);

namespace Modules\Cms\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Cms\Http\Controllers\BaseController;

/**
 * Class XotPanelController.
 */
class XotPanelController extends BaseController
{
    /**
     * @param string $method
     * @param array  $arg
     */
    public function __call($method, $arg)
    {
        // dddx(['name' => $method, 'arg' => $arg]);
        /*
         * 0 => xotrequest
         * 1 => userPanel.
         */
        /*
         * $func = '\Modules\Xot\Jobs\PanelCrud\\'.Str::studly($method).'Job';
         *
         * $data = $arg[0];
         * if ($arg[0] instanceof Request) {
         * $data = $data->all();
         * }
         * $panel = $func::dispatchNow($data, $arg[1]);
         *
         * return $panel->out();
         */
        $act = '\Modules\Cms\Actions\Panel\\' . Str::studly($method) . 'Action';
        $data = $arg[0];
        if ($arg[0] instanceof Request) {
            $data = $data->all();
        }

        $panel = app($act)->execute($arg[1], $data);

        return $panel->out();
    }
}
