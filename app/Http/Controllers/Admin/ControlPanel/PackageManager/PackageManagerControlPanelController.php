<?php
namespace App\Http\Controllers\admin\ControlPanel\PackageManager;

use App\AppSettings;
use App\Models\ControlPanel\Options;
use App\AutoResponse;
use App\Emailsetting;
use App\Http\Controllers\Admin\AdminController;
use App\MenuSettings;
use App\PaymentNotification;
use App\PaymentType;
use App\Ranksetting;
use App\Settings;
use App\Packages;
use App\User;
use App\Welcome;
use Auth;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Response;
use Session;
use Validator;

class PackageManagerControlPanelController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */  
    public function index()
    {

        $title     = "Stage Settings";
        $sub_title = "Stage Settings";
        $base      = "Stage Settings";
        $method    = "Stage Settings";
        
        $bronze  = Packages::where('stage',1)->get();
        $silver  = Packages::where('stage',2)->get();
        $gold    = Packages::where('stage',3)->get();
        $platinum = Packages::where('stage',4)->get();
        $diamond  = Packages::where('stage',5)->get();
        $diamond1 = Packages::where('stage',6)->get();
       
        return view('app.admin.control_panel.package_manager.index', compact('title', 'sub_title', 'base', 'method', 'packages','bronze','silver','gold','platinum','diamond','diamond1'));
    }


    public function view_edit($id)
    {

        $title     = "Stage Settings";
        $sub_title = "Stage Settings";
        $base      = "Stage Settings";
        $method    = "Stage Settings";
        
        $package  = Packages::find($id);
        return view('app.admin.control_panel.package_manager.view_edit', compact('title', 'sub_title', 'base', 'method', 'package'));
    }


    public function update(Request $request, $id)
    {

        $input = $request->all();
        $rules = array(
            'package' => 'required',
            // 'amount' => 'required',
            // 'positions_in_fly' => 'required',
            // 'accounts_in_infinity' => 'required',
            // 'positions_in_infinity' => 'required',
            // 'payout' => 'required',
            // 'capping' => 'required',
            // 'special_wallet' => 'required',

            'fee'=> 'required',
            'upgrade_fee'=> 'required',
            'charge'=> 'required',
            'member_benefit'=> 'required',
            'downline_bonus'=> 'required',
            'insurace_completing_fee'=> 'required',
            'insurace_completing_fee'=> 'required',
            'longrich_reg_fee'=> 'required',
            'insurance_reg_fee' => 'required',
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            // (null !== $request->package ? Packages::where('app.theme_font_size',$request->theme_font_size) :  '' );
            $package = Packages::find($id);


            $package->package = $request->package;
            $package->fee = $request->fee;
            $package->upgrade_fee = $request->upgrade_fee;
            $package->charge = $request->charge;
            $package->member_benefit = $request->member_benefit;
            $package->downline_bonus = $request->downline_bonus;
            $package->insurance_reg_fee = $request->insurance_reg_fee;
            $package->insurace_completing_fee = $request->insurace_completing_fee;
            $package->longrich_reg_fee = $request->longrich_reg_fee;
            $package->insurance_reg_fee = $request->insurance_reg_fee;


            

            if ($package->save()) {
                Session::flash('flash_notification', array('level' => 'success', 'message' => trans('Successfully Updated Phase Settings!')));
                    return redirect('admin/control-panel/package-manager');
            } else {
                Session::flash('flash_notification', array('level' => 'danger', 'message' => trans('Could Not Update Phase Setting Details!')));
                    return redirect('admin/control-panel/package-manager');
            }
        }
    }
}
