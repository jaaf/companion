<?php

namespace App\Http\Controllers;

use App\Models\Fermentable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FermentableResource;
use App\Http\Requests\StoreFermentableRequest;
use App\Http\Requests\UpdateFermentableRequest;

class FermentableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fermentables=Fermentable::all();
       // $fermentables =Fermentable::get()->sortBy(function ($query){
       //     return[ $query->fermentable_brand->code,$query->fermentable_brand->name];
       // })->all();
        return FermentableResource::collection($fermentables);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFermentableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFermentableRequest $request)
    {
        $data = $request->validated();
        $data['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($data));
        $result = Fermentable::create($data);
        return new FermentableResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fermentable  $fermentable
     * @return \Illuminate\Http\Response
     */
    public function show(Fermentable $fermentable, Request $request)
    {
        return new FermentableResource($fermentable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFermentableRequest  $request
     * @param  \App\Models\Fermentable  $fermentable
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFermentableRequest $request, Fermentable $fermentable)
    {   
     
        $result = $request->validated();
        if ($result) {
            $result['log'] = $result['log'] . '/update: ' . Auth::user()->id . ' ' . json_encode($this->prepareLog($result)) . ' ##### ';  
             $fermentable=Fermentable::find($result['id']);
            $fermentable->update($result);
        }
        
        // $fermentable->update(
        //   $request->validated()
        // );

        return new FermentableResource($fermentable);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fermentable  $fermentable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fermentable $fermentable)
    {
        $fermentable->delete();
        return response(content: '', status: 204);
    }

        private function prepareLog($data)
    {
        $log = [];
        //get the previous fermentable
        $fermentable = Fermentable::find($data['id']);
 //$log['date']=(new \DateTime('now'))->format('Y-m-d H:i:s');
        if ($fermentable->name != $data['name']) $log['name'] = $data['name'];
        if ($fermentable->brand_id != $data['brand_id'])$log['brand_id'] = $data['brand_id'];
        if ($fermentable->form != $data['form']) $log['form'] = $data['form'];
        
        if ($fermentable->type != $data['type']) $log['type'] = $data['type'];
        if ($fermentable->raw_ingredient != $data['raw_ingredient']) $log['raw_ingredient'] = $data['raw_ingredient'];
        if ($fermentable->potential != $data['potential']) $log['potential'] = $data['potential'];
        if ($fermentable->color != $data['color']) $log['color'] = $data['color'];
        if ($fermentable->diastatic_power != $data['diastatic_power']) $log['diastatic_power'] = $data['diastatic_power'];
       if ($fermentable->ph != $data['ph']) $log['ph'] = $data['ph'];
     if ($fermentable->link != $data['link']) $log['link'] = $data['link'];
        return $log;
    }

    private function initialLog($data)
    {
        $log = [];
        $log['name'] = $data['name'];
        $log['brand_id'] = $data['brand_id'];
        $log['form'] = $data['form'];
        $log['type'] = $data['type'];
        $log['raw_ingredient'] = $data['raw_ingredient'];
        $log['potential'] = $data['potential'];
        $log['color'] = $data['color'];
        $log['diastatic_power'] = $data['diastatic_power'];
         $log['ph'] = $data['ph'];
          $log['link'] = $data['link'];
        return $log;
    }
}
