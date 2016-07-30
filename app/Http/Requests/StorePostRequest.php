<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePostRequest extends Request
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
        $post = $this->route('post');
        return [
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:posts,id,'.$post->id,
            'description' => 'max:400',
            'publish_date' => 'date',
            'publish_time' => 'date_format:h:i A',
            'display_image' => 'exists:images,id',
            'html' => 'required'
        ];
    }
}
