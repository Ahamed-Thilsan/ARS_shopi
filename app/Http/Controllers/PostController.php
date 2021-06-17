<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
    public function addPost(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            
            $posts = new Post;
            $posts->title = $data['title'];
            $posts->authername = $data['authername'];
            $posts->description = $data['description'];
            $posts->save();
            
            return redirect('Blog_posts/index')->with('flash_message_success','Post has been successfully added!');
        }
        return view('Blog_posts.add_post')->with(compact('posts'));
    }

    public function index($id=null){
        $posts = Post::orderBy('id','DESC')->get();
        return view('Blog_posts.index')->with(compact('posts'));

    }
    public function viewPost($id=null){
        $posts = Post::find($id);
        return view('Blog_posts.view_post')->with(compact('posts'));
    }
    public function editPost(Request $request, $id = null){
            if($request->isMethod('post')){
                $data =$request->all();

                Post::where('id',$id)->update([
                    'title'=>$data['title'],
                    'authername'=>$data['authername'],
                    'description'=>$data['description']
                ]);
                return redirect('Blog_posts/index')->with('flash_message_success','Post has been successfully Edided!');
            }

        $postDetails = Post::where(['id'=>$id])->first();
        return view('Blog_posts.edit_post')->with(compact('postDetails'));
    }
    public function delete($id=null){
       Post::where(['id'=>$id])->delete();
       return redirect('Blog_posts/index')->with('flash_message_error','Post successfully Deleted!');
    }
}
