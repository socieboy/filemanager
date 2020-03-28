<template>
    <div>
        <h3 class="bg-gray-700 p-4 py-2 flex items-center justify-between text-white text-sm font-semibold tracking-widest uppercase">
            Content
        </h3>
        <div class="flex flex-col">

            <a v-if="directory.parentPath" href="#" @click="openFolder(directory.parentPath)" class="px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
                <svg class="stroke-current text-blue-500 inline-block h-4 w-4" viewBox="0 0 20 20">
                    <path fill="none" d="M18.208,2.958H8.875V1.792c0-0.644-0.522-1.167-1.167-1.167H1.875c-0.644,0-1.167,0.522-1.167,1.167v16.333 c0,0.645,0.522,1.166,1.167,1.166h16.333c0.645,0,1.167-0.521,1.167-1.166v-14C19.375,3.48,18.853,2.958,18.208,2.958z M18.208,17.542c0,0.322-0.261,0.583-0.583,0.583H2.458c-0.323,0-0.583-0.261-0.583-0.583V6.458h16.333V17.542z M17.625,5.292 H1.875V2.375c0-0.323,0.261-0.583,0.583-0.583h4.667c0.323,0,0.583,0.261,0.583,0.583v1.75h9.917c0.322,0,0.583,0.261,0.583,0.583 C18.208,5.031,17.947,5.292,17.625,5.292z"></path>
                </svg>
                <div class="ml-4">..</div>
            </a>

            <div v-for="folder in directory.subdirectories" class="flex justify-between items-center px-4 py-2 border-b border-gray-400 flex items-center hover:bg-gray-200">
                <a class="flex items-center w-full" href="#" @click="openFolder(folder.path)">
                    <svg class="stroke-current text-blue-500 inline-block h-4 w-4" viewBox="0 0 20 20">
                        <path fill="none" d="M18.208,2.958H8.875V1.792c0-0.644-0.522-1.167-1.167-1.167H1.875c-0.644,0-1.167,0.522-1.167,1.167v16.333 c0,0.645,0.522,1.166,1.167,1.166h16.333c0.645,0,1.167-0.521,1.167-1.166v-14C19.375,3.48,18.853,2.958,18.208,2.958z M18.208,17.542c0,0.322-0.261,0.583-0.583,0.583H2.458c-0.323,0-0.583-0.261-0.583-0.583V6.458h16.333V17.542z M17.625,5.292 H1.875V2.375c0-0.323,0.261-0.583,0.583-0.583h4.667c0.323,0,0.583,0.261,0.583,0.583v1.75h9.917c0.322,0,0.583,0.261,0.583,0.583 C18.208,5.031,17.947,5.292,17.625,5.292z"></path>
                    </svg>
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

        methods:{
            openFolder(path){
                bus.$emit('open-directory', path)
            }
        }
    }
</script>
