<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\Config\Repository;
use App\ProfileInfo;
use Auth;
use View;
use App\Mail;
use App\AppSettings;
use App\Settings;
use App\Models\ControlPanel\Options;
use Cache;
use Validator;
use CountryState;
use App\Activity;
use App\Ranksetting;
use App\Packages;
use App\Currency;
use App\PaymentGatewayDetails;
use App\Tree_Table;
use App\SystemLanguages;
use Larinfo;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

          

        Schema::defaultStringLength(191);

        
        
        // if (Schema::hasTable('system_languages')) {

            // dd('ddd');
            // $default_lang=SystemLanguages::where('default', 'yes')->first();
            // if ($default_lang == null) {
            //     $default_lang=SystemLanguages::where('locale', 'en')->first();
            // }

            // $this->app['config']->set('app.locale', $default_lang->locale);
             
            // $enabled_lang=SystemLanguages::where('status', 'yes')->pluck('locale', 'locale');
            // $this->app['config']->set('languages', $enabled_lang);
            // Config::set('languages', $enabled_lang->toArray()); 
        // }


        view()->composer(['no-layout'], function ($view) {
           
            $app = AppSettings::find(1);
            $options = Options::find(1);
            $theme_skin_class = 'theme_skin_'.option('app.theme_skin');
            $theme_font_size = option('app.theme_font_size');
             $gtag_value = option('app.gtag_value');

            
            $view
            ->with('app', $app)
            ->with('logo_light', option('app.logo_light'))
            ->with('logo_dark', option('app.logo_dark'))
            ->with('logo_icon_light', option('app.logo_icon_light'))
            ->with('logo_icon_dark', option('app.logo_icon_dark'))
            ->with('theme_skin_class', $theme_skin_class)
            ->with('gtag', $gtag_value)
            ->with('theme_font_size', $theme_font_size);
        });

        view()->composer(['layouts.auth'], function ($view) {
            $result= PaymentGatewayDetails::find(1);
            $this->app['config']->set('rave.publicKey', $result->rave_public_key);
            $this->app['config']->set('rave.secretKey', $result->rave_secret_key);

 

         
            $app = AppSettings::find(1);
            $options = Options::find(1);
            $theme_skin_class = 'theme_skin_'.option('app.theme_skin');
            $theme_font_size = option('app.theme_font_size');
             $gtag_value = option('app.gtag_value');
            $view
            ->with('app', $app)
            ->with('logo_light', option('app.logo_light'))
            ->with('logo_dark', option('app.logo_dark'))
            ->with('logo_icon_light', option('app.logo_icon_light'))
            ->with('logo_icon_dark', option('app.logo_icon_dark'))
            ->with('theme_skin_class', $theme_skin_class)
            ->with('gtag', $gtag_value)
            ->with('theme_font_size', $theme_font_size)
            ;
        });

        view()->composer(['site-*.base'], function ($view) {
            $app = AppSettings::find(1);
            $options = Options::find(1);
            $theme_skin_class = 'theme_skin_'.option('app.theme_skin');
            $theme_font_size = option('app.theme_font_size');
             $gtag_value = option('app.gtag_value');
            $view
            ->with('app', $app)
            ->with('logo_light', option('app.logo_light'))
            ->with('logo_dark', option('app.logo_dark'))
            ->with('logo_icon_light', option('app.logo_icon_light'))
            ->with('logo_icon_dark', option('app.logo_icon_dark'))
            ->with('theme_skin_class', $theme_skin_class)
            ->with('gtag', $gtag_value)
            ->with('theme_font_size', $theme_font_size);
        });



        view()->composer(['app.admin*'], function ($view) {
             $result= PaymentGatewayDetails::find(1);
             // dd($default_lang);
            $this->app['config']->set('rave.publicKey', $result->rave_public_key);
            $this->app['config']->set('rave.secretKey', $result->rave_secret_key);
            
            



             $gtag_value = option('app.gtag_value');

            

            $user = \App\User::with(['profile_info', 'profile_info.package_detail', 'sponsor_tree', 'tree_table', 'purchase_history.package'])->find(Auth::id());
            // dd($user->profile_info);
            $presence = \App\User::isOnline(\Auth::id());
            if ($presence == null) {
                $presence = "false";
            }
            // $profile = $user->profile_info;
            
            //$profile = ProfileInfo::where('user_id',2)->get();

            $image =  $user->profile_info->profile;
            // dd($image);
            if ($image) {
                if ($image == 1) {
                    $image = 'avatar-big.png';
                }
            }
            $logo=Appsettings::all();
            $logoimg=$logo->first()->logo;
            if ($logoimg) {
                if ($logoimg == 1) {
                    $logoimg = 'logo.png';
                }
            }

            $user_registration = option('app.user_registration');
            $unread_count = Mail::unreadMailCount(Auth::id());
            $unread_mail = Mail::unreadMail(Auth::id());
            $app = AppSettings::find(1);
            $options = Options::find(1);

            $primary_menu = option('app.primary_menu_items');

            $primary_menu_items = json_decode($primary_menu);
            $voucher_user_request = option('app.voucher_user_request');
            $voucher_admin_approval = option('app.voucher_admin_approval');

            
            $theme_skin_class = 'theme_skin_'.option('app.theme_skin');
            $theme_font_size = option('app.theme_font_size');
            // $activities = Activity::with('user')->where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(5);

            $activities = Activity::with('user')->where('user_id', Auth::id())->paginate(5);
          
            
            $view
            ->with('user', $user)
            ->with('presence', $presence)
            ->with('profile', $user->profile_info->profile)
            ->with('unread_count', $unread_count)
            ->with('unread_mail', $unread_mail)
            ->with('app', $app)
            ->with('options', $options)


            ->with('logo_light', option('app.logo_light'))
            ->with('logo_dark', option('app.logo_dark'))
            ->with('logo_icon_light', option('app.logo_icon_light'))
            ->with('logo_icon_dark', option('app.logo_icon_dark'))
            ->with('cookie_prefix', option('app.cookie_prefix'))
            ->with('idle_timeout', option('app.idle_timeout'))
            ->with('idle_timeout_delay', option('app.idle_timeout_delay'))
            ->with('theme_skin_class', $theme_skin_class)
            ->with('theme_font_size', $theme_font_size)
            ->with('primary_menu_items', $primary_menu_items)
            ->with('image', $image)
            ->with('logoimage', $logoimg)
            ->with('user_registration', $user_registration)
            ->with('gtag', $gtag_value)
            ->with('voucher_user_request', $voucher_user_request)
            ->with('voucher_admin_approval', $voucher_admin_approval)
            ->with('activities', $activities);
        });


        view()->composer(['app.admin.control_panel*'], function ($view) {
        

            $software_informations = collect(Larinfo::getServerInfoSoftware());
            $hardware_informations =  collect(Larinfo::getServerInfoHardware());
            $total_memory = $hardware_informations['ram']['total'];
            $free_memory = $hardware_informations['ram']['free'];
            $ram_free_percentage = ($free_memory / $total_memory) * 100;
            $ram_used_percentage = 100 - $ram_free_percentage;
            $ram_used_percentage_bg_class= 'bg-success';
            if ($ram_used_percentage > 90) {
                $ram_used_percentage_bg_class= 'bg-warning';
            }

            $total_disk =  $hardware_informations['disk']['total'];
            $free_disk = $hardware_informations['disk']['free'];
            $disk_percentage = ($free_disk / $total_disk) * 100;
            $disk_free_percentage = ($free_disk / $total_disk) * 100;
            $disk_used_percentage = 100 - $disk_free_percentage;

            $disk_used_percentage_bg_class= 'bg-success';
            if ($disk_used_percentage > 90) {
                $disk_used_percentage_bg_class= 'bg-warning';
            }

            $database_informations =collect(Larinfo::getDatabaseInfo());
            $uptime_informations = collect(Larinfo::getUptime());



            $view
           
            ->with('software_informations', $software_informations)
            ->with('hardware_informations', $hardware_informations)
            ->with('ram_used_percentage', $ram_used_percentage)
            ->with('ram_used_percentage_bg_class', $ram_used_percentage_bg_class)
            ->with('disk_used_percentage', $disk_used_percentage)
            ->with('disk_used_percentage_bg_class', $disk_used_percentage_bg_class)
            ->with('database_informations', $database_informations)
            ->with('uptime_informations', $uptime_informations);
        });


        view()->composer(['app.admin.tree*'], function ($view) {
            
                    
            $tree_images_option = option('app.tree_images_option');
            $tree_grid_option = option('app.tree_grid_option');
            $tree_map_option = option('app.tree_map_option');
            $tree_zooming_option = option('app.tree_zooming_option');
            $tree_pan_option = option('app.tree_pan_option');
            $tree_more_details_option = option('app.tree_more_details_option');
       
            $tree_images_show_option = option('app.tree_images_show_option');
            $tree_grid_show_option = option('app.tree_grid_show_option');
            $tree_map_show_option = option('app.tree_map_show_option');
            $tree_zooming_show_option = option('app.tree_zooming_show_option');
            $tree_pan_show_option = option('app.tree_pan_show_option');
            $tree_more_details_show_option = option('app.tree_more_details_show_option');

       
                
            $view
            ->with('tree_images_option', option('app.tree_images_option'))
            ->with('tree_grid_option', option('app.tree_grid_option'))
            ->with('tree_map_option', option('app.tree_map_option'))
            ->with('tree_zooming_option', option('app.tree_zooming_option'))
            ->with('tree_pan_option', option('app.tree_pan_option'))
            ->with('tree_more_details_option', option('app.tree_more_details_option'))

            ->with('tree_images_show_option', option('app.tree_images_show_option'))
            ->with('tree_grid_show_option', option('app.tree_grid_show_option'))
            ->with('tree_map_show_option', option('app.tree_map_show_option'))
            ->with('tree_zooming_show_option', option('app.tree_zooming_show_option'))
            ->with('tree_pan_show_option', option('app.tree_pan_show_option'))
            ->with('tree_more_details_show_option', option('app.tree_more_details_show_option'));
        });





        view()->composer(['app.user*'], function ($view) {
            
            $result= PaymentGatewayDetails::find(1);
            $this->app['config']->set('rave.publicKey', $result->rave_public_key);
            $this->app['config']->set('rave.secretKey', $result->rave_secret_key);
            

           


             $gtag_value = option('app.gtag_value');
             
            $GLOBAL_USERRANK= Ranksetting::where('id', Auth::user()->rank_id)->value('rank_name');

            // dd();

            $GLOBAL_PACAKGE= Packages::where('id', Auth::user()->purchase_history->pluck('package_id')->first())->value('package');
            ;
            // dd($GLOBAL_PACAKGE);
            $USER_CURRENCY= Currency::find(ProfileInfo::where('user_id', '=', Auth::user()->id)->value('currency'));
            $GLOBAL_RANK= Ranksetting::where('id', Auth::user()->rank_id)->value('rank_name');
            ;

            $active = Tree_Table::where('user_id', Auth::user()->id)->value('type');
            if ($active == 'no' && Auth::user()->monthly_maintenance == 1) {
                $GLOBAL_PACAKGE = 'Inactive' ;
            } elseif ($active == 'no' && Auth::user()->monthly_maintenance == 0) {
                $GLOBAL_PACAKGE = 'Non-Maintain' ;
            }

            $user = \App\User::with(['profile_info', 'profile_info.package_detail', 'sponsor_tree', 'tree_table', 'purchase_history.package'])->find(Auth::id());
            
            // dd($GLOBAL_PACAKGE);
            //
            // $user = \App\User::find(Auth::id());
            
            $presence = \App\User::isOnline(\Auth::id());
            if ($presence == null) {
                $presence = "false";
            }
            $profile = ProfileInfo::where('user_id', Auth::id())->get();
            $image =  $profile->first()->profile;
            $unread_count = Mail::unreadMailCount(Auth::id());
            $unread_mail = Mail::unreadMail(Auth::id());
            $app = AppSettings::find(1);
            $options = Options::find(1);
            $theme_skin_class = 'theme_skin_'.option('app.theme_skin');
            $theme_font_size = option('app.theme_font_size');
            $activities = Activity::with('user')->where('user_id', Auth::id())->get();
             $logo=Appsettings::all();
            $logoimg=$logo->first()->logo;
             $voucher_user_request = option('app.voucher_user_request');
            $voucher_admin_approval = option('app.voucher_admin_approval');
            if ($logoimg) {
                if ($logoimg == 1) {
                    $logoimg = 'logo.png';
                }
            }
            $user_registration = option('app.user_registration');
            // dd($activities);
            $view
            ->with('user', $user)
            ->with('presence', $presence)
            ->with('profile', $profile)
            ->with('unread_count', $unread_count)
            ->with('unread_mail', $unread_mail)
            ->with('app', $app)
            ->with('logo_light', option('app.logo_light'))
            ->with('logo_dark', option('app.logo_dark'))
            ->with('logo_icon_light', option('app.logo_icon_light'))
            ->with('logo_icon_dark', option('app.logo_icon_dark'))
            ->with('logo_icon_dark', option('app.cookie_prefix'))
            ->with('idle_timeout', option('app.idle_timeout'))
            ->with('idle_timeout_delay', option('app.idle_timeout_delay'))
            ->with('theme_skin_class', $theme_skin_class)
            ->with('theme_font_size', $theme_font_size)
            ->with('image', $image)
            ->with('activities', $activities)
            ->with('GLOBAL_USERRANK', $GLOBAL_USERRANK)
            ->with('GLOBAL_PACAKGE', $GLOBAL_PACAKGE)
            ->with('USER_CURRENCY', $USER_CURRENCY)
            ->with('logoimage', $logoimg)
            ->with('user_registration', $user_registration)
            ->with('gtag', $gtag_value)
             ->with('voucher_user_request', $voucher_user_request)
            ->with('voucher_admin_approval', $voucher_admin_approval)
            ->with('GLOBAL_RANK', $GLOBAL_RANK);
        });

        view()->composer(['auth.login'], function ($view) {
            $logo=Appsettings::all();
            $logoimg=$logo->first()->logo_ico;
            if ($logoimg) {
                if ($logoimg == 1) {
                    $logoimg = 'logo.png';
                }
            }
            $view
                 ->with('logoimage', $logoimg)
                 ->with('logo_light', option('app.logo_light'));
        });


        view()->composer(['app.user.tree*'], function ($view) {
            
                    
            $tree_images_option = option('app.tree_images_option');
            $tree_grid_option = option('app.tree_grid_option');
            $tree_map_option = option('app.tree_map_option');
            $tree_zooming_option = option('app.tree_zooming_option');
            $tree_pan_option = option('app.tree_pan_option');
            $tree_more_details_option = option('app.tree_more_details_option');
       
            $tree_images_show_option = option('app.tree_images_show_option');
            $tree_grid_show_option = option('app.tree_grid_show_option');
            $tree_map_show_option = option('app.tree_map_show_option');
            $tree_zooming_show_option = option('app.tree_zooming_show_option');
            $tree_pan_show_option = option('app.tree_pan_show_option');
            $tree_more_details_show_option = option('app.tree_more_details_show_option');

       
                
            $view
            ->with('tree_images_option', option('app.tree_images_option'))
            ->with('tree_grid_option', option('app.tree_grid_option'))
            ->with('tree_map_option', option('app.tree_map_option'))
            ->with('tree_zooming_option', option('app.tree_zooming_option'))
            ->with('tree_pan_option', option('app.tree_pan_option'))
            ->with('tree_more_details_option', option('app.tree_more_details_option'))

            ->with('tree_images_show_option', option('app.tree_images_show_option'))
            ->with('tree_grid_show_option', option('app.tree_grid_show_option'))
            ->with('tree_map_show_option', option('app.tree_map_show_option'))
            ->with('tree_zooming_show_option', option('app.tree_zooming_show_option'))
            ->with('tree_pan_show_option', option('app.tree_pan_show_option'))
            ->with('tree_more_details_show_option', option('app.tree_more_details_show_option'));
        });



      
            

            // View::share('GLOBAL_PACAKGE', '');
            // View::share('unread_count',  $unread_count);
            // View::share('unread_mail',  $unread_mail);
            // View::share('logo',  $app->logo);
            // View::share('logo_ico',  $app->logo_ico);
            // View::share('company_name',  $app->company_name);

            
            // View::share('image',  $profile->first()->image);
            // View::share('currentuser',  $currentuser);
            // View::share('user',  $user);
            // View::share('presence',  $presence);
            // View::share('activities',  $activities);
            // View::share('theme',  $app->theme);
            // View::share('theme',  $app->theme);

       


        
        Validator::extend('country', function ($attribute, $value, $parameters, $validator) {
            if (!empty($value)) {
                $countries = collect(CountryState::getCountries());
                $flipped = $countries->flip();
                if ($flipped->contains($value) === true) {
                    return true;
                }
            }
            return false;
        });


        //ASLAM STOPPED FURTHER VALIDATION HOOKS BECAUSE THERE MIGHT NOT BE NEEDING TO VERIFY THE STATE CUZ SOMETIMES VALUE MIGHT NOT BE THERE
        
        // Validator::extend('state', function($attribute, $value, $parameters, $validator) {

        //     if(!empty($value) && !empty($parameters)){
        //         $country = collect($parameters);

        //         $states = collect(CountryState::getStates($country->first()));
        //         if($states->isEmpty() === false){
        //             dd($states);
        //             dd('country got state');
        //         }
        //     }else{
        //         // dd('maybe no states');
        //         return true;
        //     }
        //     return false;
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
