<?php

namespace Socieboy\FileManager;

use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;
use Socieboy\FileManager\Contracts\Directory;
use Socieboy\FileManager\Contracts\File;

class FileManager
{
    protected $filesystem;

    public $directories = [];

    public function __construct()
    {
        $this->filesystem = resolve('filesystem')->disk(config('filemanager.disk'));
    }

    public function uploadFile($path, UploadedFile $file)
    {
        return $this->filesystem->putFileAs($path, $file, $file->getClientOriginalName(), config('filemanager.visibility'));
    }

    public function directory($path)
    {
        if ($path != '/' && !$this->filesystem->exists($path)) {
            throw ValidationException::withMessages(['error' => "The directory \"{$path}\" does not exist."]);
        }
        return new Directory($this->filesystem, $path);
    }

    public function file($path)
    {
        return (new File($this->filesystem, $path))->withData();
    }

    public function filesystem()
    {
        return $this->filesystem;
    }
}
