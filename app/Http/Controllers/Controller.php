<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function BadRequest($validator){
        return response()->json(['ok' => false, 'errors' => $validator  ->errors()], 400);
    }

    protected function NotFound($message){
        return response()->json(['ok' => false, 'message' => $message], 404);
    }
    protected function Unauthorized($message){
        return response()->json(['ok' => false, 'message' => $message], 401);
    }
    protected function Forbidden($message){
        return response()->json(['ok' => false, 'message' => $message], 403);
    }
    protected function InternalServerError($message){
        return response()->json(['ok' => false, 'message' => $message], 500);
    }
    protected function Ok( $data, $message){
        return response()->json(['ok' => true, 'data'=>$data, 'message' => $message], 200);
    }

    protected function SanitizeName($name){
        $name = trim($name);
        
        $name = ucwords($name);
        
        do{
            $name = str_replace("  ", " ", $name);
        }while(str_contains($name, " "));
        
        return $name;
    }
}
