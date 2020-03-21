<?php

namespace Socieboy\FileManager\Facades;

use Illuminate\Support\Facades\Facade;

class FileManager extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'filemanager';
    }
}
