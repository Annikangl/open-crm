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
        $request_data = $request->only(['textOtveta']);

        if (count($request_data) === 0) {
            return response()->json([
                "status" => false,
                "message" => "All fields is empty"
            ])->setStatusCode(422, "All fields is empty");
        }

        $rules_const = [
            "textOtveta" => ['required', 'string'],
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

        $measures = measures::find($id);

        if (!$measures) {
            return response()->json([
                "status" => false,
                "message" => "Article not found"
            ])->setStatusCode(404, "Message not found");
        }

        foreach ($request_data as $key => $data) {
            $measures->$key = $data;
        }

        $measures->save();

        return response()->json([
            "status" => true,
            "message" => "Answer is updated",
            "id"=>$measures->id,
            "Answer"=>$measures->textOtveta,
        ])->setStatusCode(200, "Answer is updated");
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
