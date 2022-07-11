<?php

namespace App\Http\Controllers;

use App\Models\Yeast;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\YeastResource;
use App\Http\Requests\StoreYeastRequest;
use App\Http\Requests\UpdateYeastRequest;

class YeastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yeasts = Yeast::all();
        return YeastResource::collection($yeasts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreYeastRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYeastRequest $request)
    {
        $data = $request->validated();
        $data['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($data));
        $result = Yeast::create($data);
        return new YeastResource($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Yeast  $yeast
     * @return \Illuminate\Http\Response
     */
    public function show(Yeast $yeast)
    {
        return new YeastResource($yeast);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateYeastRequest  $request
     * @param  \App\Models\Yeast  $yeast
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYeastRequest $request, Yeast $yeast)
    {
        $result = $request->validated();
        if ($result) {
            $result['log'] = $result['log'] . '/update: ' . Auth::user()->id . ' ' . json_encode($this->prepareLog($result)) . ' ##### ';
            $yeast = Yeast::find($result['id']);
            $yeast->update($result);
        }

        return new YeastResource($yeast);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Yeast  $yeast
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yeast $yeast)
    {
        $yeast->delete();
        return response(content: '', status: 204);
    }

    private function prepareLog($data)
    {
        $log = [];
        //get the previous fermentable
        $yeast = Yeast::find($data['id']);
        if ($yeast->name != $data['name']) $log['name'] = $data['name'];
        if ($yeast->manufacturer != $data['manufacturer']) $log['manufacturer'] = $data['manufacturer'];
            if ($yeast->unit != $data['cells_per_unit']) $log['cells_per_unit'] = $data['cells_per_unit'];
        if ($yeast->cells_per_unit != $data['unit']) $log['unit'] = $data['unit'];

        if ($yeast->target != $data['target']) $log['target'] = $data['target'];
        if ($yeast->form != $data['form']) $log['form'] = $data['form'];
        if ($yeast->ideal_min_temperature != $data['ideal_min_temperature']) $log['ideal_min_temperature'] = $data['ideal_min_temperature'];
        if ($yeast->ideal_max_temperature != $data['ideal_max_temperature']) $log['ideal_max_temperature'] = $data['ideal_max_temperature'];
        if ($yeast->min_temperature != $data['min_temperature']) $log['min_temperature'] = $data['min_temperature'];
        if ($yeast->max_temperature != $data['max_temperature']) $log['max_temperature'] = $data['max_temperature'];
        if ($yeast->floculation != $data['floculation']) $log['floculation'] = $data['floculation'];
        if ($yeast->alcool_tolerance != $data['alcool_tolerance']) $log['alcool_tolerance'] = $data['alcool_tolerance'];
        if ($yeast->attenuation != $data['attenuation']) $log['attenuation'] = $data['attenuation'];
        if ($yeast->notes != $data['notes']) $log['notes'] = $data['notes'];
        if ($yeast->link != $data['link']) $log['link'] = $data['link'];
        return $log;
    }
    private function initialLog($data)
    {
        $log = [];
        $log['name'] = $data['name'];
        $log['manufacturer'] = $data['manufacturer'];
        $log['unit'] = $data['unit'];
        $log['cells_per_unit'] = $data['cells_per_unit'];
        $log['target'] = $data['target'];
        $log['form'] = $data['form'];
        $log['ideal_min_temperature'] = $data['ideal_min_temperature'];
        $log['ideal_max_temperature'] = $data['ideal_max_temperature'];
        $log['min_temperature'] = $data['min_temperature'];
        $log['max_temperature'] = $data['max_temperature'];
        $log['floculation'] = $data['floculation'];
        $log['alcool_tolerance'] = $data['alcool_tolerance'];
        $log['link'] = $data['link'];
        $log['attenuation'] = $data['attenuation'];
        $log['notes'] = $data['notes'];

        return $log;
    }
}
