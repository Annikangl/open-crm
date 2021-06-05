<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
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

        $user = User::where('email',$request->email)->first(); //выгрузить из базы
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
                "token"=>$token,
                "id"=>$user->id,
                "Name"=> $user->name
            ]);

        }else {
            return response()->json([
                "status"=>false,
            ])->setStatusCode(401);
        }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $request_data = $request->only(['role']);

        if (count($request_data) === 0) {
            return response()->json([
                "status" => false,
                "message" => "All fields is empty"
            ])->setStatusCode(422, "All fields is empty");
        }

        $rules_const = [
            "role" => ['required', 'string'],
        ];

        $rules = [];

        foreach ($request_data as $key => $data) {
            $rules[$key] = $rules_const[$key];
        }

        $validator = Validator::make($request_data, $rules);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->messages()
            ])->setStatusCode(422);
        }

        $users = User::find($id);

        if (!$users) {
            return response()->json([
                "status" => false,
                "message" => "Article not found"
            ])->setStatusCode(404, "Article not found");
        }

        foreach ($request_data as $key => $data) {
            $users->$key = $data;
        }

        $users->save();

        return response()->json([
            "status" => true,
            "message" => "User is updated",
            "id"=>$users->id,
            "Name"=>$users->name,
            "Role"=>$users->role,
        ])->setStatusCode(200, "Users is updated");
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
