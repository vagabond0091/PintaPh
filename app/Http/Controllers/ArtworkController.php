<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artwork;
use App\Models\Comment;
use App\Models\Like;
use Auth;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artworks = Artwork::with('user')->get();
       
        return view('welcome')->with('artworks',$artworks);
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
        $artwork =  new Artwork;
        $artwork->title = $request->input('title');
        $artwork->user_id = Auth::user()->id;
        $destination_path = 'public/images';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);
        $artwork->artwork_image = $image_name;  
        $artwork->save();
        return redirect('/')->with('success','Artwork Succefully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth::check()){
            $artwork_datas = Artwork::with('User')->take(9)->get();
            $artwork = Artwork::with('User')->find($id);
            $comments = Comment::with('Artwork','User')->where('artwork_id',$id)->get();
            $number_of_comments = Comment::where('artwork_id',$id)->count();
            $number_of_likes = Like::where('artwork_id',$id)->count();
            $likes = Like::with('User')->distinct()->where('user_id',Auth::user()->id)->get();
           
            return view('artwork.overview')->with('artwork',$artwork)
            ->with('artwork_datas',$artwork_datas)
            ->with('comments',$comments)
            ->with('number_of_comments',$number_of_comments)
            ->with('number_of_likes',$number_of_likes)
            ->with('likes',$likes);
        }
        else{
            $artworks = Artwork::with('user')->get();
       
        return view('welcome')->with('artworks',$artworks);
        }
      
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
        $artwork = Artwork::with('User')->find($id); 
        $artwork->title = $request->input('title');
        $artwork->user_id = Auth::user()->id;
        $destination_path = 'public/images';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);
        $artwork->artwork_image = $image_name;  
        $artwork->save();
        return redirect('/artwork/'.$artwork->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function viewSearch(Request $request,$name){
        $searches =  Artwork::with('User')->where('title','LIKE','%'.$name.'%')->get();
      
        return view('inc.search')->with('searches',$searches)->with('title',$name);
    }
    public function search($title){
        $search =  Artwork::with('User')->where('title','LIKE','%'.$title.'%')->get();

        return response()->json($search);
    }
}
