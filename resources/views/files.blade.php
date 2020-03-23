<fm-files :files="{{ json_encode($directory->files) }}" inline-template>
    <div class="flex flex-col">
            <button v-for="file in files" @click="select(file.path)" class="block px-4 py-2 border-b border-gray-400 flex items-center focus:outline-none hover:bg-gray-200">
                @include('filemanager::_svg.document')
                <div class="ml-4" v-text="file.name"></div>
            </button>
            {{--        <button class="block focus:outline-none p-2 w-24 h-24 hover:bg-gray-300 rounded-lg">--}}
            {{--            <img class="bg-gray-100 w-full h-full rounded-lg shadow-md border-1 border-gray-300 object-center object-cover"--}}
            {{--                 SameSite="Strict" src="https://source.unsplash.com/random/" alt="Preview">--}}
            {{--        </button>--}}
    </div>
</fm-files>
