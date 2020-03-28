<?php

namespace Socieboy\FileManager\Contracts;

use Illuminate\Filesystem\FilesystemAdapter;

class File
{
    /**
     * @var FilesystemAdapter
     */
    protected $filesystem;

    /**
     * Visibility of the file.
     */
    protected $visibility;


    /**
     * The file path.
     */
    public $path;

    /**
     * Name of the file.
     */
    public $name;

    /**
     * Extension of the file.
     */
    public $extension;

    /**
     * File constructor.
     *
     * @param FilesystemAdapter $filesystem
     * @param $path
     */
    public function __construct(FilesystemAdapter $filesystem, $path)
    {
        $this->filesystem = $filesystem;
        $this->path = $path;
        $this->name = basename($path);
        $this->fetchVisibility();
        $this->extension = pathinfo($this->name)['extension'];
    }

    /**
     * Return the file with the metada information.
     *
     * @return array
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function withData()
    {
        $metadata = $this->filesystem->getMetadata($this->path);
        $metadata['mimetype'] = isset($metadata['mimetype']) ? $metadata['mimetype']: $this->filesystem->getMimetype($this->path);
        $data = [
            'filename' => $this->name,
            'url' => $this->getUrl(),
            'visibility' =>  $this->visibility,
        ];
        return array_merge($metadata, $data);
    }

    /**
     * Return the url for the file depending if is private of public.
     *
     * @return string
     */
    protected function getUrl()
    {
        if ($this->isPrivate() && config('filemanager.disk') != 'public') {
            return $this->filesystem->temporaryUrl($this->path, now()->addMinutes(config('filemanager.temporary_url_expired_time')));
        }
        return $this->filesystem->url($this->path);
    }

    /**
     * Load the visibility of the file.
     *
     * @return $this
     */
    protected function fetchVisibility()
    {
        $this->visibility = $this->filesystem->getVisibility($this->path);
        return $this;
    }

    /**
     * Return if the file is public.
     *
     * @return bool
     */
    protected function isPublic()
    {
        return $this->visibility == 'public';
    }

    /**
     * Return if the file is private.
     *
     * @return bool
     */
    protected function isPrivate()
    {
        return $this->visibility == 'private';
    }
}
