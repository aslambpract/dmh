<?php

namespace App\Http\Controllers\admin\ControlPanel\Ewallet;

use Illuminate\Http\Request;
use App\Models\ControlPanel\Options;
use App\Http\Controllers\Admin\AdminController;

use App\EwalletSettings;
use Session;

class AdminEwalletController extends AdminController
{
      public function ewalltindex()
    {

        $title     = "Wallet settings";
        $sub_title = "Wallet settings";
        $base      = "Wallet settings";
        $method    = "Wallet settings";
        
        $settings  = EwalletSettings::all();


        return view('app.admin.control_panel.ewallet.index', compact('title', 'sub_title', 'base', 'method', 'settings'));
    }
      public function ewalletupdate(Request $request)
    {

   
       
        foreach ($request->all() as $cloumn_name => $value_array) {
            if (is_array($value_array)) {
                foreach ($value_array as $key => $value) {
                    EwalletSettings::updateewalletSetting($cloumn_name, $key, $value);
                }
            }
        }

       

        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('successfully_updated_wallet!')));
        return redirect()->back();
    }

}
