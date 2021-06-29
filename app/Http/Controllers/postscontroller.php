<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts ;
class postscontroller extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allposts = posts::orderby('created_at','desc')->paginate(10);
        return view ('posts.index')->with('allposts' , $allposts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this ->validate($request,[
                'title'=>'required',
                'body'=>'required',
               // 'cover_image' =>'image|nullable|max:1999'
            ]);

            //handel file upload
            /*if($request->hasfile('cover_image'))
            { 
            //get file name with ext
            $filenamewithext =$request->file('cover_image')->getclientoriginalname();
            //get just filename
            $filename = pathinfo($filenamewithext , PATHINFO_FILENAME);
            //get just ext
            $extension =$request->file('cover_image')->getclientoriginalextension();
            // filename to store
            $filenametostore = $filename . '_' . time() .'.' . $extension ;
            //upload file
            $path = $request-> file('cover_image')->storeas('public/cover_image', $filenametostore);
        } else {
            $filenametostore ='noimage.jpg';
        }
        */
        //create post
        $posts =new posts;
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts ->user_id= auth()->user()->id;
        //$post ->cover_image =$filenametostore;
        $posts->save();
        return redirect('/posts')->with('sucsses','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        //$post = posts::where('title','post twe')->get();
        $post = posts::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =posts::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized pages');
        }
        return view('posts.edit')->with('post',$post);
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
        $this ->validate($request,[
            'title'=>'required',
            'body'=>'required',
        ]);

        //create post
        $posts = posts::find($id);
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
    
        $posts->save();
        return redirect('/posts')->with('sucsses','post update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = posts::find($id);
        $post->delete();
        return redirect('/posts')->with('sucsses','post delete');
    }
}
