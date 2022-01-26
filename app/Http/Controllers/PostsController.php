<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     *  @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>'index','show']);
    }
    public function about()
    {
        $title="Welcome to the About us page";
        return view('layouts.about')->with('title',$title);
        // return view('layouts.about',compact('title'));

    }
    public function services()
    {
      $data=array(
        'title'=>'Services',
        'services'=>['Web Design','Machine Learning','Android Development']
      );  
      return view('layouts.services')->with($data);
    }
    public function index()
    {
        // $posts=Post::orderBy("id",'asc')->get(); 
        // $posts=Post::orderBy("id",'asc')->take(1)->get(); 
        $posts=Post::orderBy("id",'asc')->paginate(3);
        // $posts=Post::all();
        // $posts=DB::select('SELECT* FROM posts');

        // $posts=Post::where('title','Post Two')->get();
        return view('pages.users.posts')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.users.createposts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
         // Handling file upload restrictions
         if($request->hasFile('cover_image'))
         {
 // Obtain file properties such as size extension
 $filenamewithExt=$request->file('cover_image')->getClientOriginalName();
 // Obtain filename
 $filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
 // Obtain extension
 $extension=$request->file('cover_image')->getClientOriginalExtension();
 $filenametostore=$filename.'_'.time().'.'.$extension;
 // Upload image
 $path=$request->file('cover_image')->storeAs('public/cover_images',$filenametostore);
 
         }
         else{
             $filenametostore='noimage.jpg';
         }
        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id=auth()->user()->id;
        $post->cover_image=$filenametostore;

        $post->save();
        return redirect('/posts')->with('success','Post Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('pages.users.postdetails')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        // Check for correct user
    if(auth()->user()->id!==$post->user_id){
        return redirect('/posts')->with('error','Unauthorised Access');

    }
        return view('pages.users.editposts')->with('post',$post);
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
            'title'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        // Handling file upload restrictions
        if($request->hasFile('cover_image'))
        {
// Obtain file properties such as size extension
$filenamewithExt=$request->file('cover_image')->getClientOriginalName();
// Obtain filename
$filename=pathinfo($filenamewithExt,PATHINFO_FILENAME);
// Obtain extension
$extension=$request->file('cover_image')->getClientOriginalExtension();
$filenametostore=$filename.'_'.time().'.'.$extension;
// Upload image
$path=$request->file('cover_image')->storeAs('public/cover_images',$filenametostore);

        }
        
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image=$filenametostore;

        }
        $post->save();
        return redirect('/posts')->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id!==$post->user_id){
            return redirect('/posts')->with('error','Unauthorised Access');
        }
        if($post->cover_image!=="noimage.jpg")
        {
// Delete image
Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Deleted Successfully');
    }
}
