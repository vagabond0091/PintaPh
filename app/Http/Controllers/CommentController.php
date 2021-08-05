<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artwork;
use App\Models\Comment;
use Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $artwork_id = $request->input('artwork');
        $comments = new Comment;
        $comments->Comments = $request->input('comments');
        $comments->artwork_id = $artwork_id;
        $comments->user_id = Auth::user()->id;
        $comments->save();
        return redirect('/artwork/'.$artwork_id);
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json($comment);
    }
    public function updateComment(Request $request,$id){
        $comment = Comment::find($id);
        $comment->Comments = $request->comment;
        // $comment->artwork_id = $request->artwork_id;
        // $comment->user_id = $request->user_id;
        $comment->save();
        return response()->json($comment);
    }
}
