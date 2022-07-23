<?php

namespace App\Http\Controllers;

use App\Models\InventoryMisc;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InventoryMiscResource;
use App\Http\Requests\StoreInventoryMiscRequest;
use App\Http\Requests\UpdateInventoryMiscRequest;

class InventoryMiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return InventoryMiscResource::collection(InventoryMisc::where('user_id',Auth::user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryMiscRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryMiscRequest $request)
    {
        $data=$request->validated();
        $data['user_id']=Auth::user()->id;
         $result = InventoryMisc::create(
            $data
        );
        return new InventoryMiscResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryMisc  $inventoryMisc
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryMisc $inventoryMisc)
    {
        return new InventoryMiscResource($inventoryMisc);
 return new InventoryMiscResource($inventoryMisc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryMiscRequest  $request
     * @param  \App\Models\InventoryMisc  $inventoryMisc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryMiscRequest $request, InventoryMisc $inventoryMisc)
    {
          $inventoryMisc->update(
            $request->validated()
        );
        return new InventoryMiscResource($inventoryMisc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryMisc  $inventoryMisc
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryMisc $inventoryMisc)
    {
          $inventoryMisc->delete();
        return response(content: '', status: 204);
    }
}
