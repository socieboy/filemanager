<div id="breadcrumb">
    <a class="hover:text-blue-700" href="{{ empty($directory->path) ? '#' : '/filemanager' }}">
        Home
    </a>
    @foreach($directory->breadcrumb() as $item)
        <span>/</span>
        <a class="hover:text-blue-700" href="{{ $loop->last ? '#' : '/filemanager?path=' . $item->path }}">
            {{ $item->name }}
        </a>
    @endforeach
</div>
<div class="ml-auto">
    {{ $directory->directories->count() }} {{ str_plural('directory', $directory->directories->count()) }} @if($directory->files->count())and {{ $directory->files->count() }} {{ str_plural('file', $directory->files->count()) }} @endif on this path.
</div>
