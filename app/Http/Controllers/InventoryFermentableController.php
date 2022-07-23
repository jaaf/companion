<?php


namespace App\Http\Controllers;

use App\Models\InventoryFermentable;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InventoryFermentableResource;
use App\Http\Requests\StoreInventoryFermentableRequest;
use App\Http\Requests\UpdateInventoryFermentableRequest;

class InventoryFermentableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InventoryFermentableResource::collection(InventoryFermentable::where('user_id',Auth::user()->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInventoryFermentableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryFermentableRequest $request)
    {
        $data=$request->validated();
        $data['user_id']=Auth::user()->id;
         $result = InventoryFermentable::create(
            $data
        );
        return new InventoryFermentableResource($result);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryFermentable  $inventoryFermentable
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryFermentable $inventoryFermentable)
    {
          return new InventoryFermentableResource($inventoryFermentable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInventoryFermentableRequest  $request
     * @param  \App\Models\InventoryFermentable  $inventoryFermentable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInventoryFermentableRequest $request, InventoryFermentable $inventoryFermentable)
    {
         $inventoryFermentable->update(
            $request->validated()
        );
        return new InventoryFermentableResource($inventoryFermentable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryFermentable  $inventoryFermentable
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryFermentable $inventoryFermentable)
    {
        $inventoryFermentable->delete();
        return response(content: '', status: 204);
    }


}
