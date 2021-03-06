<?php

namespace App\Http\Controllers;

use App\Models\Hop;
use App\Http\Resources\HopResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreHopRequest;
use App\Http\Requests\UpdateHopRequest;

class HopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hops=Hop::all();
        
         return HopResource::collection($hops);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHopRequest $request)
    {
        $data = $request->validated();
        $data['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($data));
        $result = Hop::create($data);
        return new HopResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hop  $hop
     * @return \Illuminate\Http\Response
     */
    public function show(Hop $hop)
    {
     return new HopResource($hop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHopRequest  $request
     * @param  \App\Models\Hop  $hop
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHopRequest $request, Hop $hop)
    {
         $result = $request->validated();
        if ($result) {
            $result['log'] = $result['log'] . '/update: ' . Auth::user()->id . ' ' . json_encode($this->prepareLog($result)) . ' ##### ';  
             $hop=Hop::find($result['id']);
            $hop->update($result);
        }

        return new HopResource($hop);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hop  $hop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hop $hop)
    {
        $hop->delete();
        return response(content: '', status: 204);
    } 
    
    private function prepareLog($data)
    {
        $log = [];
        //get the previous fermentable
        $hop = Hop::find($data['id']);
        //$log['date']=(new \DateTime('now'))->format('Y-m-d H:i:s');
        if ($hop->name != $data['name']) $log['name'] = $data['name']; 
        if ($hop->supplier != $data['supplier']) $log['supplier'] = $data['supplier'];
        if ($hop->code  != $data['code'])$log['code'] = $data['code'];
        if ($hop->purpose != $data['purpose']) $log['purpose'] = $data['purpose'];
        
        if ($hop->alpha != $data['alpha']) $log['alpha'] = $data['alpha'];
        if ($hop->harvest != $data['harvest']) $log['harvest'] = $data['harvest'];
        if ($hop->aromas != $data['aromas']) $log['aromas'] = $data['aromas'];
        if ($hop->alternatives != $data['alternatives']) $log['alternatives'] = $data['alternatives'];
        if ($hop->notes != $data['notes']) $log['notes'] = $data['notes'];
        return $log;
    }

    private function initialLog($data)
    {
        $log = [];
        $log['name'] = $data['name'];
         $log['supplier'] = $data['supplier'];
        $log['code'] = $data['code'];
        $log['form'] = $data['form'];
        $log['purpose'] = $data['purpose'];
        $log['alpha'] = $data['alpha'];
        $log['aromas'] = $data['aromas'];
         $log['alternatives'] = $data['alternatives'];
          $log['notes'] = $data['notes'];
        $log['harvest'] = $data['harvest'];
      
        return $log;
    }

} 