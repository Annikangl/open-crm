<?php
//органы Минюста
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\justice;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Validator;

class JusticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return justice::all();
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
                "name"=>["required"]
            ]);

            if ($validatior->fails()) {
                return [
                    "status"=>false,
                    "errors"=>$validatior->messages()
                ];
            }
            $post= justice::create([
                "name" => $request->otdel
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
        //  return justice::find($id);
         $post = justice::find($id);
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
