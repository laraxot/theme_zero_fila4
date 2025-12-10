<?php

declare(strict_types=1);

namespace App;

use Safe\Exceptions\FilesystemException;
use function Safe\realpath;

class Application extends \Illuminate\Foundation\Application
{
    public function publicPath($path = ''): string
    {
        $tmp = $this->basePath . '/../public_html/' . $path;
        $tmp = str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $tmp);
        
        try {
            return realpath($tmp);
        } catch (FilesystemException $e) {
            // Fallback to base path
            $basePublicPath = realpath($this->basePath . '/../public_html/');
            return $basePublicPath . '/' . $path;
        }
    }
}
