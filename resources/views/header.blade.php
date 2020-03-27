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
