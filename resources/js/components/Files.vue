<template>
    <div class="flex flex-col">
        <button v-for="file in directory.files" @click="open(file.path)" class="block px-4 py-2 border-b border-gray-400 flex items-center focus:outline-none hover:bg-gray-200">
            <fm-svg name="file"></fm-svg>
            <div class="ml-4" v-text="file.name"></div>
        </button>
    </div>
</template>
<script>
    export default {

        props: ['directory'],

        methods: {
            open(path) {
                bus.$emit('fm-select', path)
            }
        }
    }
</script>
