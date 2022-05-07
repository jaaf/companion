<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Fermentable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\InventoryFermentable;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FermentableResource;
use App\Http\Requests\StoreFermentableRequest;
use App\Http\Resources\InventoryFermentableResource;
use App\Http\Requests\StoreInventoryFermentableRequest;
use App\Http\Requests\UpdateInventoryFermentableRequest;
use App\Models\FermentableBrand;

class FermentableBothController extends Controller
{


    public function store(StoreInventoryFermentableRequest $requestIF)
    {
        $dataIF = $requestIF->validated();
        $dataIF['user_id'] = Auth::user()->id;
        $dataIF['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($dataIF)) . ' ##### ';

        DB::beginTransaction();
        $result = null;
        try {
            $result2 = Fermentable::create($dataIF);
            $dataIF['shared_f_id'] = $result2['id'];
            $result = InventoryFermentable::create($dataIF);
            $dataIF['id'] = $result['id'];


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        $result = InventoryFermentable::find($dataIF['id']);
        $result2 = Fermentable::find($result['shared_f_id']);
        return json_encode(['if' => new InventoryFermentableResource($result), 'f' => new FermentableResource($result2)]);
    }

    public function update(UpdateInventoryFermentableRequest $requestIF, InventoryFermentable $inventoryFermentable)
    {
        $dataIF = $requestIF->validated();
        //$fermentable = Fermentable::find($dataIF['shared_f_id']);

        // $dataIF['user_id'] = Auth::user()->id;
        DB::beginTransaction();
        try {
            $inventFermentable = InventoryFermentable::find($dataIF['id']);




            if ($dataIF['shared_f_id']) {
                $fermentable = Fermentable::find($dataIF['shared_f_id']);
                //we add a  log key to $dataIF
                $dataIF['log'] = $fermentable->log . " update: " . Auth::user()->id . '/' . json_encode($this->prepareLog($dataIF)) . ' ##### ';

                $result2 = $fermentable->update($dataIF);
            } else {
                $dataIF['log'] = "creation: " . Auth::user()->id . ' | ' . json_encode($this->initialLog($dataIF)) . ' ##### ';
                $result2 = Fermentable::create($dataIF);
                $dataIF['shared_f_id'] = $result2->id;
            }
            $result = $inventFermentable->update($dataIF);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        $result = InventoryFermentable::find($dataIF['id']);
        $result2 = Fermentable::find($result['shared_f_id']);
        //to return an object with 2 properties
        return json_encode(['if' => new InventoryFermentableResource($result), 'f' => new FermentableResource($result2)]);
    }

    private function prepareLog($data)
    {
        $log = [];
        //get the previous fermentable
        $fermentable = Fermentable::find($data['shared_f_id']);

        if ($fermentable->name != $data['name']) $log['name'] = $data['name'];
        if ($fermentable->brand_id != $data['brand_id']) $log['brand_id'] = $data['brand_id'];
        if ($fermentable->form != $data['form']) $log['form'] = $data['form'];

        if ($fermentable->type != $data['type']) $log['type'] = $data['type'];
        if ($fermentable->type != $data['type']) $log['type'] = $data['type'];
        if ($fermentable->raw_ingredient != $data['raw_ingredient']) $log['raw_ingredient'] = $data['raw_ingredient'];
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
        $log['type'] = $data['type']; $log['raw_ingredient'] = $data['raw_ingredient'];
        $log['potential'] = $data['potential'];
        $log['color'] = $data['color'];
        $log['diastatic_power'] = $data['diastatic_power'];
         $log['ph'] = $data['ph'];
          $log['link'] = $data['link'];
        return $log;
    }
}
