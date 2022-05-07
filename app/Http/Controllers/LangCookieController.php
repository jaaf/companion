<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;

class LangCookieController extends Controller
{
    public function setCookie(Request $request) {
      $response = new Response('cookie language set');
      $response->withCookie(cookie()->forever('language', $request['value']));
      return $response;
   }
   public function getCookie(Request $request) {
      $value = $request->cookie('language');
      if($value){
          session()->put('locale', $value);
            App::setLocale($value);
            return new Response($value);
      } else{
         return new Response('No cookie found');
      }
      
      
   }
}
