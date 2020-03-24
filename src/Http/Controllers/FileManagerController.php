<?php


namespace Socieboy\FileManager\Http\Controllers;


class FileManagerController
{
    public function index()
    {
        $directory = filemanager()->directory(request('path'));
        return view('filemanager::index', compact('directory'));
    }

    public function store()
    {

    }

    public function show()
    {
        return filemanager()->file(request('path'));
    }
}
