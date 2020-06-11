<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{

    public $static_password = '720DF6C2482218518FA20FDC52D4DED7ECC043AB';

    public function showOne($id){
        //show one
        $user = User::findOrFail($id);

        return view('index',compact('user'));
    }

    public function updateContent(Request $request){

        //will append comments field, used postman to test
        $validator = \Validator::make($request->all(), [
            'comments' => 'required|string',
            'id' => 'required|integer'
        ]);

        $user = User::findOrFail($request->id);

        if ($validator->fails()) {
            return response()->json('Check your Inputs');
        } else {

           if($request->password != $this->static_password) {
            return response()->json('Incorrect Password');
           }
           else{
            $user->comments = $user->comments ." ". $request->comments;
            $user->save();
           }
        }
    }

    public function updateContentUsingJson(Request $request){
        /**
         * append commend using json, used postman to test. 
         * formdata body with json string
         */
        
        $json_data = json_decode(json_encode($request->json),true);

        $decoded_json_data = json_decode($json_data,true);
    
        $validator = \Validator::make($decoded_json_data, [
            'comments' => 'required|string',
            'id' => 'required'
        ]);

        $user = User::findOrFail($decoded_json_data['id']);

        if ($validator->fails()) {
            return response()->json('Check your Inputs');

        } else {

           if($decoded_json_data['password'] != $this->static_password) {
            return response()->json('Incorrect Password');
           }
           else{
            $user->comments = $user->comments ." ". $decoded_json_data['comments'];
            $user->save();
           }
        }  
    }

    public function commandController($userId,$comments){
        /**
         *  if you want to use this controller you must type in the command 
         * line "php artisan user:addcomment" with params $id and $comment
         * 
         * e.g: php artisan user:addcomment 1 my comment
         */
        
        $user = User::findOrFail($userId);

        if ($userId == "" || $comments == "") {
            echo 'Check your inputs';
        } else {

        $user->comments = $user->comments ." ". implode(" ",$comments);
        $user->save();
        echo 'Saved';
        }
    }
 
}
