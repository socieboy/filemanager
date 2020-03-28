<template>
    <div id="breadcrumb" class="flex w-full">
        <a :href="returnUrl">Home</a>
        <div v-for="link in links">
            <span class="ml-1">/</span>
            <a :href="link.path" class="hover:text-blue-700" v-text="link.name"></a>
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
            parseLinks() {
                this.links = _.map(this.path.split("/").filter(item => {
                    return item.trim();
                }), item => {
                    return {
                        'name': item,
                        'path': '#',
                    }
                })
            }
        },

        watch: {
            path() {
                this.parseLinks();
            }
        }
    }
</script>
