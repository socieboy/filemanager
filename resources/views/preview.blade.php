<fm-preview inline-template>
    <div  v-if="onPreview" id="preview" class="text-sm  md:w-1/4 p-4 bg-gray-100 border-t md:border-0 md:border-r border-gray-400">

        <h3 class="mb-2 text-xs font-semibold tracking-wide uppercase flex justify-between">
            Preview
            <button class="bg-teal-600 px-3 py-1 rounded-lg text-white font-semibold focus:outline-none hover:bg-teal-700" @click="onPreview = null">Close</button>
        </h3>

        <div class="mb-4">

            <img v-if="isImage" class="bg-white w-full rounded-lg shadow-md max-h-full object-cover object-center border border-gray-400"
                 :src="onPreview.url" :alt="onPreview.filename">

            <div v-if="isVideo" class="bg-black rounded-lg">
                <video  id="video-player" class="w-full max-h-full rounded-lg video-js vjs-big-play-centered vjs-16-9" controls preload="auto" data-setup="{}">
                    <source :src="onPreview.url" :type='onPreview.mimetype'>
                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
            </div>

            <div v-if="isPDF" class="bg-black rounded-lg flex items-center">
                <iframe :src="onPreview.url" class="w-full h-40"></iframe>
            </div>

        </div>
        <div id="details" class="mb-4">
            <div class="font-semibold">Name: <span class="font-normal text-gray-600" v-text="onPreview.filename"></span></div>
            <div class="font-semibold">Size: <span class="font-normal text-gray-600" v-text="$prettyBytes(onPreview.size)"></span></div>
            <div class="font-semibold">Date: <span class="font-normal text-gray-600" v-text="onPreview.timestamp"></span></div>
            <div class="font-semibold">Mime: <span class="font-normal text-gray-600" v-text="onPreview.mimetype"></span></div>
            <div class="font-semibold">Visibility: <span class="font-normal text-gray-600" v-text="onPreview.visibility"></span></div>
            <div class="break-words font-semibold">URL: <a :href="onPreview.url" target="_blank" class="font-normal text-gray-600" v-text="onPreview.url"></a></div>
        </div>
        <div id="actions">
            <div id="group">
{{--                    <button @click="copy(onPreview.path)" class="mb-1 bg-blue-600 px-3 py-1 rounded text-white focus:outline-none hover:bg-blue-700">Copy</button>--}}
{{--                    <button class="mb-1 bg-blue-600 px-3 py-1 rounded text-white focus:outline-none hover:bg-blue-700">Move</button>--}}
                <button @click="remove(onPreview.path)" class="mb-1 bg-blue-600 px-3 py-1 rounded text-white focus:outline-none hover:bg-blue-700">Remove</button>
{{--                    <button class="mb-1 bg-blue-600 px-3 py-1 rounded text-white focus:outline-none hover:bg-blue-700">Share</button>--}}
{{--                    <button class="mb-1 bg-blue-600 px-3 py-1 rounded text-white focus:outline-none hover:bg-blue-700">Permissions</button>--}}
            </div>
        </div>
{{--        <button @click="paste(`{{ $directory->path }}`)" class="mb-1 bg-blue-600 px-3 py-1 rounded text-white focus:outline-none hover:bg-blue-700">Paste</button>--}}
    </div>
</fm-preview>
