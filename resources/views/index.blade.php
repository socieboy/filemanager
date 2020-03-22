<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Manager</title>
    <link rel="stylesheet" href="{{ asset('vendor/socieboy/css/filemanager.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/socieboy/css/filemanager.css') }}">
</head>
<body class="text-gray-700">
    <div class="h-screen bg-gray-100 md:p-10">
        <div id="main-container" class="flex flex-col items-stretch h-full w-full md:border md:rounded-lg md:shadow-lg">
            <div id="header" class="w-full h-10 px-5 flex items-center bg-gray-300 md:rounded-t border-b border-gray-400">
                File Manager
            </div>
            <div id="body" class="flex flex-1 items-stretch flex-col-reverse md:flex-row ">
                @include('filemanager::preview')
                <div id="content" class="flex-1 md:flex-none md:w-3/4 py-4 bg-gray-100 px-2 overflow-y-scroll">
                    @include('filemanager::folders')
                    @include('filemanager::files')
                </div>
            </div>
            <div id="footer" class="w-full h-10 px-5 flex items-center bg-gray-300 md:rounded-b text-gray-600 border-t border-gray-400">
                @include('filemanager::footer')
            </div>
        </div>
    </div>
</body>
</html>
