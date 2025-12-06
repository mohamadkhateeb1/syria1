<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    //هذا التابع  قواعد التحقق من صحة البيانات المدخلة عند انشاء او تعديل التصنيف
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'description' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
    //هذا التابع  رسائل التحقق من صحة البيانات المدخلة عند انشاء او تعديل التصنيف
    public function messages()
    {
        return [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a string.',
            'name.max' => 'The category name may not be greater than 255 characters.',
            'name.min' => 'The category name must be at least 3 characters.',
            'description.required' => 'The category description is required.',
            'description.string' => 'The category description must be a string.',
            'parent_id.exists' => 'The selected parent category is invalid.',
        ];
    }
    //هذا لتغيير اسماء الحقول
    public function attributes()
    {
        return [
            'name' => 'الفئة',
            'description' => 'وصف الفئة',
            'parent_id' => 'الفئة الأصل',
        ];
    }
}
