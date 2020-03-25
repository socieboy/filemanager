// window._ = require('lodash');

window.Dropzone = require('dropzone')


import Vue from 'vue';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
Vue.prototype.$http = require('axios');
Vue.prototype.$http.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Vue.prototype.$csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
Vue.prototype.$prettyBytes = require('pretty-bytes');

// Components
Vue.component('fm-dropdown', require('./components/Dropdown'));
Vue.component('fm-dropzone', require('./components/Dropzone'));
Vue.component('fm-preview', require('./components/Preview'));
Vue.component('fm-files', require('./components/Files'));

window.fmBroadcast = new Vue();
window.fmApp = new Vue({

    el: '#filemanager',

    data(){
        return {
            displayDropzone: false,
        }
    },

    created(){
        this.$on('dropzone-success', this.displayDropzone = false);
    },

    methods:{
        createDirectory(path){
            var name = prompt('Directory Name:');
            if(name){
                this.$http.post(`/filemanager/directories`, {path:`${path}/${name}`}).then(response => {
                    location.reload()
                }).catch(error => {
                    alert(error.response.data.message)
                })
            }
        }
    }

});
