<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

use App\Http\Requests\Tags\UpdateTagsRequest;

use App\Http\Requests\Tags\CreateTagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $data = Tag::all();
        return view('tags.tag_index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.tag_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagsRequest $request)
    {

         $create = new Tag;
         $create->name = $request->name;
         $create->save(); 

         session()->flash('success','Tag Created Successfully');
         return redirect('/tags');
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
        $tag = Tag::find($id);
        return view('tags.tag_edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request, $id)
    {

         $edit = Tag::find($id);
         $edit->name = $request->name;
         $edit->save(); 

         session()->flash('success','Tag Updated Successfully');
         return redirect('/tags');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->posts->count()>0){
            session()->flash('error', 'Tag cannot be deleted because it has some post');
            return redirect('/tags');

        }
        //$tag = Tag::find($id);
        //$tag->delete();
          $tag->delete();

        session()->flash('success', 'Tag delete sucessfully');
        return redirect('/tags');
    }
}
