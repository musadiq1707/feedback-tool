<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\CustomFormRequest;

class CategoryRequest extends CustomFormRequest
{
    public function rules()
    {
        if ($this->getMethod() == 'PATCH')
        {
            $id = $this->category->getAttribute('id');
            $name = 'unique:categories,name,' . $id . ',id,deleted_at,NULL';

        } else {
            $name = 'unique:categories';
        }
        return [
            'name' => 'required|'.$name,
        ];
    }
    public function messages()
    {
        return [

        ];
    }
}
