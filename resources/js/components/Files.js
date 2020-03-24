module.exports = {

    props:['files'],

    methods: {
        select(path) {
            fmBroadcast.$emit('fm-select', path)
        }
    }
}
