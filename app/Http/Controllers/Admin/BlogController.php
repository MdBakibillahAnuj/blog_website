<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function addBlog()
    {
        return view('admin.blog.add', [
            'categories' => Category::where('status', 1)->get(),
        ]);
    }

    public function newBlog(Request $request)
    {
        Blog::createBlog($request);
        return redirect()->back()->with('message', 'Blog created successfully');
    }
    public function manageBlog(){
        return view('admin.blog.manage',[
            'blogs'  => Blog::all(),
        ]);
    }

    public function editBlog($id)
    {
        return view('admin.blog.edit', [
           'blog' => Blog::find($id),
            'categories' => Category::where('status',1)->get(),
        ]);
    }
    public function updateBlog(Request $request, $blogId)
    {
        Blog::updateBlog($request, $blogId);
        return redirect('/manage-blog')->with('message', 'Success');
    }
}
