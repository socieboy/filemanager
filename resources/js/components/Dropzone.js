module.exports = {

    props: ['path'],

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
                fmBroadcast.$emit('dropzone-success', serverResponse);
            });
            this.dropzone.on('sending', (file, xhr, formData) => {
                formData.append('path', this.path)
            });
            this.dropzone.on("error", (response, serverResponse) => {
                fmBroadcast.$emit('dropzone-error', {response, serverResponse});
            });
        }
    }
}
