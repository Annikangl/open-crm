<?php
//подразделения
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;


use App\Http\Resources\NamePodrazdelCollection;
use App\Models\justice;
use App\Models\notarial;
use App\Models\podrazdel;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\podrazdel as podrazdelResource;
use App\Http\Resources\podrazdelCollection;


class PodrazdelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return podrazdel::all();

        $podrazdels = podrazdel::all();

        return response()->json([
            "podrazdels"=>new podrazdelCollection($podrazdels)
        ]);

        // $podrazdelList = [];
        // foreach ($podrazdels as $podrazdel){

        //     $names = $podrazdel->takeName; //используем функцию по получению имен
        //     $namesList=[];
        //     foreach($names as $name){
        //         $namesList[]=$name->name;
        //     }
        //     $this->podrazdelList[]= [
        //         "id" => $podrazdel->id,
        //         "NameOtdel"=>$podrazdel->nameOtdel,
        //         // "idOrganMinusta" => justice::where('id',$podrazdel->idOrganMinusta)->get(),
        //         // "idTerritorial" => notarial::where('id',$podrazdel->idTerritorial)->get(),
        //         // "idNotarial" => notarial::where('id',$podrazdel->idNotarial)->get()
        //         "NamePodrazdel"=>$namesList
        //     ];
        // }
        // return $this->podrazdelList;

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
                "nameOtdel"=>["required"],

            ]);

            if ($validatior->fails()) {
                return [
                    "status"=>false,
                    "errors"=>$validatior->messages()
                ];
            }
            $post= podrazdel::create([
                "nameOtdel" => $request->nameOtdel,

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
        $podrazdel = podrazdel::find($id);
        return response()->json([
            "podrazdel"=>new podrazdelResource($podrazdel)
        ]);

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
