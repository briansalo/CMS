<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;

use App\Category;

use App\Tag;

use App\User;

use App\Http\Requests\Posts\CreatePostsRequest;

use Illuminate\Support\Facades\Storage;
 
class PostsController extends Controller
{

    public function __construct()
    {
        // g tawag dere ang verifycategoriescount nga middleware for only ceate function and store function aron then make sure sa function construct duha ka underscore 
        $this->middleware('VerifyCategoriesCount')->only(['create','store']);
    }

    public function index_admin()
    {
         $data= Post::all();
        return view('post.post_index')->with('data', $data); 

    }

    public function index()
    {
          $current_user = auth()->user()->id;
          $user = User::find($current_user);
          $friend = $user->friends->pluck('id')->toArray();// g array nako ne siya kay ang sa user daghay friend then i use pluck('id') aron kuhaon tanan i.d. sa friend ana nga user


  //this query it means select all post where user_id is current user or user_id is equal to the value in the friend variable as you can see i use "orwhere", aron kanang duha ka g query nako is kolektahon niya then i use "use($friend)" aron ang variable nga friend sa taas atong magamit then i use "whereIn" kay ang $friend ang value ana is array so wherein dapat gamiton aron basahon niya ang array
          $data = Post::where('user_id','=', $current_user)
          ->orwhere(function ($query) use($friend){
           $query->whereIn('user_id', $friend);
            })->orderBy('created_at', 'desc')->get();
          return view('post.post_user_index')->with('data', $data);
          //dd($data);
            

          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.post_create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {

           $create = new Post;

           $create->title = $request->title;
           //$create->description = $request->description;
           $create->content = $request->content;
           $create->image = $request->image->store('posts'); // to upload the image to storage use the store method then define what file name you want
          // $create->image='uploads/posts'. $image_new_name;
           $create->category_id = $request->category;
           $create->user_id = auth()->user()->id;
           $create->published_at = $request->published_at;  
           $create->save();
           
           $create->tags()->attach($request->tag);//$create mao ney variable nga g refer nato sa Post nga model then ang attach method mao ney gamit sa many to many kay aron maka insert og daghan nga value. in short g attach niya ang gikan sa request padulong tags model base sa kana nga post
           // after sa save na nako ne g butang kay aron pag save automatic ang $create nga variable naa nay i.d so aron naa tay basihan which i.d. nato e attach

           session()->flash('success','Category Created Successfully');
           return redirect('/posts');
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

        $tags = Tag::all();
        $categories = Category::all();
        $post = Post::find($id);
        return view('post.post_edit')->with('post', $post)->with('categories', $categories)->with('tags', $tags);  
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
        if($request->hasFile('image')){  //e check sa kung ang field sa image sa index.blade.php naa bay sulod aron dili mag error kung ang user walay e change sa form.  
         $edit = Post::find($id);
         $edit->title = $request->title;
         $edit->description = $request->description;
         $edit->content = $request->content;
         storage::delete($edit->image);//  g delete nako ang image sa kana nga i.d. aron mawala natong image sa kana nga i.d.  make sure e una ang delete adeser nimo e update
         $edit->image = $request->image->store('posts');// then g store or g save dayon nako ang image nga gikan sa request
         $edit->category_id = $request->category; 
         $edit->published_at = $request->published_at;
         $edit->save(); 

         session()->flash('success','Post Updated Successfully');
        return redirect('/posts');
            
        }
        else{
            $edit = Post::find($id);
            $edit->title = $request->title;
            $edit->description = $request->description;
            $edit->content = $request->content;
            $edit->category_id = $request->category;
            $edit->published_at = $request->published_at;
            $edit->tags()->sync($request->tag);
            $edit->save(); 
            session()->flash('success','Post Updated Successfully');
            return redirect('/posts');

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_user = Post::find($id);
        $post = Post::withTrashed()->where('id', $id)->firstorFail(); 
        //"with" ang gamit derea dili "only" kay aron e pa gawas niya tanan ang data bisag softdeleted or wala pa na softdelete kay aron walay error sa pag if else
        //where('id', $id) = pasabot ane kay where('ang id sa column table' kay parehas sa'id gikan sa destroy method')
        //for security i use firstorfailmethod ang gamit ane kung dili niya ma find ang record mag throw siyag exeption then laravel will catch the exeption and show as 404pages
        if($post->trashed()){//method ne aron ma balan kung ang data trashed naba or wala pa
            $post->forceDelete(); //a method to permanent delete
            storage::delete($post->image);  //method to delete also the image in storage folder and don't forget to declare the illuminate storage in the top
          }
        else{
        $post->delete();

        }
        session()->flash('success','Post Deleted Successfully');
        return redirect('/posts');

    }

    public function trashed()
    {

        $trashed = Post::onlyTrashed()->get(); //this method i use "only" aron ang iya ra tanan e pa gawas kay kadtong data nga softdeleted na

       return view('post.post_index')->with('data', $trashed); // as you can see i use a dynamic which is the "data" so we can access the post_index.blade.php. because in the index method i use "data" variable to get all the post. in this way we don't need to add another php.blade to show all the trashed data

    }
    public function restore($id)
    {

      $post = Post::withTrashed()->where('id', $id)->restore();

        session()->flash('success','Post Restored Successfully');
        return redirect('/posts');
    }

}
