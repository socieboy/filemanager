window._ = require('lodash');

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
Vue.component('fm-breadcrumb', require('./components/Breadcrumb').default);
Vue.component('fm-dropzone', require('./components/Dropzone').default);
Vue.component('fm-dropdown', require('./components/Dropdown').default);
Vue.component('fm-folders', require('./components/Folders').default);
Vue.component('fm-preview', require('./components/Preview').default);
Vue.component('fm-files', require('./components/Files').default);

window.bus = new Vue();
window.app = new Vue({

    el: '#filemanager',

    data() {
        return {
            displayDropzone: false,
            viewDirectory: null,
        }
    },

    created() {
        this.initDirectory();

        bus.$on('open-directory', path => {
            this.openDirectory(path);
        })

        bus.$on('dropzone-success', response => {
            this.openDirectory(this.viewDirectory.path);
        })
    },

    methods: {

        initDirectory() {
            const urlParams = new URLSearchParams(window.location.search);
            var initPath = urlParams.has('path') ? urlParams.get('path') : '/';
            this.openDirectory(initPath);
        },

        openDirectory(path) {
            this.displayDropzone = false;
            this.$http.get(`/filemanager/directory?path=${path}`).then(response => {
                this.viewDirectory = response.data.directory
                history.pushState({}, this.viewDirectory.name, `/filemanager?path=${this.viewDirectory.path}`)
                bus.$emit('directory', this.viewDirectory)
            });
        },

        createDirectory() {
            var name = prompt('Directory Name:');
            if (name) {
                this.$http.post(`/filemanager/directory`, {
                    path: this.viewDirectory.path,
                    name: name
                }).then(response => {
                    this.viewDirectory.subdirectories.push(response.data.directory)
                }).catch(error => {
                    alert(error.response.data.message)
                })
            }
        }
    }
});
