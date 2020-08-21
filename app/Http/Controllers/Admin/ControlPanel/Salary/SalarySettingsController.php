<?php

namespace App\Http\Controllers\admin\ControlPanel\Salary;

use Illuminate\Http\Request;
use App\Models\ControlPanel\Options;
use App\Http\Controllers\Admin\AdminController;
use App\SalarySetting;
use Session;



class SalarySettingsController extends AdminController
{


    public function index()
    {
        $title     = trans('all.salary_settings');
        $sub_title = trans('all.salary_settings');
        $base      = trans('all.salary_settings');
        $method    = trans('all.salary_settings');
        
        $settings  = SalarySetting::all();
// dd($settings);

        return view('app.admin.control_panel.salary.index', compact('title', 'sub_title', 'base', 'method', 'settings'));
    }

    public function update(Request $request)
    {

    // dd($request->all());
       
        foreach ($request->all() as $cloumn_name => $value_array) {
            if (is_array($value_array)) {
                foreach ($value_array as $key => $value) {
                    SalarySetting::updateSalarySetting($cloumn_name, $key, $value);
                }
            }
        }

       

        Session::flash('flash_notification', array('level' => 'success', 'message' => trans('all.successfully_updated_salary!')));
        return redirect()->back();
    }
}
