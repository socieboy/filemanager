<template>
    <div class="flex flex-col">
        <button v-for="file in directory.files" @click="open(file.path)" class="block px-4 py-2 border-b border-gray-400 flex items-center focus:outline-none hover:bg-gray-200">
            <div class="">
                <svg class="stroke-current text-blue-500 inline-block h-4 w-4" viewBox="0 0 20 20">
                    <path fill="none" d="M17.206,5.45l0.271-0.27l-4.275-4.274l-0.27,0.269V0.9H3.263c-0.314,0-0.569,0.255-0.569,0.569v17.062 c0,0.314,0.255,0.568,0.569,0.568h13.649c0.313,0,0.569-0.254,0.569-0.568V5.45H17.206z M12.932,2.302L16.08,5.45h-3.148V2.302z M16.344,17.394c0,0.314-0.254,0.569-0.568,0.569H4.4c-0.314,0-0.568-0.255-0.568-0.569V2.606c0-0.314,0.254-0.568,0.568-0.568 h7.394v4.55h4.55V17.394z"></path>
                </svg>
            </div>
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
