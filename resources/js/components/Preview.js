module.exports = {

    data(){
        return {
            onPreview: null,
        }
    },

    created(){
        fmBroadcast.$on('fm-select', path => {
            this.displayPreview(path);
        })
    },

    methods: {
        displayPreview(path) {
            this.$http.get(`/filemanager/preview?path=${path}`).then(response => {
                this.onPreview = response.data;
            })
        },

        copy(path) {
        },

        paste(destination) {
            this.$http.post(`/filemanager/copy`, {
                origin: '',
                destination: destination
            }).then(response => {

            })
        },

        remove(path){
            var result = confirm('Do you want to delete this file?');
            if(result){
                this.$http.delete(`/filemanager/remove`, {data: { path: path }}).then(data => {
                    location.reload()
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    },

    computed:{
        isVideo(){
            return this.onPreview && this.onPreview.mimetype && this.onPreview.mimetype.includes('video');
        },

        isImage(){
            return this.onPreview && this.onPreview.mimetype && this.onPreview.mimetype.includes('image');
        },

        isText(){
            return this.onPreview && this.onPreview.mimetype && (this.onPreview.mimetype.includes('text/plain') || this.onPreview.mimetype.includes('officedocument'));
        },

        isPDF(){
            return this.onPreview && this.onPreview.mimetype && this.onPreview.mimetype.includes('application/pdf');
        },

        isUnknow(){
            return this.onPreview && (this.onPreview.mimetype == undefined);
        }
    }
}
