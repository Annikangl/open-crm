<?php
//меры по обращениям пользователей
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\measures;
use Illuminate\Http\Request;
use Validator;
class MeasuresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return measures::all();
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
                "idObr"=>["required"],
                "textOtveta"=>["required"],
            ]);

            if ($validatior->fails()) {
                return [
                    "status"=>false,
                    "errors"=>$validatior->messages()
                ];
            }
            $post= measures::create([
                "idObr" => $request->idObr,
                "textOtveta" => $request->textOtveta,

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
        $post = measures::find($id);
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
