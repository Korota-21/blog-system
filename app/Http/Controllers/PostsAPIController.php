<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class PostsAPIController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return db::select('select * from posts');
        //Post::all('id')
        //return Post::orderByRaw('updated_at - created_at DESC')->get();

        $posts = Post::all();

        return ($posts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        $fileNameToStore = PostsAPIController::uploadImage($request);


        // Create post
        $post = new Post();
        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->user_id = $request->input("user_id");
        $post->cover_image = $fileNameToStore;
        $post->save();
        return ['success' => 'Post has been added'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return $post;
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Create post
        $post = Post::find($id);
        // التحقق من اليوزر
        if ($post->user_id != $request->input("user_id")) {
            return ['error' => "Unauthorized Page"];
        }
        $status="";
        $fileNameToStore = PostsAPIController::uploadImage($request);
        $status=$request->hasFile('cover_image');

        // Create post
        $post = Post::find($id);
        // التحقق من اليوزر
        if ($post->user_id != $request->input("user_id")) {
            return ['error' => "Unauthorized Page"];
        }
        $post->title = $request->input("title");
        $post->body = $request->input("body");

        if ($request->hasFile('cover_image')) {
            // التحقق انه مو الصورة الافتراضية
            if ($post->cover_image != "noimage.png") {
                //Delete old Image
                Storage::delete('public/cover_images/' . $post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
            $status ="uplauded";
        }
        //update
        $post->save();
        return ['success' => 'Post has been updated','image status'=>$status];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //check for currect user
        if ($post->user->id != Auth()->user()->id) {
            return redirect('/posts')->with('error', "Unauthorized Action");
        }
        if ($post->cover_image != "noimage.png") {
            //delete Image
            Storage::delete('public/cover_images/' . $post->cover_image);
        }


        $post->delete();
        return ['success' => 'Post has been Removed'];
    }
    static function uploadImage($request)
    {
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_DIRNAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        return $fileNameToStore;
    }
}
