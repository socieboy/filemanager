<?php

namespace Socieboy\FileManager\Http\Controllers;

use Illuminate\Validation\ValidationException;

class DirectoryController
{
    public function store()
    {
        $data = request()->validate(['path' => 'required']);
        if(filemanager()->filesystem()->exists($data['path'])){
            throw ValidationException::withMessages(['error' => 'The Directory already exists.']);
        }
        filemanager()->filesystem()->makeDirectory($data['path']);
    }

    public function update()
    {
        $data = request()->validate([
            'path' => 'required',
            'name' => 'required'
        ]);
        $newPath = dirname($data['path']) . '/' . $data['name'];
        filemanager()->filesystem()->move($data['path'], $newPath);
    }

    public function destroy()
    {
        $data = request()->validate(['path' => 'required']);
        filemanager()->filesystem()->deleteDirectory($data['path']);
    }

}
