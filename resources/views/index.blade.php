<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Manager</title>
    <link rel="stylesheet" href="{{ asset(mix('app.css', 'vendor/filemanager')) }}">
</head>
<body>
    <div class="h-screen bg-teal-700 md:p-10">

        <div id="filemanager" class="flex flex-col items-stretch h-full w-full md:rounded-lg md:shadow-xl">

            <div id="header" class="w-full h-12 px-4 flex items-center justify-between bg-gray-200 md:rounded-t border-b border-gray-400">
                <h1 class="font-semibold tracking-wide uppercase text-teal-700">File Manager</h1>
               <div class="flex">
                   <button @click="displayDropzone = !displayDropzone"
                           class="block px-4 py-1 rounded text-sm m-0 border-2 font-semibold text-teal-700 border-teal-700 focus:outline-none hover:bg-teal-700 hover:text-white">
                       Upload File
                   </button>
                   <button @click="createDirectory(`{{ $directory->path }}`)" class="ml-2 block px-4 py-1 rounded text-sm m-0 border-2 font-semibold text-teal-700 border-teal-700 focus:outline-none hover:bg-teal-700 hover:text-white">
                       Create Folder
                   </button>
               </div>
            </div>

            <div id="body" class="flex flex-1 items-stretch flex-col-reverse md:flex-row ">
                @include('filemanager::preview')
                <div id="content" class="flex-1 md:flex-none md:w-3/4 bg-gray-100 overflow-y-scroll">
                    @include('filemanager::dropzone')
                    @include('filemanager::folders')
                    @include('filemanager::files')
                </div>
            </div>

            <div id="footer" class="w-full h-10 px-5 flex items-center bg-gray-300 md:rounded-b text-gray-600 border-t border-gray-400">
                @include('filemanager::footer')
            </div>

        </div>

    </div>
    <script src="{{ asset(mix('app.js', 'vendor/filemanager')) }}"></script>
</body>
</html>
