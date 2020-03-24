<?php

namespace Socieboy\FileManager\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
        $key = Storage::putFileAs($request->path, $request->file, $request->file->getClientOriginalName(), config('filesystem.default'));
        return filemanager()->file($key);
    }

    public function show()
    {
        return filemanager()->file(request('path'));
    }
}
