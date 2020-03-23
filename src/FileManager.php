<?php

namespace Socieboy\FileManager;

use Socieboy\FileManager\Contracts\Directory;
use Socieboy\FileManager\Contracts\File;

class FileManager
{
    protected $filesystem;

    public $directories = [];

    public function __construct()
    {
        $this->filesystem = resolve('filesystem')->disk(config('filesystem.default'));
    }

    public function directory($path)
    {
        return new Directory($this->filesystem, $path);
    }

    public function file($path)
    {
        return (new File($this->filesystem, $path))->withData();
    }
}
