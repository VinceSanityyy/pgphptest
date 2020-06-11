<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{

    public $static_password = '720DF6C2482218518FA20FDC52D4DED7ECC043AB';

    public function showOne($id){

        $uid = User::finOrFail($id);

        $res = User::where('id',$uid)->get();

        return response()->json($res);
    }
}
