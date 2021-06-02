<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatior = Validator::make(
            $request->all(),
            [
                "name"=>["required"],
                "email"=>["required"],
                "password"=>["required"],
            ]);

            if ($validatior->fails()) {
                return response()->json([
                    "status"=>false,
                    "errors"=>$validatior->messages()
                ]);
            }
            $post= User::create([
                
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password) //шифруем пароль
            ]);
            // if (User::check($request->email,$post->email)) {
            //     return response()->json([
            //         "status"=>false,
            //         "message"=> "Post dont add"
            //     ])->setStatusCode(404);
            //  }
            return response()->json([
                "status" => true,
                "post"=> $post
            ]);
    }
    public function login(Request $request){

    
        $userInfo = User::getUserByEmail($request->email);

        $user = User::where('email',$request->email)->first(); //выгрузить из базы
        // $id =User::where('email',$request->email);
        if (is_null($user)) {
            return response()->json([
                "status"=>false,

            ])->setStatusCode(401);
        }
        // dd(Hash::check($request->password,$user->password));
        if (Hash::check($request->password,$user->password)) {
           // auth Ok
            $token = Str::random(20);
           
            $user->token = $token;
            $user->save();

            return response()->json([
                "status"=>true,
                "id"=>$user,
                "token"=>$token
            ]);

        }else {
            return response()->json([
                "status"=>false,
            ])->setStatusCode(401);
        }
       

    }
    // public function login2(Request $request){

    //     $user = User::where('email',$request->email)->first(); //выгрузить из базы
    //     $id =User::where('email',$request->email);
    //     return $request->id;
    //     if (is_null($user)) {
    //         return response()->json([
    //             "status"=>false,

    //         ])->setStatusCode(401);
    //     }
    //     // dd(Hash::check($request->password,$user->password));
    //     if (Hash::check($request->password,$user->password)) {
    //        // auth Ok
    //         $token = Str::random(20);
            
    //         $user->token = $token;
    //         $user->save();

    //         return response()->json([
    //             "status"=>true,
    //             "id"=>$request->id,
    //             "token"=>$token
    //         ]);

    //     }else {
    //         return response()->json([
    //             "status"=>false,
    //         ])->setStatusCode(401);
    //     }
       

    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
        public function show($id)
        {
        $post = User::find($id);
        if (!$post) {
            return response()->json([
                "status"=>false,
                "message"=> "Post not found"
            ])->setStatusCode(404);
        }
        return $post;
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
