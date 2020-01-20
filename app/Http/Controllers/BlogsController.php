<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\Cache;
use App\Repositories\BlogRepository;

class BlogsController extends Controller

{
    protected $blog;

    public function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;

//        $this->middleware('auth', ['except'=>'show']);
    }


    public function index()
    {
        $blog=$this->blog->all();
//
        return response()->json($blog);
    }



    public function create(Request $request)
    {


        return view('blogs.create');
    }

    public function ShowFood(){

        $searchResults = Blog::category()->get();

        return view('welcome', compact('searchResults'));
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'category'=>'required',

        ]);

        try {
            $blog = new Blog;
            $blog->setTitleNameAttribute($request->input('title'));
            $blog->body = $request->input('body');
            $blog->category = $request->input('category');
            $blog->user_id =1;
            $blog->save();

            return response()->json($blog);


        }catch (\Exception $e) {
            return redirect()->back()->with('errors', 'There was an error trying to submit the post.Please try again');
        }
    }


    public function show($id)
    {

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
        $blog->title=$request->input('body');
        $blog->category=$request->input('category');
        $blog->update();

        return view('welcome')->with('success','Blog deleted successfully');
    }


    public function destroy(Request $request)
    {
       var_dump($request->input('id'));
        $blog=Blog::find($request->input('id'));
        $blog->delete();
        return view('welcome')->with('success','Blog deleted successfully');
    }
}
