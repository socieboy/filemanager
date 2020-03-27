    <h3 class="bg-gray-700 p-4 py-2 flex items-center text-white text-sm font-semibold tracking-widest uppercase">Content</h3>
    <div class="flex flex-col" v-if="viewDirectory">

        <a v-if="viewDirectory.parentPath" href="#" @click="openDirectory(viewDirectory.parentPath)" class="px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
            @include('filemanager::_svg.folder')
            <div class="ml-4">..</div>
        </a>

        <div v-for="directory in viewDirectory.subdirectories" class="flex justify-between items-center px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
            <a class="flex items-center w-full" href="#" @click="openDirectory(directory.path)">
                @include('filemanager::_svg.folder')
                <div class="ml-4" v-text="directory.name"></div>
            </a>
            <fm-dropdown :directory="directory" inline-template>
                <div class="relative">
                    <button v-if="isOpen" @click="isOpen = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-black opacity-25 cursor-default"></button>
                    <button  class="relative block h-8 w-8 overflow-hidden  focus:outline-none focus:border-white" @click="isOpen = !isOpen">
                        @include('filemanager::_svg.dots')
                    </button>
                    <div v-if="isOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10">
{{--                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white" href="">Open</a>--}}
{{--                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white" href="">Compress</a>--}}
{{--                        <div class="border border-gray-200 my-1 mx-2"></div>--}}
{{--                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white" href="">Copy</a>--}}
{{--                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white" href="">Move</a>--}}
                        <a @click="renameFolder()" href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white" href="">Rename</a>
                        <div class="border border-gray-200 my-1 mx-2"></div>
                        <a @click="removeFolder()" href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white" href="">Delete</a>
                    </div>
                </div>
            </fm-dropdown>
        </div>
    </div>
