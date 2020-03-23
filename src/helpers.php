<?php

if(!function_exists('filemanager')) {
    /**
     * A short cut to access the file manager instance.
     *
     * @return \Socieboy\FileManager\FileManager
     */
    function filemanager()
    {
        return resolve('filemanager');
    }
}
