<?php

namespace App\Http\Controllers;

use App\Models\Brew;
use App\Http\Resources\BrewResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBrewRequest;
use App\Http\Requests\UpdateBrewRequest;

class BrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brews=Brew::where('user_id',Auth::user()->id)->get();
        return BrewResource::collection($brews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrewRequest $request)
    {
        $data=$request->validated();
        $data['user_id'] =  Auth::user()->id ;
        $result=Brew::create($data);
      
            return new BrewResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function show(Brew $brew)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrewRequest  $request
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrewRequest $request, Brew $brew)
    {
            $result=$brew->update($request->validated());
        if($result){
            return (new BrewResource($brew));
        }
        return response(['error =>$result','message'=>$request['id'].' '.$request['user_id']]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brew  $brew
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brew $brew)
    {
        $brew->delete();
        return response(content: '', status: 204);
    }
}
