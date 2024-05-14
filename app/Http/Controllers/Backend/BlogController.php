<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
   public function dashboard(){
    return view('backend.welcome');
   }

   public function create(){
    return view('backend.blog.add_blog');
   }
   public function store(Request $request){
    $data = new Blog();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/image/'), $image_name);
        $image_url = '/image/' . $image_name;
    }
    $user_id = auth::user()->id;

    $data->title = $request->title;
    $data->dis = $request->dis;
    $data->image = $image_url;
    $data->user_id = $user_id;
    $data->save();
    return redirect()->back()->with('massage','upload successfully');

   }

   public function show(){
    $data1 = Blog::where('user_id','=',auth::user()->id)->latest()->get();
    return view('backend.blog.all_blog', compact(['data1']));
   }

   public function edit($id){
    $data2 = Blog::find($id);
    return view('backend.blog.edit_blog',compact(['data2']));

   }

   public function update(Request $request, $id){
    $data3 = blog::find($id);
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/image/'), $image_name);
        $image_url = '/image/' . $image_name;
    }
    $user_id = auth::user()->id;
    $data3->title = $request->title;
    $data3->dis = $request->dis;

    if ($request->hasFile('image')) {
    $data3->image = $image_url ??null;
    }

    $data3->user_id = $user_id;
    $data3->save();
    return redirect()->back()->with('massage','update successfully');
   }

   public function delete($id){
    $data4 = blog::find($id);
    $data4->delete();
    return redirect()->back()->with('massage','delete successfully');

   }

   public function logout(){
    Auth::logout();
    return redirect('/login');
   }
}
