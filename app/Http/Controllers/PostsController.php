<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
  
        ]);
    
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->user_id = auth()->user()->id;
      $post->cover_image = $fileNameToStore;
      $post->save();

      return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',[
            'post'=> $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        //check for correct user
        if(auth()->user()->id  !== $post->user_id){
            return redirect('posts.edit');
        };
        return view('posts.edit',[
            'post'=>$post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999',
  
        ]);
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

      $post = Post::findOrFail($id);
      $post->title = $request->title;
      $post->body = $request->body;
      if($request->hasFile('cover_image')){
        $post->cover_image = $fileNameToStore;
      }
      $post->save();

      return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Post::destroy($id);
        // //check for correct user
        // if($post->cover_image != 'noimage.jpg'){

        // };
        // return redirect(route('posts.index'));
        $post = Post::find($id);
         if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        };
        $post->delete();
        return redirect(route('posts.index'));

    }


}
