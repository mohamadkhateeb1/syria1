{{-- 
    هذا الكمبوننت خاص بإنشاء حقول الإدخال في النماذج
    بنستخدمه عشان نقلل التكرار في الكود
    يعني بدل ما نكتب كود الحقل في كل نموذج بنستخدم الكمبوننت ده
    وبكده نكون قللنا التكرار وسهلنا عملية إدارة النماذج في التطبيق
        <x-form.input name="name" placeholder="Enter Name" label="name" :value="$Categories->name" />
وعن طريق هي التعليمة بغضر مرر الحقل داخل الكومبوننت
--}}
@props([
    // هنا بنحدد الخصائص اللي ممكن نستقبلها في الكمبوننت
    'name',
    'placeholder',
    'value',
    'label',
    'type' => 'text',
])
@if($label)
<label for="">{{ $label }}</label>
@endif
<div class="form-group">
    {{-- هنا بنحدد الخصائص اللي ممكن نستقبلها في الكمبوننت --}}
    <input type="{{ $type }}" name="{{ $name }}" class="form-control 
    {{--  is-invalid بحال وجدنا خطا نذهب الى كلاس ال  --}}
    @error($name) 
    is-invalid 
    @enderror"
    placeholder="{{ $placeholder }}" 
    value="{{old($name, $value)}}" >
{{-- هنا نقوم بعرض الخطأ ان وجد تحت كل حقل --}}
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
</div>