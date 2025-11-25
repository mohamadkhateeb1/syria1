@props([
    'name', 
    'label', 
    'options'=>[],
     'selected' => null])
         <select class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
             
            <option value="">No Parent Category</option>
            @foreach ($options as $value  => $item)
                <option value="{{ $value }}" {{ $selected == old($name, $value) ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach

        </select>
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        