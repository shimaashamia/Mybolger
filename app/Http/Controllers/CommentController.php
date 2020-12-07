<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles=Article::find($id)->id;
    	// $ar=Array('articles'=>$articles);
        $items = DB::table("comments")->get();
        return view("comments.index")->with('items',$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comments.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("comments")->where("id",$id)->delete();
        session()->flash("msg","تم الحذف بنجاح");
        return redirect(route("comments.index"));
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
      return view('comments.index',$ar);
    }

   
}
