module.exports = {
    data() {
        return {
            dropzone: null,
        }
    },

    mounted() {
        this.initializeDropbox();
    },

    methods: {

        initializeDropbox() {
            Dropzone.autoDiscover = false;
            this.dropzone = new Dropzone('#dropzone', {
                url: '/filemanager',
                headers: {
                    'X-CSRF-TOKEN': this.$csrfToken
                }
            });
            this.dropzone.on("success", (response, serverResponse) => {
                this.$emit('dropzone-success', serverResponse);
            });
            this.dropzone.on('sending', (file, xhr, formData) => {
                //formData.append('key', value)
            });
            this.dropzone.on("error", (response, serverResponse) => {
                this.$emit('dropzone-error', {response, serverResponse});
            });
        }
    }
}
