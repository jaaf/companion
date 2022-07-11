<?php

namespace App\Http\Controllers;

use App\Models\InventoryYeast;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InventoryYeastResource;
use App\Http\Requests\StoreInventoryYeastRequest;
use App\Http\Requests\UpdateInventoryYeastRequest;

class InventoryYeastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return InventoryYeastResource::collection(InventoryYeast::where('user_id',Auth::user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryYeastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryYeastRequest $request)
    {
          $data=$request->validated();
        $data['user_id']=Auth::user()->id;
         $result = InventoryYeast::create(
            $data
        );
        return new InventoryYeastResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryYeast  $inventoryYeast
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryYeast $inventoryYeast)
    {
         return new InventoryYeastResource($inventoryYeast);
 return new InventoryYeastResource($inventoryYeast);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryYeastRequest  $request
     * @param  \App\Models\InventoryYeast  $inventoryYeast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryYeastRequest $request, InventoryYeast $inventoryYeast)
    {
          $inventoryYeast->update(
            $request->validated()
        );
        return new InventoryYeastResource($inventoryYeast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryYeast  $inventoryYeast
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryYeast $inventoryYeast)
    {
         $inventoryYeast->delete();
        return response(content: '', status: 204);
    }
}
