<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Cache;

class BlogsController extends Controller
{

    public function index()
    {
        $blogs = Cache::remember('blogs', 10, function() {
            return Blog::all();
        });
        return view('welcome', compact('blogs'));
    }


    public function create()
    {
        return view('blogs.create');
    }


    public function store(Request $request)
    {
        $blog=new Blog;
        $blog->title= $request->input('title');
        $blog->body= $request->input('body');
        $blog->save();

        return redirect("/");
    }


    public function show($id)
    {
       //
    }


    public function edit(Request $request)
    {
        $blog=Blog::find($request->input('id'));
        return view('blogs.edit', compact('blog'));
    }


    public function update(Request $request)
    {
        $blog=Blog::find($request->input('id'));
        $blog->title= $request->input('title');
        $blog->body= $request->input('body');
        $blog->update();

        return view('welcome')->with('success','Blog deleted successfully');
    }


    public function destroy(Request $request)
    {
//        var_dump($request->input('id'));
        $blog=Blog::find($request->input('id'));
        $blog->delete();
        return view('welcome')->with('success','Blog deleted successfully');
    }
}
