<?php

namespace Socieboy\FileManager\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'path' => '',
            'file' => 'required|file:max' . config('filemanager.max_upload_filesize')
        ];
    }
}
