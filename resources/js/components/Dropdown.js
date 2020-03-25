module.exports = {

    data(){
        return {
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
        renameFolder(path){
            var name = prompt('New name:');
            if(name) {
                this.$http.patch(`/filemanager/directories`, {path: path, name: name}).then(response => {
                    location.reload()
                }).catch(error => {
                    alert(error.response.data.message)
                })
            }
        },

        removeFolder(path){
            var response = confirm('Confirm this action:');
            if(response) {
                this.$http.delete(`/filemanager/directories`, {data: { path: path }}).then(data => {
                    location.reload()
                }).catch(error => {
                    console.log(error.response.data.message)
                })
            }
        }
    }
}
