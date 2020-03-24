<fm-dropzone inline-template v-if="displayDropzone">
    <form url="/filemamager" enctype="multipart/form-data" id="dropzone" class="dropzone">
        <div class="fallback">
            <input name="file" type="file" multiple />
        </div>
    </form>
</fm-dropzone>
