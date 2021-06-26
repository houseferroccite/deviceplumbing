<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'code'=>'required|min:5|max:255|unique:products,code',
            'barcode'=>'required|min:13|max:16',
            'name'=>'required|min:4|max:255',
            'description'=>'required|min:5|max:255',
            'specification'=>'required|min:10|max:255',
            'availability'=>'required',
            'address'=>'required',
            'CountProduct'=>'required',
            'supplier_id'=>'required',
            'category_id'=>'required',
            'price'=>'required|numeric|min:1',
            'CountProduct'=>'required|numeric|min:0',
        ];
        if( $this->route()->named( 'products.update')){
            $rules['code'].= ',' . $this->route()->parameter('product')->id;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения.',
            'min' => 'Поле :attribute должно иметь минимум :min символа.',
            'unique' => 'Введенный :attribute уже существует, попробуйте другой!'
        ];
    }
}
