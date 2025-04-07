<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Video;

class VideoController extends Controller
{
   public function index(){
        $video = Video::with('post')->orderBy('id', 'DESC')->get();
        
        return $this->Ok($video , "Video Retrieve Successfully");
    }
    
    public function show($id)
    {
        $video = Video::find($id);

        if(!$video){
            return response()->json(['message' => 'Video not found'], 404);
        }
        return $this->Ok($video , "Video Retrieved Successfully");
    }
    
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data,[
            "title" => "required|string|max:255",
            "description" => "required|string|max:255",
            "url" => "required",
            "thumbnail" => "required|string",
            "post_id" => "sometimes|numeric"

        ]);
        if($validator->fails()){
            return $this->BadRequest($validator);
        }

        $video = new Video();
        $video -> title = $data['title'];
        $video -> description = $data['description'];
        $video -> thumbnail = $data['thumbnail'];
        $video -> url = $data['url'];
        $video -> post_id = $data ['post_id'];
        $video -> save();
        
        return $this->Ok($video , "Video Created Successfully");
   }

   public function update(Request $request){
    $data = $request->all();
    $validator = Validator::make($data, [
        "id" => "required|exists:videos,id",  
        "title" => "sometimes|string|max:255",  
        "description" => "sometimes|string|max:255",  
        "url" => "sometimes|string|max:255",  
        "thumbnail" => "sometimes|string", 
    ]);
    if ($validator->fails()) {
        return $this->BadRequest($validator);
    }
    
    $video = Video::find($data['id']);
    if (!$video) {
        return response()->json(['message' => 'Video not found'], 404);
    }

    $video->update($data);
    return $this->Ok($video , "Update Video Successfully");

   }

   public function destroy($id){
        $video = Video::find($id);

        if (!$video) {
            return response()->json(['message' => 'Video not found'], 404);
        }

        $video->delete();

        return $this->Ok($video , "Video Delete Successfully");
   }
}
