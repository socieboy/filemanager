<template>
    <div id="breadcrumb" class="flex w-full">
        <a :href="returnUrl">Home</a>
        <div v-for="link in links">
            <span class="ml-1">/</span>
            <a href="#" class="hover:text-blue-700" v-text="link"></a>
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

        watch: {
            path() {
                this.links = this.path.split("/").filter(item => {
                    return item.trim();
                });
            }
        }
    }
</script>
