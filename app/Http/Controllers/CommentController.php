<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResourceComment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = ResourceComment::orderBy('id', 'DESC')->paginate(10);
        return view('admin.comments.comments_list', compact('comments'));
    }

    public function published($commentId)
    {
        $this->middleware('admin');

        $rs = ResourceComment::find($commentId);
        if($rs->status == 1){
            $rs->status = 0;
            $rs->save();
        }else{
            $rs->status = 1;
            $rs->save();   
        }

        return back();
    }

    public function delete($commentId)
    {
        $comment = ResourceComment::findOrFail($commentId);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment has been deleted successfully!');
    }
}
