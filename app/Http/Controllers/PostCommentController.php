<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;
use Validator;

class PostCommentController extends Controller
{
    public function index(){
        $postComment = PostComment::with('user')->orderBy('id', 'DESC')->get();
        return $this->Ok($postComment, "PostComment Retrieve");
    }

    public function show($id)
    {
        $postComment = PostComment::find($id);

        if(!$postComment){
            return response()->json(['message' => 'Post not found'], 404);
        }
        return $this->Ok($postComment, "PostComment Retrieved");
    }

    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            "created_by" => "required",
            "post_id" => "required",
            "comment" => "required|string|max:255",

        ]);
        if($validator->fails()){
            return $this->BadRequest($validator);
        }

        $postComment = new PostComment();
        $postComment -> created_by = $data['created_by'];
        $postComment -> post_id = $data['post_id'];
        $postComment -> comment = $data['comment'];
        $postComment -> save();


        return $this->Ok($postComment, "PostComment Created Succesfully");
    }

    public function update(Request $request){
    $data = $request->all();
    $validator = Validator::make($data, [
        "id" => "required|exists:posts,id",  
        "post_id" => "sometimes|numeric",  
        "comment" => "sometimes|string|max:255",  
    ]);
    if ($validator->fails()) {
        return $this->BadRequest($validator);
    }
      $postcomment = PostComment::find($data['id']);
    if (!$postcomment) {
        return $this->NotFound("Post not found");
    }
    if (isset($data['post_id'])) {
        $postcomment->description = $data['post_id'];
    }
    if (isset($data['comment'])) {
        $postcomment->media_link = $data['comment'];
    }
    $postcomment->updated_at = now();  
    $postcomment->save();
 
    return $this->Ok($postcomment, "PostComment updated Succesfully");
}


    public function destroy($id)
    {
        $postComment = PostComment::find($id);

        if (!$postComment) {
            return response()->json(['message' => 'PostComments not found'], 404);
        }

        $postComment->delete();

        return $this->Ok($postComment, "PostComment Deleted Succesfully");
    }
}
