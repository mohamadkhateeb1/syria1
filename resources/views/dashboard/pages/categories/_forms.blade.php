<div class="card-body">
    <x-form.input name="name" placeholder="Enter Name" label="name" :value="$Categories->name" />{{-- هنا بنستخدم الكمبوننت عشان نقلل التكرار  واستعملته لحقل الاسم --}}
    <x-form.input name="description" placeholder="Enter Description" label="Description"
        :value="$Categories->description" />{{-- هنا بنستخدم الكمبوننت عشان نقلل التكرار  واستعملته لحقل الوصف --}}
    <x-form.select name="parent_category" label="Choose Parent" :options="$ParentCategories->pluck('name', 'id')"
        :selected="$Categories->parent_id" />{{-- هنا بنستخدم الكمبوننت عشان نقلل التكرار  واستعملته لحقل التصنيف الاب --}}
    <x-form.select name="status" label="Status" :options="['active' => 'Active', 'inactive' => 'Inactive']" :selected="$Categories->status ?? 'Active'" />
</div>
