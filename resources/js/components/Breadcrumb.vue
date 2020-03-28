<template>
    <div id="breadcrumb" class="flex">
        <div>
            <a :href="returnUrl">Home</a>
        </div>
        <div>
            <a @click="openFolder('/')" href="#" class="hover:text-blue-700">
                <span class="ml-1">/</span>
                Root
            </a>
        </div>
        <div v-for="link in links">
            <span class="ml-1">/</span>
            <a href="#" @click="openFolder(link.path)" class="hover:text-blue-700" v-text="link.name"></a>
        </div>
    </div>
</template>
<script>
    export default {

        props: ['returnUrl', 'path'],

        data() {
            return {
                links: []
            }
        },

        created(){
            this.parseLinks()
        },

        methods: {

            linksParts(){
                return this.path.split("/").filter(item => {
                    return item.trim();
                })
            },

            parseLinks() {
                this.links = _.map(this.linksParts(), (item, index) => {
                    return {
                        index: index,
                        name: item,
                        path: this.resolvePath(item, index),
                    }
                })
            },

            resolvePath(item, index) {
                var path = '';
                var parts = this.linksParts();
                for (var i in parts) {
                    if (i <= index) {
                        path += '/' + parts[i]
                    }
                }
                return path;
            },

            openFolder(path) {
                bus.$emit('open-directory', path)
            }
        },

        watch: {
            path() {
                this.parseLinks();
            }
        }
    }
</script>
