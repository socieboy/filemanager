<?php

namespace Socieboy\FileManager\Contracts;

use Illuminate\Filesystem\FilesystemAdapter;

class File
{
    public $path;
    public $name;
    protected $filesystem;

    public function __construct(FilesystemAdapter $filesystem, $path)
    {
        $this->filesystem = $filesystem;
        $this->path = $path;
        $this->name = basename($path);
    }

    public function withData()
    {
        $visibility = $this->visibility();
        return array_merge([
            'url' => ($visibility == 'private')  ? $this->filesystem->temporaryUrl($this->path, now()->addMinutes(5)) : $this->filesystem->url($this->path),
            'visibility' =>  $visibility,
        ], $this->filesystem->getMetadata($this->path));
    }

    public function visibility()
    {
        return $this->filesystem->getVisibility($this->path);
    }

    public function getUrl()
    {
        $url = ($visibility == 'public');
    }
}
