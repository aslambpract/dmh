<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\AppSettings;

use App\Settings;

use App\User;



// use Request;

use View;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use Socialite;



class LoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */



    use AuthenticatesUsers;



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/home';



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        

        $policy =Settings::find(1);

        $this->middleware('guest')->except('logout');

        $app = AppSettings::find(1);

        View::share('logo', $app->logo);

        View::share('logo_ico', $app->logo_ico);

        View::share('policy', $policy);



 

         $this->redirectTo  = ('dashboard' == option('app.system_redirect_login') ? '/user/dashboard' :  '/home' );

        if (\Request::get('redirectPath')) {

              $this->redirectTo = Request::get('redirectPath');

        }



        // dd( $this->redirectTo);

    }







    public function authenticated(Request $request, $user)

    {



       // if($user->approved == 0)

       //  {



       //    Session::flash('flash_notification', array( 'message' => 'Please Upload an Id proof Here and wait for approval'));



       //  }





       // if($user->status == "rejected")

       //  {



       //    Session::flash('flash_notification', array( 'message' => 'Sorry Your are blocked by the admin, Please contact administrator or Upload valid Id proof'));



       //  }

       

        // if ($user->active == 'no') {

        //     auth()->logout();



        //         Session::flash('flash_notification', array('level' => 'error', 'message' => 'Sorry Your are not active, Please contact administrator.'));



        //     return back()->with('error', 'Sorry Your are not active, Please contact administrator');

        // }

        



 
      

            return redirect()->intended($this->redirectPath());

        

    }











    /**

     * Get the login username to be used by the controller.

     *

     * @return string

     */

    public function username()

    {

        return property_exists($this, 'username') ? $this->username : 'username';

    }



    public function sociallogin($driver = 'facebook')

    {



        



                   echo Socialite::driver($driver)->redirect();

    }

    public function socialcallback(Request $request)

    {



            $user = Socialite::driver('facebook')->user() ;



            dd($user) ;

    }

}

