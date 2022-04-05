<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected static $blog;

    protected static $image;
    protected static $imageName;
    protected static $imageDirectory;
    protected static $imageUrl;

    protected static function createBlog($request)
    {
        self::$image = $request->file('blog_image');
        self::$imageName = time().rand(10, 1000).'.'.self::$image->getCLientOriginalExtension();
        self::$imageDirectory = 'assets/image/blog/';
        self::$image->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl = self::$imageDirectory.self::$imageName;


        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->blog_title = $request->blog_title;
        self::$blog->blog_image = self::$imageUrl;
        self::$blog->blog_content = $request->blog_content;
        self::$blog->status = $request->status;
        self::$blog->save();
    }
    public static function updateBlog($request, $blogId)
    {
        self::$blog = Blog::find($blogId);
        self::$blog->category_id = $request->category_id;
        self::$blog->blog_title = $request->blog_title;
        self::$blog->blog_image = self::$imageUrl;
        self::$blog->blog_content = $request->blog_content;
        self::$blog->status = $request->status;
        self::$blog->save();
    }
    public function category()
    {
        Blog::updateBlog();
        return $this->belongsTo(Category::class);
    }
}
