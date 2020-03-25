<?php

namespace Socieboy\FileManager\Http\Controllers;

use Socieboy\FileManager\Http\Request\UploadFileRequest;

class FileManagerController
{
    public function index()
    {
        $directory = filemanager()->directory(request('path'));
        return view('filemanager::index', compact('directory'));
    }

    public function store(UploadFileRequest $request)
    {
        $key = filemanager()->uploadFile($request->path, $request->file);
        return filemanager()->file($key);
    }
}
