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

    methods:{
        displayPreview(path){
            this.$http.get(`/filemanager/preview?path=${path}`).then(response => {
                this.onPreview = response.data;
            })
        }
    },

    computed:{
        isVideo(){
            return this.onPreview && this.onPreview.mimetype.includes('video');
        },
        isImage(){
            return this.onPreview && this.onPreview.mimetype.includes('image');
        }
    }
}
