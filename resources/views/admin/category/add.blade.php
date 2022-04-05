@extends('admin.master')

@section('title')
    Add Category
@endsection

@section('body')
    <div class="container">
       <div class="row">
           <div class="col-md-8 mx-auto">
               <div class="card bg-secondary">
                   <div class="card-header bg-dark">
                       <h3 class="text-success text-center">Add Category</h3>
                   </div>
                   <div class="card-body">
                       @if(Session::has('message'))
                           <h4 class="text-success">{{ Session::get('message') }}</h4>
                       @endif
                        <form action="{{ route('new-category') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="" class="col-md-3">Category Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="category_name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3">Category Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="category_image" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-md-3">Status</label>
                                <div class="col-md-8">
                                    <label for=""><input type="radio" checked name="status" value="1"/>Published</label>
                                    <label for=""><input type="radio" name="status" value="0"/>Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-block" value="Add Category"/>
                            </div>
                        </form>
                   </div>
               </div>
           </div>
       </div>
    </div>
@endsection
