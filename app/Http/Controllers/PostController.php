<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function index(){
        // // $posts = Post::with('user')->orderBy('id', 'DESC')->get();
        // $posts=Post::all();
        // $posts->load(['user', 'video']);

        $posts= Post::with('user') ->get();
        return $this->Ok( $posts, 'retrieved');
    }
    
    public function show($id)
    {
        $post = Post::find($id);

        if(!$post){
            return response()->json(['message' => 'Post not found'], 404);
        }
        return $this->Ok($post, 'post got');
    }
    
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            "created_by" => "required",
            "description" => "required",
            "media_link" => "required",

        ]);
        if($validator->fails()){
            return $this->BadRequest($validator);
        }

        $post = new Post();
        $post -> created_by = $data['created_by'];
        $post -> description = $data['description'];
        $post -> media_link = $data['media_link'];
        $post -> save();


        return $this->Ok( $post , "Post created Successfully");
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();

        return $this->Ok( $post , "Post Deleted Successfully");
    }


    public function update(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            "id" => "required|exists:posts,id",  
            "description" => "sometimes|string|max:255",  
            "media_link" => "sometimes|url",  
        ]);

        if ($validator->fails()) {
            return $this->BadRequest($validator);
        }

        $post = Post::find($data['id']);

        if (!$post) {
            return $this->NotFound("Post not found");
        }

        if (isset($data['description'])) {
            $post->description = $data['description'];
        }

        if (isset($data['media_link'])) {
            $post->media_link = $data['media_link'];
        }

        
        $post->updated_at = now();  
        $post->save();


        return $this->Ok( $post , "Post Updated Successfully");
    }    
   
}
