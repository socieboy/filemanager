<?php

namespace Socieboy\FileManager\Contracts;

use Illuminate\Filesystem\FilesystemAdapter;

class Directory
{
    public $path;
    public $name;
    protected $filesystem;
    public $parentPath;
    public $directories;
    public $files;

    public function __construct(FilesystemAdapter $filesystem, $path)
    {
        $this->filesystem = $filesystem;
        $this->path = $path;
        $this->name = basename($path);
        $this->parentPath = dirname($path);
        $this->directories();
        $this->files();
    }

    public function parentPath()
    {
        return '/';
    }

    public function directories()
    {
        $this->directories = collect($this->filesystem->directories($this->path))->map(function ($dir) {
            return (object)[
                'name' => basename($dir),
                'path' => $dir
            ];
        });
    }

    public function files()
    {
        $this->files = collect($this->filesystem->files($this->path))->map(function ($file) {
            return new File($this->filesystem, $file);
        });
    }

    public function breadcrumb()
    {
        $breadcrumb = collect();
        if(!empty($this->path)) {
            foreach (explode('/', $this->path) as $part) {
                $breadcrumb->push([
                    'name' => $part,
                    'path' => substr($this->path, 0, (strpos($this->path, $part) + strlen($part)))
                ]);
            }
        }
        return $breadcrumb->map(function($item){
            return (object) $item;
        });
    }

}
