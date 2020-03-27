module.exports = {

    props:['directory'],

    data(){
        return {
            folder: this.directory,
            isOpen: false,
        }
    },


    created() {
        const handleEscape = (e) => {
            if (e.key === 'Esc' || e.key === 'Escape') {
                this.isOpen = false
            }
        }
        document.addEventListener('keydown', handleEscape)
        this.$once('hook:beforeDestroy', () => {
            document.removeEventListener('keydown', handleEscape)
        })
    },

    methods:{
        renameFolder(){
            var name = prompt('New name:');
            if(name) {
                this.$http.patch(`/filemanager/directory`, {path: this.directory.path, name: name}).then(response => {
                    this.folder.name = name;
                    this.isOpen = false;
                }).catch(error => {
                    alert(error.response.data.message)
                })
            }
        },

        removeFolder(){
            var response = confirm('Confirm this action:');
            if(response) {
                this.$http.delete(`/filemanager/directory`, {data: { path: this.directory.path }}).then(data => {
                    // location.reload()
                }).catch(error => {
                    console.log(error.response.data.message)
                })
            }
        }
    }
}
