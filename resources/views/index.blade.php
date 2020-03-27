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

                @include('filemanager::header')

                <div id="body" class="flex flex-1 items-stretch flex-col-reverse md:flex-row ">
                    @include('filemanager::preview')
                    <div id="content" class="flex-auto bg-gray-100 overflow-y-scroll">
                        @include('filemanager::dropzone')
                        @include('filemanager::folders')
                        @include('filemanager::files')
                    </div>
                </div>

{{--                @include('filemanager::footer')--}}

        </div>

    </div>
    <script src="{{ asset(mix('app.js', 'vendor/filemanager')) }}"></script>
</body>
</html>
