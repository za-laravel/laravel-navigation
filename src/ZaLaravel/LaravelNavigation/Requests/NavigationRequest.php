<?php

namespace ZaLaravel\LaravelNavigation\Requests;

use App\Http\Requests\Request;

/**
 * Class NavigationRequest
 * @package ZaLaravel\LaravelNavigation\Requests
 */
class NavigationRequest extends Request
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
            'name' => 'required',
            'link' => 'required',
            'sort_order' => 'required|numeric'
        ];
    }

}
