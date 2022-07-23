<?php

namespace App\Http\Controllers;

use App\Models\Misc;
use App\Http\Resources\MiscResource;
use App\Http\Requests\StoreMiscRequest;
use App\Http\Requests\UpdateMiscRequest;

class MiscController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $miscs=Misc::all();
        
         return MiscResource::collection($miscs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMiscRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMiscRequest $request)
    {
        $data = $request->validated();
        $result = Misc::create($data);
        return new MiscResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function show(Misc $misc)
    {
        return new MiscResource($misc);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMiscRequest  $request
     * @param  \App\Models\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMiscRequest $request, Misc $misc)
    {
        $result = $request->validated();
        if ($result) {
             $misc=Misc::find($result['id']);
            $misc->update($result);
        }

        return new MiscResource($misc);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Misc  $misc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Misc $misc)
    {
          $misc->delete();
        return response(content: '', status: 204);
    }
}
