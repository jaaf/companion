<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Hop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InventoryHop;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\HopResource;
use App\Http\Requests\StoreHopRequest;
use App\Http\Resources\InventoryHopResource;
use App\Http\Requests\StoreInventoryHopRequest;
use App\Http\Requests\UpdateInventoryHopRequest;
use App\Models\HopBrand;

class HopBothController extends Controller
{


    public function store(StoreInventoryHopRequest $requestIH)
    {
        $dataIH = $requestIH->validated();
        $dataIH['user_id'] = Auth::user()->id;
        $dataIH['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($dataIH)) . ' ##### ';

        DB::beginTransaction();
        $result = null;
        try {
            $result2 = Hop::create($dataIH);
            $dataIH['shared_h_id'] = $result2['id'];
            $result = InventoryHop::create($dataIH);
            $dataIH['id'] = $result['id'];


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        $result = InventoryHop::find($dataIH['id']);
        $result2 = Hop::find($result['shared_h_id']);
        return json_encode(['if' => new InventoryHopResource($result), 'f' => new HopResource($result2)]);
    }

    public function update(UpdateInventoryHopRequest $requestIH, InventoryHop $inventoryHop)
    {
        $dataIH = $requestIH->validated();
        //$hop = Hop::find($dataIH['shared_h_id']);

        // $dataIH['user_id'] = Auth::user()->id;
        DB::beginTransaction();
        try {
            $inventHop = InventoryHop::find($dataIH['id']);




            if ($dataIH['shared_h_id']) {
                $hop = Hop::find($dataIH['shared_h_id']);
                //we add a  log key to $dataIH
                $dataIH['log'] = $hop->log . " update: " . Auth::user()->id . '/' . json_encode($this->prepareLog($dataIH)) . ' ##### ';

                $result2 = $hop->update($dataIH);
            } else {
                $dataIH['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($dataIH)) . ' ##### ';
                $result2 = Hop::create($dataIH);
                $dataIH['shared_h_id'] = $result2->id;
            }
            $result = $inventHop->update($dataIH);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        $result = InventoryHop::find($dataIH['id']);
        $result2 = Hop::find($result['shared_h_id']);
        //to return an object with 2 properties
        return json_encode(['if' => new InventoryHopResource($result), 'f' => new HopResource($result2)]);
    }

    private function prepareLog($data)
    {
        $log = [];
        //get the previous hop
        $hop = Hop::find($data['shared_h_id']);

        if ($hop->name != $data['name']) $log['name'] = $data['name'];
        if ($hop->code  != $data['code'])$log['code'] = $data['code'];
        if ($hop->usage != $data['usage']) $log['usage'] = $data['usage'];
        
        if ($hop->alpha != $data['alpha']) $log['alpha'] = $data['alpha'];
        if ($hop->harvest != $data['harvest']) $log['harvest'] = $data['harvest'];
        return $log;
    }

    private function initialLog($data)
    {
        $log = [];
        $log['name'] = $data['name'];
        $log['code'] = $data['code'];
        $log['form'] = $data['form'];
        $log['usage'] = $data['usage'];
        $log['alpha'] = $data['alpha'];
        $log['harvest'] = $data['harvest'];
        return $log;
    }
}
