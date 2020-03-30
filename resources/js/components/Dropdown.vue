<template>
    <div class="relative">
        <button v-if="isOpen" @click="isOpen = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-black opacity-25 cursor-default"></button>
        <button  class="relative block h-8 w-8 overflow-hidden focus:outline-none focus:border-white" @click="isOpen = !isOpen">
            <svg class="stroke-current text-blue-500 inline-block h-4 w-4" viewBox="0 0 20 20">
                <path fill="none" d="M3.936,7.979c-1.116,0-2.021,0.905-2.021,2.021s0.905,2.021,2.021,2.021S5.957,11.116,5.957,10 S5.052,7.979,3.936,7.979z M3.936,11.011c-0.558,0-1.011-0.452-1.011-1.011s0.453-1.011,1.011-1.011S4.946,9.441,4.946,10 S4.494,11.011,3.936,11.011z M16.064,7.979c-1.116,0-2.021,0.905-2.021,2.021s0.905,2.021,2.021,2.021s2.021-0.905,2.021-2.021 S17.181,7.979,16.064,7.979z M16.064,11.011c-0.559,0-1.011-0.452-1.011-1.011s0.452-1.011,1.011-1.011S17.075,9.441,17.075,10 S16.623,11.011,16.064,11.011z M10,7.979c-1.116,0-2.021,0.905-2.021,2.021S8.884,12.021,10,12.021s2.021-0.905,2.021-2.021 S11.116,7.979,10,7.979z M10,11.011c-0.558,0-1.011-0.452-1.011-1.011S9.442,8.989,10,8.989S11.011,9.441,11.011,10 S10.558,11.011,10,11.011z"></path>
            </svg>
        </button>
        <div v-if="isOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-lg shadow-xl z-10" @click="isOpen = false">
            <a @click="renameFolder()" href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white">Rename</a>
            <a href="#visibility" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white">Visibility</a>
            <div class="border border-gray-200 my-1 mx-2"></div>
            <a @click="removeFolder()" href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-700 hover:text-white">Delete</a>
        </div>
    </div>
</template>
<script>
    export default {

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

            updateVisibility(){

            },

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
                        bus.$emit('open-directory', this.directory.path)
                    }).catch(error => {
                        console.log(error.response.data.message)
                    })
                }
            }
        }
    }
</script>
