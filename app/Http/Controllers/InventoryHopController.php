<?php

namespace App\Http\Controllers;

use App\Models\InventoryHop;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InventoryHopResource;
use App\Http\Requests\StoreInventoryHopRequest;
use App\Http\Requests\UpdateInventoryHopRequest;

class InventoryHopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InventoryHopResource::collection(InventoryHop::where('user_id',Auth::user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryHopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryHopRequest $request)
    {
         $data=$request->validated();
        $data['user_id']=Auth::user()->id;
         $result = InventoryHop::create(
            $data
        );
        return new InventoryHopResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryHop  $inventoryHop
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryHop $inventoryHop)
    {
         return new InventoryHopResource($inventoryHop);
 return new InventoryHopResource($inventoryHop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryHopRequest  $request
     * @param  \App\Models\InventoryHop  $inventoryHop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryHopRequest $request, InventoryHop $inventoryHop)
    {
         $inventoryHop->update(
            $request->validated()
        );
        return new InventoryHopResource($inventoryHop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryHop  $inventoryHop
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryHop $inventoryHop)
    {
        $inventoryHop->delete();
        return response(content: '', status: 204);
    }
}
