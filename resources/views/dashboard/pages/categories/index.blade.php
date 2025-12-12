@extends('layouts.dashboard')
@section('page_title')
    Categories
@endsection
@section('title', 'Categories')
@section('breadcrumb')
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')
    <div class="row mb-2">
        <div class="col text-right">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Create Category</a>
        </div>
    </div>
    {{-- Search Form --}}
    <form action="{{ URL::current() }}" method="GET" class="row g-3 align-items-end m-2 mt-3">
        <div class="col-md-4">
            <x-form.input name="name" placeholder="Enter Name" label="name" :value="request('name')" />
        </div>
        <div class="col-md-3 mb-3 ">
            <x-form.select name="status" placeholder="Enter Status" label="status" :options="['' => 'All', 'inactive' => 'Inactive', 'active' => 'Active']" :selected="request('status')" />
        </div>
        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="submit" class="btn btn-secondary" id="reset-button">Reset</button>
        </div>
    </form>
    {{-- End Search Form --}}
    {{-- Flash Message --}}
    <x-flash-message />
    {{-- End Flash Message --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td><a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-info">Edit</a></td>
                                    <td>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $Categories->links() }} --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
{{-- سكريبت لزر ال reset --}}
@push('script')
    <script>
        document.getElementById('reset-button').addEventListener('click',function(){
            const form =this.closest('form');
            form.querySelectorAll('input[type="text"]').forEach(input=>{
                input.value='';
            });
                form.querySelectorAll('select').forEach(select=> select.selectedIndex=0);
                    select.value='';
                    form.submit();
        });
    </script>
@endpush