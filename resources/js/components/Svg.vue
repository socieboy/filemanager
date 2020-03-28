<template>
    <svg class="stroke-current text-blue-500 inline-block h-4 w-4" viewBox="0 0 20 20">
        <path fill="none":d="path"></path>
    </svg>
</template>
<script>

    import icons from './../icons.json';

    export default{

        props:['name'],

        computed: {
            path() {
                return icons[this.name];
            },
        },

    }
</script>
