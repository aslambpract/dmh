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

        $title     = "Circle Settings";
        $sub_title = "Circle Settings";
        $base      = "Circle Settings";
        $method    = "Circle Settings";
        
        $packages  = Packages::all();
        // dd($packages);
        return view('app.admin.control_panel.package_manager.index', compact('title', 'sub_title', 'base', 'method', 'packages'));
    }


    public function view_edit($id)
    {

        $title     = "Circle Settings";
        $sub_title = "Circle Settings";
        $base      = "Circle Settings";
        $method    = "Circle Settings";
        
        $package  = Packages::find($id);
        return view('app.admin.control_panel.package_manager.view_edit', compact('title', 'sub_title', 'base', 'method', 'package'));
    }


    public function update(Request $request, $id)
    {


        $input = $request->all();
        $rules = array(
            'package' => 'required',
            'amount' => 'required',
            'positions_in_fly' => 'required',
            'accounts_in_infinity' => 'required',
            'positions_in_infinity' => 'required',
            'payout' => 'required',
            // 'capping' => 'required',
            'special_wallet' => 'required',
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        } else {
            // (null !== $request->package ? Packages::where('app.theme_font_size',$request->theme_font_size) :  '' );
            $package = Packages::find($id);


            $package->package = $request->package;
            $package->amount = $request->amount;
            $package->positions_in_fly = $request->positions_in_fly;
            $package->accounts_in_infinity = $request->accounts_in_infinity;
            $package->positions_in_infinity = $request->positions_in_infinity;
            $package->payout = $request->payout;
            // $package->capping = $request->capping;
            $package->special_wallet = $request->special_wallet;

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
