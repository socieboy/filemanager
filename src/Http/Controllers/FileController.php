<?php

namespace Socieboy\FileManager\Http\Controllers;

use Illuminate\Support\Facades\Storage;

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
        } while (Storage::exists($newPath));

        Storage::copy($data['origin'], $newPath);
    }

    public function show()
    {
        return filemanager()->file(request('path'));
    }

    public function destroy()
    {
        $data = request()->validate(['path' => 'required']);
        Storage::delete($data['path']);
    }
}
