<?php
namespace App\Http\Controllers\admin\ControlPanel\Commission;

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
use App\User;
use App\Welcome;
use App\Packages;
use App\BinaryCommissionSettings;
use App\LevelCommissionSettings;
use App\LevelSettingsTable;
use App\SponsorCommission;
use App\MatchingBonus;
use App\SignupBonusSettings;
use Auth;
use Illuminate\Http\Request;
use Input;
use Redirect;
use Response;
use Session;
use Larinfo;
use Validator;

class CommissionControlPanelController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   

    public function index()
    {

        $title     = trans('controlpanel.commission_settings');
        $sub_title = trans('controlpanel.commission_settings');
        $base      = trans('controlpanel.commission_settings');
        $method    = trans('controlpanel.commission_settings');
        $binary_commission=BinaryCommissionSettings::find(1);
        // dd($level_commission);
        $type=$binary_commission->type;
        $packages=Packages::all();
        $pack_det=json_decode($binary_commission->pair_commission);
        $percent_det=json_decode($binary_commission->pair_commission_percent);
        $binary_cap=$binary_commission->binary_cap;
      
      
        $level_commission=LevelCommissionSettings::find(1);
        $level_settings=LevelSettingsTable::join('packages', 'packages.id', '=', 'level_settings.package')->select('level_settings.*', 'packages.package')->get();
        $criteria=$level_commission->criteria;

        $sponsor_commission=SponsorCommission::find(1);
        $spon_criteria=$sponsor_commission->criteria;

        $matching_bonus=MatchingBonus::find(1);
        $matching_criteria=$matching_bonus->criteria;

        return view('app.admin.control_panel.commission.index', compact('title', 'sub_title', 'base', 'method', 'packages', 'binary_commission', 'type', 'pack_det', 'percent_det', 'binary_cap', 'level_commission', 'level_settings', 'criteria', 'spon_criteria', 'sponsor_commission', 'matching_bonus', 'matching_criteria'));
    }




    public function binaryupdate(Request $request)
    {


        if ($request->type == 'fixed') {
            if ($request->pair_value == null || (in_array(null, $request->pair_commission))) {
                 Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_pair_commission!')));
                 return redirect()->back();
            }
        }

        if (isset($request->check)) {
            if ($request->check == 'true') {
                if ($request->ceiling == null) {
                    Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_ceiling!')));
                    return redirect()->back();
                }
            }
        }

        if ($request->type == 'percentage') {
            if ((in_array(null, $request->percent_commission))) {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_percent_commission')));
                return redirect()->back();
            }
        }

        $binary_commission=BinaryCommissionSettings::find(1);
        $binary_commission->period=$request->period;
        $binary_commission->type=$request->type;
        $binary_commission->pair_value=$request->pair_value;
        $binary_commission->pair_commission=json_encode($request->pair_commission);
        $binary_commission->pair_commission_percent=json_encode($request->percent_commission);
        if (isset($request->check)) {
            if ($request->check == 'true') {
                 $binary_commission->binary_cap='yes';
            } else {
                $binary_commission->binary_cap='no';
            }
        }

       
        $binary_commission->ceiling=$request->ceiling;
        $binary_commission->save();
        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('all.binary_details_updated_successfully!')));
        return redirect()->back();
    }
    public function levelcommissionupdate(Request $request)
    {
      dd($request->all());

        if ($request->criteria == "yes") {
            if ((in_array(null, $request->levelpack1)) || (in_array(null, $request->levelpack2)) || (in_array(null, $request->levelpack3))) {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_level_commission!')));
                return redirect()->back();
            }
        }

        if ($request->criteria == "no") {
            if ($request->levelno1 == null || $request->levelno2 == null || $request->levelno3 == null) {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_level_commission!')));
                return redirect()->back();
            }
        }

        // $packages=Packages::pluck('id');
        // foreach ($packages as $key => $package) {
        //     LevelSettingsTable::where('package', $package)->update(['commission_level1' =>$request->levelpack1[$key]]);
        //     LevelSettingsTable::where('package', $package)->update(['commission_level2' =>$request->levelpack2[$key]]);
        //     LevelSettingsTable::where('package', $package)->update(['commission_level3' =>$request->levelpack3[$key]]);
        // }

        $level_commission=LevelCommissionSettings::find(1);
        $level_commission->type=$request->type;
        $level_commission->criteria=$request->criteria;
        $level_commission->nlevel_1=$request->levelno1;
        $level_commission->nlevel_2=$request->levelno2;
        $level_commission->nlevel_3=$request->levelno3;
        $level_commission->period=$request->period;
        $level_commission->save();
        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('all.details_saved_successfully!')));
        return redirect()->back();
    }

    public function sponsorcommissionupdate(Request $request)
    {

        // dd($request->all());
        if ($request->sponcriteria == "yes") {
            if ((in_array(null, $request->sponsor_comm))) {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_sponsor_commission!')));
                return redirect()->back();
            }
        }

        if ($request->sponcriteria == "no") {
            if ($request->sponsor_commission == null) {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_sponsor_commission!')));
                return redirect()->back();
            }
        }

        $spon_comm=SponsorCommission::find(1);
        $spon_comm->type=$request->period;
        $spon_comm->criteria=1;
        $spon_comm->sponsor_commission=1;
        $spon_comm->period=$request->period;
        $spon_comm->save();
        // $packages=Packages::pluck('id');
        // foreach ($packages as $key => $package) {
        //     LevelSettingsTable::where('package', $package)->update(['sponsor_comm' =>$request->sponsor_comm[$key]]);
        // }
        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('all.bsponsor_commission_details_updated_successfully!')));
        return redirect()->back();
    }

    public function matchingbonusupdate(Request $request)
    {
      // dd($request->all());
          if ($request->type == 'fixed') {
            if ($request->pair_value == null || (in_array(null, $request->pair_commission))) {
                 Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_pair_commission!')));
                 return redirect()->back();
            }
        }

        if (isset($request->check)) {
            if ($request->check == 'true') {
                if ($request->ceiling == null) {
                    Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_ceiling!')));
                    return redirect()->back();
                }
            }
        }

        if ($request->type == 'percentage') {
            if ((in_array(null, $request->percent_commission))) {
                Session::flash('flash_notification', array('level' => 'error', 'message' => trans('all.please_enter_each_percent_commission')));
                return redirect()->back();
            }
        }

        $binary_commission=SignupBonusSettings::find(1);
        $binary_commission->period=$request->period;
        $binary_commission->type=$request->type;
        $binary_commission->pair_value=$request->pair_value;
        $binary_commission->pair_commission=json_encode($request->pair_commission);
        $binary_commission->pair_commission_percent=json_encode($request->percent_commission);
        if (isset($request->check)) {
            if ($request->check == 'true') {
                 $binary_commission->binary_cap='yes';
            } else {
                $binary_commission->binary_cap='no';
            }
        }

       
        $binary_commission->ceiling=$request->ceiling;
        $binary_commission->save();
        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('SignupBonusSettings Updated !')));
        return redirect()->back();
    }
}
