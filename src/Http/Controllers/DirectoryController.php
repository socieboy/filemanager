<?php

namespace Socieboy\FileManager\Http\Controllers;

use Illuminate\Validation\ValidationException;

class DirectoryController
{
    public function index()
    {
        $data = request()->validate(['path' => 'required']);
        return response([
            'directory' => filemanager()->directory($data['path'])
        ]);

    }

    public function store()
    {
        $data = request()->validate([
            'path' => 'required',
            'name' => 'required',
        ]);
        $newFolder = $data['path'] . '/' . $data['name'];
        if(filemanager()->filesystem()->exists($newFolder)){
            throw ValidationException::withMessages(['error' => 'The Directory already exists.']);
        }
        filemanager()->filesystem()->makeDirectory($newFolder);
        return response([
            'directory' => [
                'parentPath' => $data['path'],
                'name' => $data['name'],
                'path' => $newFolder
            ]
        ]);
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
