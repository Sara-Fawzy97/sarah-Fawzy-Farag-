<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'name_en'=>['required','string','min:2','max:255'],
            // 'name_ar'=>['required','string','min:2','max:255'],
            // 'code'=>['required','integer','digits:5','unique:products'],
            // 'price'=>['required','numeric','between:1,99999999.99'],
            // 'quantity'=>['nullable','integer','min:1','max:255'],
            // 'status'=>['nullable','integer','in:0,1'],
            // 'details_en'=>['required','string'],
            // 'details_ar'=>['required','string'],
            // 'subcategory_id'=>['required','integer','exists:subcategories,id'],
            // 'brand_id'=>['nullable','integer','exists:brands,id'],
            // 'image'=>['required','mimes:png,jpg,jpeg','max:1000'],
        ];
    }
}
