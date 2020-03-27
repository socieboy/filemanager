<div id="footer" class="w-full h-10 px-5 flex items-center bg-gray-300 md:rounded-b text-gray-600 border-t border-gray-400">

    <div id="breadcrumb">

        <a class="hover:text-blue-700" href="{{ empty($directory->path) ? '#' : '/filemanager' }}">
            <a href="{{ url(config('filemanager.return_url')) }}">{{ url(config('filemanager.return_url')) }}</a>
        </a>

{{--        @foreach($directory->breadcrumb() as $item)--}}
{{--            <span>/</span>--}}
{{--            <a class="hover:text-blue-700" href="{{ $loop->last ? '#' : '/filemanager?path=' . $item->path }}">--}}
{{--                {{ $item->name }}--}}
{{--            </a>--}}
{{--        @endforeach--}}

    </div>

    <div class="ml-auto">
{{--        {{ $directory->directories->count() }} {{ str_plural('directory', $directory->directories->count()) }} @if($directory->files->count())and {{ $directory->files->count() }} {{ str_plural('file', $directory->files->count()) }} @endif on this path.--}}
    </div>

</div>
