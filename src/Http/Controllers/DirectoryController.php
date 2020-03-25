<?php

namespace Socieboy\FileManager\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DirectoryController
{
    public function store()
    {
        $data = request()->validate(['path' => 'required']);
        if(Storage::exists($data['path'])){
            throw ValidationException::withMessages(['error' => 'The Directory already exists.']);
        }
        Storage::makeDirectory($data['path']);
    }

    public function update()
    {
        $data = request()->validate([
            'path' => 'required',
            'name' => 'required'
        ]);
        $newPath = dirname($data['path']) . '/' . $data['name'];
        Storage::move($data['path'], $newPath);
    }

    public function destroy()
    {
        $data = request()->validate(['path' => 'required']);
        Storage::deleteDirectory($data['path']);
    }

}
