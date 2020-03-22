<h3 class="px-2 mb-2 text-xs font-semibold tracking-wide uppercase">Files</h3>
<div class="flex flex-wrap w-full">
    @for($i =0; $i < 30; $i++)
        <a href="#" class="p-2 w-24 h-24 hover:bg-gray-300 rounded-lg">
            <img class="bg-gray-100 w-full h-full rounded-lg shadow-md border-1 border-gray-300 object-center object-cover"
                 SameSite="Strict" src="https://source.unsplash.com/random/{{ $i }}" alt="Preview">
        </a>
    @endfor
</div>
