<fm-dropzone :path="viewDirectory.path" inline-template v-if="displayDropzone">
    <form url="/filemamager" enctype="multipart/form-data" id="dropzone" class="dropzone border-4 border-dashed border-blue-500 m-2 font-bold text-3xl text-blue-500">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
</fm-dropzone>
