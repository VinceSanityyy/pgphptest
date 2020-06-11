<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{

    public $static_password = '720DF6C2482218518FA20FDC52D4DED7ECC043AB';

    public function showOne(Request $request){
        //show one
        $uid = User::findOrFail($request->id);

        $res = User::where('id',1)->get();

        return response()->json($res);
    }

    public function updateContent(Request $request){

        //will append comments field
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

    public function updateContentUsinJson(Request $request){
        //append commend using json
      
    }
}
