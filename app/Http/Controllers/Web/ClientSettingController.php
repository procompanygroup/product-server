<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ClientSetting\UpdateHiddenRequest;
use App\Http\Controllers\Web\ClientPackageController;
class ClientSettingController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index($lang)
  {
    $id = Auth::guard('client')->user()->id;
    $client=Client::find( $id);
    $sitedctrlr = new SiteDataController();
    $transarr = $sitedctrlr->FillTransData($lang);
    $defultlang = $transarr['langs']->first();
 
   
     
    //general setting
    return view("site.setting.show",['client'=> $client,'lang'=>$lang,'defultlang'=>$defultlang]);
  }
  public function update(UpdateHiddenRequest $request)
  {
    $formdata = $request->all();
    // return  $formdata;
    // return redirect()->back()->with('success_message', $formdata);
    $validator = Validator::make(
      $formdata,
      $request->rules(),
      $request->messages()
    );

    if ($validator->fails()) {
      return response()->json($validator);
    } else {
 
    $id = Auth::guard('client')->user()->id;
 
    
      return response()->json('ok');
    
 
    
  }
  }
 
}
