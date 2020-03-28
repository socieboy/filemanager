<template>
    <div>
        <h3 class="bg-gray-700 p-4 py-2 flex items-center justify-between text-white text-sm font-semibold tracking-widest uppercase">
            Content
        </h3>
        <div class="flex flex-col">

            <a v-if="directory.parentPath" href="#" @click="openFolder(directory.parentPath)" class="px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
                <fm-svg name="folder"></fm-svg>
                <div class="ml-4">..</div>
            </a>

            <div v-for="folder in directory.subdirectories" class="flex justify-between items-center px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
                <a class="flex items-center w-full" href="#" @click="openFolder(folder.path)">
                    <fm-svg name="folder"></fm-svg>
                    <div class="ml-4" v-text="folder.name"></div>
                </a>
                <fm-dropdown :directory="folder"></fm-dropdown>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['directory'],

        methods: {
            openFolder(path) {
                bus.$emit('open-directory', path)
            }
        }
    }
</script>
