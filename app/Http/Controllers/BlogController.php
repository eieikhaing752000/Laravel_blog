<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

class BlogController extends Controller
{
    public function index() {
    return view('blogs.index',[
        'blogs'=>Blog::latest()
        ->filter(request(['search','category','username']))
        ->paginate(6)
        ->withQueryString()]);
    }

    public function show(Blog $blog){
    return view('blogs.show',[
        'blog'=>$blog,
        'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()]);
 }
    public function subscriptionHandler(Blog $blog){
        // dd($blog);
        if(auth()->user()->isSubscribed($blog)){
        // if(User::find(auth()->id)->isSubscribed($blog)){
            $blog->unSubscribe();
        }else{
            $blog->subscribe();
        }
        return back();
    }
    public function create()
    {
        return view('blogs.create');
    }
}