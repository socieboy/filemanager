<?php

namespace Socieboy\FileManager\Contracts;

use Illuminate\Filesystem\FilesystemAdapter;

class Directory
{
    /**
     * @var FilesystemAdapter
     */
    protected $filesystem;

    /**
     * The directory path.
     */
    public $path;

    /**
     * Name of the directory.
     */
    public $name;

    /**
     * Parent path of the current directory.
     */
    public $parentPath;

    /**
     * Subdirectories in the current directory.
     */
    public $subdirectories;

    /**
     * Files in the current directory.
     */
    public $files;

    /**
     * Directory constructor.
     *
     * @param FilesystemAdapter $filesystem
     * @param $path
     */
    public function __construct(FilesystemAdapter $filesystem, $path)
    {
        $this->filesystem = $filesystem;
        $this->path = $path;
        $this->name = ($path == '/') ? 'root' : basename($path);
        $this->parentPath = ($path == '/') ? null : dirname($path);
        $this->files();
        $this->subdirectories();
    }

    /**
     * Load all subdirectories.
     */
    public function subdirectories()
    {
        $this->subdirectories = collect($this->filesystem->directories($this->path))->map(function ($dir) {
            return (object) [
                'parentPath' => $this->path,
                'name' => basename($dir),
                'path' => ($dir == '/') ? '/' : ('/'.$dir),
            ];
        });
    }

    /**
     * Load all files.
     */
    public function files()
    {
        $this->files = collect($this->filesystem->files($this->path))->map(function ($file) {
            return new File($this->filesystem, $file);
        })->reject(function ($file) {
            return in_array($file->extension, config('filemanager.ignore_extensions'));
        });
    }
}
