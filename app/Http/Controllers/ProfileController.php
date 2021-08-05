<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('Profile')->findOrfail(Auth::user()->id);
        // dd($users);
        return view('profile.index')->with('users',$users);
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
        $users = User::with('Profile')->findOrfail($id);
        return view('profile.index')->with('users',$users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::with('Profile')->findOrfail($id);
        // dd($users);
        return view('profile.edit')->with('users',$users);
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
        $this->validate($request,[
            
            'avatar_original' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
          
           
        ]);
        $user = User::with('Profile')->findOrfail($id);
        // dd($profile);
        $user->name = $request->input('name');
        $user->contact = $request->input('contact');
        $destination_path = 'public/images';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $image->storeAs($destination_path,$image_name);
        $user->avatar_original = $image_name;
        $user->save();
        $profile = Profile::where('user_id',$id)->first();
        $profile->mobile_no = $request->input('phone');
        $profile->address = $request->input('addr');
        $profile->website_link = $request->input('web_link');
        $profile->instagram_link = $request->input('ig_link');
        $profile->twitter_link = $request->input('twitter_link');
       
        
        $profile->save();
        return redirect('/profile')->with('success','Profile updated Succesfully');

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
}
