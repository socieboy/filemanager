    <h3 class="bg-gray-700 p-4 py-2 flex items-center text-white text-sm font-semibold tracking-widest uppercase">Content</h3>
    <div class="flex flex-col ll">
        @if($directory->parentPath)
            <a href="/filemanager?path={{ $directory->parentPath }}" class="px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
                @include('filemanager::_svg.folder')
                <div class="ml-4">..</div>
            </a>
        @endif

        @foreach($directory->directories as $dir)
            <a href="/filemanager?path={{ $dir->path }}" class="px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
                @include('filemanager::_svg.folder')
                <div class="ml-4">{{ $dir->name }}</div>
            </a>
{{--            <a class="pb-2 w-24 h-24">--}}
{{--                <div class="p-1  rounded-lg relative justify-center flex item hover:bg-gray-300 ">--}}
{{--                    <div class="absolute text-xs h-full w-full flex items-center justify-center text-center flex-col">--}}
{{--                        {{ $directory->name }}--}}
{{--                    </div>--}}
{{--                    <svg class="w-full h-full" viewBox="0 0 40 40">--}}
{{--                        <path fill="#b6dcfe" d="M1.5 35.5L1.5 4.5 11.793 4.5 14.793 7.5 38.5 7.5 38.5 35.5z"/>--}}
{{--                        <path fill="#4788c7" d="M11.586,5l2.707,2.707L14.586,8H15h23v27H2V5H11.586 M12,4H1v32h38V7H15L12,4L12,4z"/>--}}
{{--                        <g>--}}
{{--                            <path fill="#dff0fe" d="M1.5 35.5L1.5 9.5 12.151 9.5 15.151 7.5 38.5 7.5 38.5 35.5z"/>--}}
{{--                            <path fill="#4788c7" d="M38,8v27H2V10h10h0.303l0.252-0.168L15.303,8H38 M39,7H15l-3,2H1v27h38V7L39,7z"/>--}}
{{--                        </g>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--            </a>--}}
        @endforeach
    </div>
