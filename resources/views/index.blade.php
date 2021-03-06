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

        <div id="filemanager" class="flex flex-col items-stretch h-full w-full md:rounded-lg md:shadow-xl"v-if="viewDirectory">

            <fm-modal name="visibility">
                <template v-slot:title>Modal</template>
                My Body
                <template v-slot:footer>
                    <button class="bg-blue-600 text-white px-3 py-1 ml-auto rounded-md" >Button</button>
                </template>
            </fm-modal>

            <div id="header" class="w-full h-12 px-4 py-2 md:py-0 flex items-center justify-between bg-gray-200 md:rounded-t border-b border-gray-400">
                <h1 class="font-semibold tracking-wide uppercase text-teal-700">File Manager</h1>
                <div class="flex" v-if="viewDirectory">
                    <button @click="displayDropzone = !displayDropzone"
                            class="block px-4 py-1 rounded text-sm m-0 border-2 font-semibold text-teal-700 border-teal-700 focus:outline-none hover:bg-teal-700 hover:text-white">
                        Upload File
                    </button>
                    <button @click="createDirectory()" class="ml-2 block px-4 py-1 rounded text-sm m-0 border-2 font-semibold text-teal-700 border-teal-700 focus:outline-none hover:bg-teal-700 hover:text-white">
                        Create Folder
                    </button>
                </div>
            </div>

            <div id="body" class="flex flex-1 items-stretch flex-col-reverse md:flex-row">
               <fm-preview></fm-preview>
               <div id="content" class="flex-auto bg-gray-100 overflow-y-scroll">
                   <fm-dropzone :path="viewDirectory.path" v-if="displayDropzone"></fm-dropzone>
                   <fm-folders :directory="viewDirectory"></fm-folders>
                   <fm-files :directory="viewDirectory"></fm-files>
               </div>
           </div>

            <div id="footer" class="w-full h-10 px-5 flex items-center bg-gray-300 md:rounded-b text-gray-600 border-t border-gray-400">
                <fm-breadcrumb return-url="{{ url(config('filemanager.return_url')) }}" :path="viewDirectory.path"></fm-breadcrumb>
                <div class="ml-auto" v-text="`${viewDirectory.subdirectories.length} ${$pluralize('directory', viewDirectory.subdirectories.length)} and ${viewDirectory.files.length} ${$pluralize('file', viewDirectory.files.length)}.`"></div>
            </div>

        </div>

    </div>
    <script src="{{ asset(mix('app.js', 'vendor/filemanager')) }}"></script>
</body>
</html>
