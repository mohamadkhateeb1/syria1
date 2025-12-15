{{--
    هذا الكمبوننت خاص بإنشاء حقل إدخال في نموذج (form input field)
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
    @error($name) 
    is-invalid 
    @enderror"
    placeholder="{{ $placeholder }}" 
    value="{{old($name, $value)}}" >
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
</div>