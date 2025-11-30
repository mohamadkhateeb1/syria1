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
    <a href="/dashboard/categories/create" class="btn btn-primary">Create Category</a>
  </div>
</div>
  <x-flash-message>
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
                      <th colspan="2">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($Categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description }}</td>
                      <td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a></td>
                      <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
<x-flash-message/>
@endsection
