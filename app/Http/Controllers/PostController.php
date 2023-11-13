<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function postingan(){
        $posts = Post::latest()->paginate(5);
        return view('postingan',compact('posts'));
    }

    function create_post(){
        return view('create-post');
    }

    function store_post(Request $request){

        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required|min:1',
            'content'   => 'required|min:1'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        return redirect()->route('admin.postingan');
    }

    public function detail_post(Request $request, $id)
    {
        $post = Post::find($id);

        return view('detail-post', compact('post'));
    }

    function edit_post(Request $request, $id){
        $post = Post::find($id);
        return view('edit-post',compact('post'));
    }

    function update_post(Request $request, $id)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required',
            'content'   => 'required'
        ]);
        $post = Post::find($id);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);
        }

        return redirect()->route('admin.postingan');
        
    }

    function delete_post($id){
        $post = Post::find($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('admin.postingan');
    }
}
