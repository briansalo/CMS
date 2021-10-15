<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Requestfriend;
use App\Friend;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('users.user_index')->with('users', $users);

    }

    public function show($id)
    {
          $user= User::where('id', $id)->get();
         $data = Post::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('users.user_show')->with('data', $data)->with('user', $user);

    }

    public function make_admin($id)
    {
    	$edit = User::find($id);
    	$edit->role = 'admin';
    	$edit->save(); 

    	session()->flash('success','Users Make Admin Successfully');

    	return redirect('/users');
    }

    public function make_user($id)
    {
      $edit = User::find($id);
      $edit->role = 'user';
      $edit->save(); 

      session()->flash('success','Users Make user Successfully');

      return redirect('/users');
    }

    public function edit()
	{
        $users = auth()->user();
        return view('users.user_edit')->with('users', $users);
    }


    public function update(Request $request)
    {

	 	  $this->validate($request, [
	            'name' =>'required',
	            'about' =>'required',
              'image' =>'required|mimes:jpeg,png,jpg|max:10000',          
	        ]);

          if($request->hasFile('image')){

    		$users = auth()->user();
    		$users->name = $request->name;
    		$users->about =  $request->about;
            storage::delete($users->image);
            $users->image = $request->image->store('users');
    		$users->save();


    		session()->flash('success', 'Profile Updated sucessfully');
    		return redirect('/posts');
            
            }
           else{
            $users = auth()->user();
            $users->name = $request->name;
            $users->about =  $request->about;
            $users->save();

             session()->flash('success', 'Profile Updated sucessfully');
            return redirect('/posts');
           } 

    }


    public function list_user()
    {  
          $current_user = auth()->user()->id;

          $user = User::find($current_user);
         // dd($user->requestfriends);
          $requestfriend = $user->requestfriends->pluck('id')->toArray();
          dd($requestfriend);
          $data = User::whereNotIn('id', $requestfriend)->get();// wherenotin akong g gamit dere aron e pagawas niya tanan ang i.d. nga wala pay requestfriends. so aron mang gawas tanan user nga wala pa na add sa current user

          //kane siya wherein akong g gamt aron mo gawas tanan ang na add na sa current user aron dedtoa sa blade.php e maka cancel friend request na ang user
          $user1 = Requestfriend::find($current_user);
          $requestfriend1 = $user1->friends->pluck('id')->toArray();
          $data2 = User::whereIn('id', $requestfriend1)->get();

        return view('users.user_add')->with('data', $data)->with('data2', $data2);
            
    }


    public function add_friend($id)
    {     

         $var_friend = Friend::find($id); 
         $var_user = User::find($id);
         $current_user = auth()->user();

         //nag double insert ko derea  aron sa list user nga url dili  na nimo makita ang user nga imo nang na add 
         $current_user->requestfriends()->attach($id);
         $var_user->requestfriends()->attach($current_user);

         //then nag insert pod ko dere aron sa list request nga url makita dedto kung kinsa toy naay mga friend request
         $var_friend->requestfriends()->attach($current_user);

         session()->flash('success',"Friend Request sent to {$var_user->name}");
         return redirect('/list_user');
    }

    public function cancel_friend_request($id)
    {
         $var_friend = Friend::find($id); 
         $var_user = User::find($id);
         $current_user = auth()->user();

         // once mag add friend ka nag double detach man dedtoa aron dili na makita sa sa list user nga url ang user nga imo nang na add so derea g double detach ra sab nato aron makita tong mga user nga wala pa nimo na add
         $current_user->requestfriends()->detach($id);
         $var_user->requestfriends()->detach($current_user);

         // then nag detach pod ko derea aron sa list request nga url dili nasab makita dedtoa sa user nga imong g add kay g cancel naman nimo ang friend request
         $var_friend->requestfriends()->detach($current_user);

         return redirect('/list_user');

    }


    public function list_request()
    {   

          $current_user = auth()->user()->id;
          $var_friend = Friend::find($current_user);

          $request_friend = $var_friend->requestfriends->pluck('id')->toArray();// aron e 
          $list = User::whereIn('id', $request_friend)->get();//wherein akong g gamit dere aron pangitaon niya ang user nga naay friendrequest

         return view('users.user_friendrequest')->with('list', $list);
    }


    public function accept_request($id)
    {
          $current_user = auth()->user()->id;

          $for_messages = User::find($id);
          $var_user = User::find($current_user);
          $var_friend = Friend::find($current_user);

          // once e click na ang accept g detach nako ang record sa ilang friendrequest sa  database  "friend_requestfriend" nga table aron dili na makita sa list_request once ma accept na
         $var_friend->requestfriends()->detach($id);

         // then g double attach nako sa table nga "friend_user" aron sa list_friend nga url makita dedto ang ilang mga friend 
          $var_friend->users()->attach($id);
          $var_user->friends()->attach($id);

         session()->flash('success',"You are now friends with {$for_messages->name}");
         return redirect('/list_request');

    }



    public function unfriend($id)
    {

          $current_user = auth()->user()->id;

          $for_messages = User::find($id);
          $var_requestfriend = Requestfriend::find($current_user);
          $var_user = User::find($current_user);
          $var_friend = Friend::find($current_user);

          //once e click ang unfriend g double detach nako ang record nila sa "friend_user" nga table aron sa list_friend nga url dili na makita tong user nga g unfriend
          $var_friend->users()->detach($id);
          $var_user->friends()->detach($id);

          
          $var_requestfriend->users()->detach($id);
          $var_user->requestfriends()->detach($id);

         session()->flash('success',"You are not longer friends with {$for_messages->name}");
         return redirect('/list_friend');

    }


    public function list_friend()
    {   
         $user = auth()->user()->id;
      //   
         $list = Friend::find($user);  
        // dd($list->name);
        return view('users.user_list')->with('list', $list);
         //return view('list-of-user')->with('list', $list);

    }



}
