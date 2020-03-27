module.exports = {

    props:['directory'],

    methods: {
        open(path) {
            bus.$emit('fm-select', path)
        }
    }
}
