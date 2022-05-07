<?php

namespace App\Http\Controllers;

use App\Models\UserPreference;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserPreferenceResource;
use App\Http\Requests\StoreUserPreferenceRequest;
use App\Http\Requests\UpdateUserPreferenceRequest;

class UserPreferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPreference=UserPreference::where('user_id',Auth::user()->id)->first();
        if($userPreference){
            return response()->json(['data'=>$userPreference]);
        }
        //it is the first time and there is not yet user preferences
     return [];
        
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserPreferenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPreferenceRequest $request)
    {
         $data = $request->validated();
        $data['user_id'] =  Auth::user()->id ;
        $result = UserPreference::create( $data);
        if ($result){
            return new UserPreferenceResource($result);
        }
        return response(['error'=>$result,'message',$request['id'].'  '.$request['user_id'].'  '. $request['brands_fermentable']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPreference  $userPreferences
     * @return \Illuminate\Http\Response
     */
    public function show(UserPreference $userPreference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserPreferencesRequest  $request
     * @param  \App\Models\UserPreferences  $userPreferences
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPreferenceRequest $request, UserPreference $userPreference)
    {
      

       $result= $userPreference->update(
           $request->validated());
            
       if($result){
            return (new UserPreferenceResource($userPreference));
       }
           return response(['error'=>$result,'message'=>$request['id'].'  '.$request['user_id'].'  ']);
     
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPreference  $userPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPreference $userPreference)
    {
        //
    }
}
