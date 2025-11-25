@extends('layouts.dashboard')
@section('breadcrumb')
    <li class="breadcrumb-item active">Edit Category</li>
@endsection
@section('page_title')
    Edit Category
@endsection
@section('title', 'Edit Category')
@section('content')


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit <small>Form</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('categories.update', $Categories->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    @include('dashboard.pages.categories._forms')
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
@endsection
