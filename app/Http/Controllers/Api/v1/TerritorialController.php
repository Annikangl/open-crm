<?php
//Территориальные органы
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\territorial;
use Illuminate\Http\Request;
use Validator;

class TerritorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return territorial::all();
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
<<<<<<< HEAD
                "gorod"=>["required"],
                "structura"=>["required"]
=======
                "idOtdel"=>["required"],
                "gorod"=>["required"],
                "name"=>["required"]
>>>>>>> eb93d0d7798a7299897546954b37f64bf923e5c7
            ]);

            if ($validatior->fails()) {
                return [
                    "status"=>false,
                    "errors"=>$validatior->messages()
                ];
            }
            $post= territorial::create([
<<<<<<< HEAD
                "gorod" => $request->gorod,
                "structura" => $request->structura
=======
                "idOtdel" => $request->idOtdel,
                "gorod" => $request->gorod,
                "name" => $request->structura
>>>>>>> eb93d0d7798a7299897546954b37f64bf923e5c7
            ]);
            return[
                "status" => true,
                "post"=> $post
            ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = territorial::find($id);
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
