@extends('layouts.dashboard')
@section('breadcrumb')
<li class="breadcrumb-item active">Create Category</li>
@endsection
@section('page_title')
Create Category
@endsection
@section('title', 'Create Category')
@section('content')
 <div class="row">
    
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create <small>Form</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{--  --}}
              <form action="{{ route('categories.store') }}" method="post">
                @csrf
                @include('dashboard.pages.categories._forms', ['Categories' => new \App\Models\Category()])
              
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
{{-- بهالطريقة بعدل ال  CSS --}}
@push('styles')
<style>
  .error{
    color: red;
    font-weight: bold;
  } 
  .alert{
    margin-top: 10px;
  }
</style>
@endpush