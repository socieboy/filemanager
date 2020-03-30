<template>
    <div :id="name" class="overlay text-left z-10">
        <div class="modal fixed inset-0 m-auto flex flex-col  w-full md:w-1/2 bg-white rounded-lg shadow-2xl z-10 border border-gray-300" style="height: fit-content">
            <div class="py-2 px-4 border-b border-gray-300 flex justify-between bg-gray-100 rounded-t-lg">
                <h1 class="font-semibold tracking-wide uppercase text-teal-700">
                    <slot name="title"></slot>
                </h1>
                <a href="#" class="focus:outline-none">
                    <fm-svg name="close"></fm-svg>
                </a>
            </div>
            <div class="py-2 px-4 border-b border-gray-300 h-20 text-gray-700">
                <slot></slot>
            </div>
            <div class="flex py-2 px-4 bg-gray-100 rounded-b-lg text-gray-700">
                <slot name="footer"></slot>
            </div>
        </div>
    </div>
<!--    <div :id="name" class="visbility">-->
<!--        <button v-if="isOpen" @click="isOpen = false" tabindex="-1" class="fixed inset-0 h-full w-full bg-black opacity-25 cursor-default"></button>-->
<!--        <div class="fixed inset-0 m-auto flex flex-col  w-full md:w-1/2 bg-white rounded-lg shadow-2xl z-10 border border-gray-300" style="height: fit-content" v-if="isOpen">-->

<!--            <div class="py-2 px-4 border-b border-gray-300 flex justify-between bg-gray-100 rounded-t-lg">-->
<!--                <h1 class="font-semibold tracking-wide uppercase text-teal-700">-->
<!--                    <slot name="title"></slot>-->
<!--                </h1>-->
<!--                <button class="focus:outline-none" @click="isOpen = false">-->
<!--                    <fm-svg name="close"></fm-svg>-->
<!--                </button>-->
<!--            </div>-->

<!--            <div class="py-2 px-4 border-b border-gray-300 h-20 text-gray-700">-->
<!--                <slot></slot>-->
<!--            </div>-->

<!--            <div class="flex py-2 px-4 bg-gray-100 rounded-b-lg text-gray-700">-->
<!--                <slot name="footer"></slot>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</template>
<script>
    export default {
        props: ['name']
    }
</script>
<style>
    .overlay {
        visibility: hidden;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, .4);
        transition: opacity .3s;
        opacity: 0;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }
    .modal {
        position: relative;
    }
</style>
