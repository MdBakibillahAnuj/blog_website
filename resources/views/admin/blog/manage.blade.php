@extends('admin.master')

@section('title')
    Manage Blog
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-success text-center">Manage Blog</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Blog Title</th>
                                    <th>Blog Image</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @php
                                        $category = \App\Models\Category::where('id', $blog->category_id)->first()->category_name;
                                        @endphp
                                        <td>{{ $category }}</td>
                                        <td>{{ $blog->blog_title }}</td>
                                        <td>
                                            <img src="{{ $blog->blog_image }}" alt="" style="height: 120px; width: 100px;">
                                        </td>
                                        <td>{!! $blog->blog_content !!}</td>
                                        <td>{{ $blog->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-{{ $blog->status == 1 ? 'warning' : 'info' }}">
                                                <i class="fa-solid fa-arrow-{{ $blog->status == 1 ? 'down' : 'up' }}"></i>
                                            </a>
                                            <a href="{{ route('edit-blog', ['id' => $blog->id, 'title' => str_replace(' ', '-', $blog->blog_title)]) }}" class="btn btn-sm btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
