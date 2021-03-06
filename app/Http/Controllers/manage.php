<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use DB;
class manage extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddArticle(Request $request)
    {
    	if ($request->isMethod('post')) {
    		$ar=new Article();
    		$ar->title=$request->input('title');
    		$ar->body=$request->input('body');
    		$ar->user_id=Auth::user()->id;
    		$ar->save();
    		return redirect('view');
    	}
        return view('manage.AddArticle');
    }

    public function view()
    {
        // $user_id=Article::find($id)->id;
        $articles=Article::all();
        // $Comments=Comment::orderBy('id','desc')->get();
    	$ar=Array('articles'=>$articles);
    	return view('manage.view',$ar);
    }

    public function read(Request $request,$id)
    {
    	if ($request->isMethod('post')) {
    		$ar=new Comment();
   		$ar->comment=$request->input('body');
   		//$ar->name=$request-> Auth::user()->name;
//            $ar->comment=$request->input('id');
    		$ar->article_id=$id;
//    		$ar->save();

            $options = array(
                'cluster' => 'ap2',
                'useTLS' => false
            );
            $pusher = new \Pusher\Pusher(
                'dc22364468bb6ca48c74',
                '7e1827d639be4875568a',
                '703946',
                $options
            );

            $data[$id] = Auth::user()->name;
            $pusher->trigger('text-channel', 'text-event', $data);

            $ar->save();
    		//return redirect('view');
    	}
      $articles=Article::find($id);
    	$ar=Array('articles'=>$articles);
      return view('manage.read',$ar);
    }

    // public function destroy($id)
    // {
    //     DB::table("comments")->where("id",$id)->delete();
    //     session()->flash("msg","تم الحذف بنجاح");
    //     return redirect(route("manage",$ar));
    // }
    public function destroy($id)
    {
        DB::table("comments")->where("id",$id)->delete();
            session()->flash("msg","تم الحذف بنجاح");
            $articles=Article::find($id);
    	$ar=Array('articles'=>$articles);
            return redirect(route('manage.read',$ar));
        //
        // $comment = Comment::find($id);
        // $comment->delete();
        // \Session::flash('msg','w:chalet Deleted Successfully');
        // return view('manage.read');

        // $comment = Comment::find($id);
        //      $comment->delete();
        //      return view('manage.read');
        //      $comment->save();
    }

}
