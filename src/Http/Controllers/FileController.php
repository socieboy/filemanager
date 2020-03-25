<?php

namespace Socieboy\FileManager\Http\Controllers;

class FileController
{
    public function copy()
    {
        $data = request()->validate([
            'origin' => 'required',
            'destination' => 'required'
        ]);
        do {
            $int = '-';
            $newPath = dirname($data['origin']) . '/copy' . $int . basename($data['origin']);
            $int++;
        } while (filemanager()->filesystem()->exists($newPath));

        filemanager()->filesystem()->copy($data['origin'], $newPath);
    }

    public function show()
    {
        return filemanager()->file(request('path'));
    }

    public function destroy()
    {
        $data = request()->validate(['path' => 'required']);
        filemanager()->filesystem()->delete($data['path']);
    }
}
