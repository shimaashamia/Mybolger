<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Comment;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table("articles")->get();
        return view("admin.index")->with('items',$items);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->validate([
        //     'title'=>'required|max:50',
        //     'body'=>'required|max:100',
        // ]);

        // DB::table("articles")->insert([
        //     'title' => $request['title'],
        //     'body' => $request['body'],
        // ]);

        // Session::flash("msg","تم النشر بنجاح");

        // return redirect(route("admin.create"));

        if ($request->isMethod('post')) {
    		$ar=new Article();
    		$ar->title=$request->input('title');
    		$ar->body=$request->input('body');
    		$ar->user_id=Auth::user()->id;
    		$ar->save();
            return redirect('admin');
            Session::flash("msg","تم النشر بنجاح");
        }
        return view('admin.create');
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
       
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("articles")->where("id",$id)->delete();
        session()->flash("msg","تم الحذف بنجاح");
        return redirect(route("admin.index"));
    }
}
