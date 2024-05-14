<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Models\blog;
use App\Models\comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $data = blog::latest()->paginate(4);
        return view('frontend.index',compact(['data']));
    }

    public function single($id){
        $data1 = blog::find($id);
        return view('frontend.blog',compact(['data1']));
    }

    public function comment(Request $request){

        $request->validate([
            'comment' => 'required|max:5000',
        ]);

        $data2 = new comment();
        $data2->comment = $request->comment;
        $data2->blog_id = $request->blog_id;
        $data2->user_id = auth::user()->id;
        $data2->save();
        return redirect()->back();

    }
    public function comment_delete($id){
        $data3 = comment::find($id);
        $data3->delete();
        return redirect()->back()->with('massage','delete successfully');

    }
}
