<?php

namespace Socieboy\FileManager\Contracts;

use Illuminate\Filesystem\FilesystemAdapter;

class File
{
    public $path;
    public $name;
    protected $filesystem;
    protected $visibility;

    public function __construct(FilesystemAdapter $filesystem, $path)
    {
        $this->filesystem = $filesystem;
        $this->path = $path;
        $this->name = basename($path);
        $this->fetchVisibility();
    }

    public function withData()
    {
        $metadata = $this->filesystem->getMetadata($this->path);
        $metadata['mimetype'] = isset($metadata['mimetype']) ?: $this->filesystem->getMimetype($this->path);
        $data = [
            'url' => $this->getUrl(),
            'visibility' =>  $this->visibility,
        ];
        return array_merge($metadata, $data);
    }


    public function getUrl()
    {
        if ($this->isPrivate() && config('filesystems.default') != 'local') {
            return $this->filesystem->temporaryUrl($this->path, now()->addMinutes(5));
        }
        return $this->filesystem->url($this->path);
    }

    public function fetchVisibility()
    {
        $this->visibility = $this->filesystem->getVisibility($this->path);
        return $this;
    }

    public function isPublic()
    {
        return $this->visibility == 'public';
    }

    public function isPrivate()
    {
        return $this->visibility == 'private';
    }
}
