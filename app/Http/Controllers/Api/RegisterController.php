<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Tree_Table;
use App\Sponsortree;
use App\PointTable;
use App\Commission;
use App\Packages;
use App\ProfileModel;
use App\PurchaseHistory;
use App\ProfileInfo;
use App\LeadershipBonus;
use App\RsHistory;
use App\Activity;
use DateTime;
use DB;
use Crypt;
use Validator;
use Response;
use File;
use App\Payout;
use App\Balance;
use App\Debit;
use App\UserDebit;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // print_r($request->all());
         $data = array();
        $data['reg_by']="free_join";
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['reg_type'] = $request->reg_type;
        $data['cpf'] = $request->cpf;
        $data['passport'] = $request->passport;
        $data['username'] = $request->username;
        $data['gender'] = $request->gender;
        $data['country'] = $request->country;
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['address'] = $request->address;
        $data['zip'] = $request->zip;
        $data['location'] = "";
        $data['password'] = $request->password;
        $data['sponsor'] = $request->sponsor;
        $data['placement'] = $request->placement;
        $data['package'] = 1;
        $data['leg'] = $request->leg;

        $messages = [
            'unique'    => 'The :attribute already existis in the system',
            'exists'    => 'The :attribute not found in the system',
           
        ];

        $validator = Validator::make($data, [
            'sponsor' => 'required|exists:users,username|max:255',
            'placement' => 'required|exists:users,username|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'username' => 'required|unique:users,username|alpha_num|max:255',
            'password' => 'required|alpha_num|min:6',
            'leg' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors());
        } else {
            $sponsor_id = User::checkUserAvailable($data['sponsor']);
            $placement_id = User::checkUserAvailable($data['placement']);
 
            if (!$sponsor_id) {
                return redirect()->back()->withErrors(['The username not exist']);
            }
             
       
            DB::beginTransaction();


            $userkey =User::createUserID();
     
            $userresult=User::create([
            'name' => $data['firstname'],
            'lastname' => $data['lastname'],
            'user_id' => $userkey,
            'mobile' => $data['phone'],
            'email' => $data['email'],
            'register_type' => $data['reg_type'],
            'username' => $data['username'],
            'rank_id' => '1',
            'register_by' => $data['reg_by'],
            'cpf' => $data['cpf'],
            'passport' => $data['passport'],
            'gender' => $data['gender'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'address1' => $data['address'],
            'zip' => $data['zip'],
            'location' => $data['location'],
            'package' => $data['package'],
            'password' => bcrypt($data['password'])
            ]);
        
       
            $sponsortreeid=Sponsortree::where('sponsor', $sponsor_id)->orderBy('id', 'desc')->take(1)->pluck('id');
       
            $sponsortree=Sponsortree::find($sponsortreeid);
            $sponsortree->user_id=$userresult->id;
            $sponsortree->sponsor=$sponsor_id;
            $sponsortree->type="no";
            $sponsortree->save();

            $sponsorvaccant = Sponsortree::createVaccant($sponsor_id, $sponsortree->position); // from tree table
            $uservaccant = Sponsortree::createVaccant($userresult->id, 0); // from tree table

            $placement_id = Tree_Table::getPlacementId($placement_id, $data['leg']); // from tree table
            $tree_id = Tree_Table::vaccantId($placement_id, $data['leg']); // from tree table
        
            $tree = Tree_Table::find($tree_id);
            $tree->user_id = $userresult->id;
            $tree->sponsor = $sponsor_id;
            $tree->type = 'no';
            $tree->save();


            Tree_Table::createVaccant($tree->user_id);

            PointTable::addPointTable($userresult->id);

            user::insertToBalance($userresult->id);
        
            user::addCredits($userresult->id);

            DB::commit();
        }

        return Response::json(['message'=>'succes','1000'=>'OK'])->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register(Request $request)
    {
        $requestdata = $request->all();
       
        $sponsor=$request->sponsor;

        $validator = Validator::make($request->all(), [
            
            'sponsor'      => 'exists:users,username',
            'placement_user'=> 'exists:users,username',
            'username'     => 'required|unique:users,username|alpha_num|max:255',
            'password'     => 'required|min:6',
            'leg'          =>'required',
            'package'      =>'required',
            'firstname'    => 'required|max:255',
            'lastname'     => 'required|max:255',
            'zip'          => 'required|max:255',
            'address'      => 'required|max:255',
            'city'         => 'required|max:255',
            'email'        => 'required|unique:users,email|email|max:255',
            'passport'     => 'required|max:255',
           'gender'     => 'required',
           
            
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()], 200);
        } else {
            if ($sponsor !=(null)) {
                $validator = Validator::make($request->all(), [
                 'sponsor' => 'exists:users,username',
                ]);

                if ($validator->fails()) {
                    return response()->json(['status'=>false,'message'=>$validator->errors()], 200);
                }
            } else {
                 $sponsor=User::find(1)->username;
            }
        
            $sponsor_id=User::where('username', $sponsor)->value('id');
            $placement_id =  $sponsor_id ;
            $transaction_pass=str_random(40);
            $confirmation_code=str_random(40);

            DB::beginTransaction();
            try {
                    $today= new DateTime();

                    $userresult = User::create([
                        'name'             => $requestdata['firstname'],
                        'lastname'         => $requestdata['lastname'],
                        'email'            => $requestdata['email'],
                        'username'         => $requestdata['username'],
                        'rank_id'          => '1',
                        'rank_update_date' => $today,
                        'register_by'      => 'free',
                        'cpf'              => null,
                        'transaction_pass' => $transaction_pass,
                        'password'         => bcrypt($requestdata['password']),
                        'confirmation_code'=> $confirmation_code,
                        
                        
                    ]);

                    $userProfile = ProfileModel::create([
                        'user_id'  => $userresult->id,
                        'city'     => $requestdata['city'],
                        'address1' => $requestdata['address'],
                        'zip'      => $requestdata['zip'],
                        'package'  => $requestdata['package'],
                        'passport'  => $requestdata['passport'],
                        'gender'  => $requestdata['gender'],
                    ]);
                    $userPackage = Packages::find($requestdata['package']);
                    $logined_user = $request->logined_user;
                    $login_id = User::where('username', $request->logined_user)->value('id');


                    PurchaseHistory::create([
                            'user_id'          => $userresult->id,
                            'purchase_user_id' => isset($login_id)?$login_id:$userresult->id,
                            'package_id'       => $requestdata['package'],
                            'pv'               => $userPackage->pv,
                            'count'            => 1,
                            'total_amount'     => $userPackage->amount,
                            'pay_by'           => 'api',
                            'sales_status'     => "yes",
                        ]);

                    $sponsortreeid = Sponsortree::where('sponsor', $sponsor_id)->where('type', 'vaccant')->orderBy('id', 'desc')->take(1)->value('id');
                       
                    $sponsortree          = Sponsortree::find($sponsortreeid);
                    $sponsortree->user_id = $userresult->id;
                    $sponsortree->sponsor = $sponsor_id;
                    $sponsortree->type    = "yes";
                    $sponsortree->save();
                    
                    $sponsorvaccant = Sponsortree::createVaccant($sponsor_id, $sponsortree->position);
                    $uservaccant = Sponsortree::createVaccant($userresult->id, 0);

                    $placement_id = Tree_Table::getPlacementId($placement_id, $requestdata['leg']);
                    $tree_id = Tree_Table::vaccantId($placement_id, $requestdata['leg']);
                    $tree          = Tree_Table::find($tree_id);
                    $tree->user_id = $userresult->id;
                    $tree->sponsor = $sponsor_id;
                    $tree->type    = 'yes';
                    $tree->save();

                    Tree_Table::getAllUpline($userresult->id);
                    PointTable::updatePoint($userPackage->pv, $userresult->id);
                    Commission::sponsor_commission($sponsor_id, $userresult->id, $userPackage->amount);
            
                    LeadershipBonus::allocateCommission($sponsor_id, Sponsortree::where('user_id', $sponsor_id)->value('sponsor'), $userPackage->pv / 10);
                    RsHistory::create([
                            'user_id'=>$userresult->id,
                            'from_id'=>$userresult->id,
                            'rs_credit'=>$userPackage->rs,
                    ]);

                    PointTable::addPointTable($userresult->id);
                    Tree_Table::createVaccant($tree->user_id);
          
                    $balanceupdate = User::insertToBalance($userresult->id);
                    
                    $userPackage = Packages::find($requestdata['package']);
                    $sponsorname = $sponsor;
                    $placement_username = User::find($placement_id)->username;
                    $legname = $requestdata['leg'] == "L" ? "Left" : "right";
            
                    Activity::add("Added user $userresult->username", "Added $userresult->username sponsor as $sponsorname and placement user as $placement_username in $legname Leg", $sponsor_id);

                    Activity::add("Joined as $userresult->username", "Joined in system as $userresult->username sponsor as $sponsorname and placement user as $placement_username in $legname Leg", $userresult->id);

                    Activity::add("Package purchased", "Purchased package - $userPackage->package ", $userresult->id);

                    DB::commit();
            } catch (Exception $e) {
                    DB::rollback();
                    return response()->json(['status'=>false,'message'=>failed], 200);
            }
            
         
            if (!$userresult) {
                return response()->json(['status'=>false,'message'=>"failed"], 200);
            } else {
                $user_id=$userresult->id;
                $preview =array();

                $preview['username']=$userresult->username;
                $preview['email']= $userresult->email;
                $preview['sponsor']= $sponsor;
                $preview['position']   = $requestdata['leg'];
                $preview['package'] =  $userPackage->package;
                $preview['firstname'] =   $userresult->firstname;
                $preview['lastname'] =   $userresult->lastname;
                $preview['gender'] =   $userProfile->gender;
                $preview['phone'] =  $userProfile->mobile;
                $preview['country'] =  $userProfile->country;
                $preview['zipcode'] =   $userProfile->zip;
                $preview['address'] =  $userProfile->address1;
                $preview['city'] =  $userProfile->city;

                $access_token = $userresult->createToken('registration')->accessToken;
                return response()->json(['status'=>true,'message'=>"success",'data'=>$preview,'access_token'=>$access_token], 200);
            }
        }
    }


    public function wallet_view(Request $request)
    {
  
        $validator = Validator::make($request->all(), [
           'username' => 'exists:users,username',
           ]);

        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()], 200);
        } else {
                $user_id=User::where('username', $request->username)->value('id');
                $user=User::find($user_id);
                $amount = 0;
                $users1 = array();
                $users2 = array();
                // echo $user_id;die();
                $users1 = Commission::select('commission.id', 'user.username', 'fromuser.username as fromuser', 'commission.payment_type', 'commission.user_id', 'commission.payable_amount', 'commission.created_at')
                    ->join('users as fromuser', 'fromuser.id', '=', 'commission.from_id')
                    ->join('users as user', 'user.id', '=', 'commission.user_id')
                    ->where('commission.user_id', '=', $user_id)
                    ->orderBy('commission.id', 'desc');
                $users2 = Payout::select('payout_request.id', 'users.username', 'users.username as fromuser', 'payout_request.status as payment_type', 'payout_request.user_id', 'payout_request.amount as payable_amount', 'payout_request.created_at')
                    ->join('users', 'users.id', '=', 'payout_request.user_id')
                    ->where('payout_request.user_id', '=', $user_id)
                    ->orderBy('payout_request.id', 'desc');

                $users3 = UserDebit::select('user_debit.id', 'fromuser.username as fromuser', 'user.username', 'user_debit.payment_type', 'user_debit.user_id', 'user_debit.debit_amount', 'user_debit.created_at')
                    ->join('users as fromuser', 'fromuser.id', '=', 'user_debit.from_id')
                    ->join('users as user', 'user.id', '=', 'user_debit.user_id')
                    ->where('user_debit.user_id', '=', $user_id)
                    ->orderBy('user_debit.id', 'desc');

                $ewallet_count = $users1->union($users2)->union($users3)->orderBy('created_at', 'DESC')->get()->count();
                $users = $users1->union($users2)->union($users3)->orderBy('created_at', 'DESC')

                    ->get();


                $wallet_view =array();
            foreach ($users as $key => $value) {
                $wallet_view[$key]['username']=$value->username;
                $wallet_view[$key]['amount_type']=$value->payment_type;
                    
                if ($value->payment_type == 'released') {
                    $wallet_view[$key]['from_user']='adminuser';
                } else {
                    $wallet_view[$key]['from_user']= $value->fromuser;
                }
                $wallet_view[$key]['credit_rm']=$value->payable_amount;
                $wallet_view[$key]['date']=$value->created_at;
            }
               
                $access_token = $user->createToken('e-wallet')->accessToken;
                return response()->json(['status'=>true,'message'=>"success",'data'=>$wallet_view], 200);
        }
    }
    public function profileUpdate(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'username'            => 'exists:users,username',

         ]);
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()], 200);
        } else {
            $user_id =User::where('username', $request->username)->value('id');
            $user=User::find($user_id);
            $user->name=$request->name;
            $user->lastname=$request->lastname;
            $user->email=$request->email;
            $user->save();

            $new_user=ProfileInfo::find(ProfileInfo::where('user_id', $user_id)->value('id'));
            
            $new_user->gender=$request->gender;
            $new_user->country=$request->country;
            $new_user->state=$request->state;
            $new_user->city=$request->city;
            $new_user->zip=$request->zip;
            $new_user->address1=$request->address1;
            $new_user->address2=$request->address2;
            $new_user->mobile=$request->mobile;
            $new_user->wechat=$request->wechat;
            $new_user->passport=$request->passport;
            $new_user->account_number=$request->account_number;
            $new_user->account_holder_name=$request->account_holder_name;
            $new_user->swift=$request->swift;
            $new_user->bank_code=$request->bank_code;
            $new_user->paypal=$request->paypal;
            $new_user->btc_wallet=$request->btc_wallet;

            if ($request->image) {
                    $image=$request->image;
                    $destinationPath = base_path().'/storage/files/images';
                    $image = str_replace('data:image/png;base64,', '', $image);
                    $image = str_replace(' ', '+', $image);
                    $extension       = 'png';
                    $fileName        = rand(000011111, 99999999999) . '.' . $extension;
                    File::put($destinationPath.'/'.$fileName, base64_decode($image));
                    $new_user->image=$fileName;
                    $new_user->profile=$fileName;
            }
            if ($request->cover) {
                   $cover=$request->cover;
                   $destinationPath = base_path().'/storage/files/images';
                   $cover = str_replace('data:image/png;base64,', '', $cover);
                   $cover = str_replace(' ', '+', $cover);
                   $extension       = 'png';
                   $fileName        = rand(000011111, 99999999999) . '.' . $extension;
                   File::put($destinationPath.'/'.$fileName, base64_decode($cover));
                   $new_user->cover=$fileName;
                   $new_user->cover=$fileName;
            }
            // dd($new_user->profile);
            $new_user->save();

            $data['firstname']=$user->name;
            $data['lastname']=$user->lastname;
            $data['email']=$user->email;
            $data['mobile']=$new_user->mobile;
            $data['country']=$new_user->country;
            $data['image']=url('img/cache/profile', $new_user->profile)  ;
            $data['cover']=url('img/cache/profile', $new_user->cover)  ;

            $access_token=$user->createToken('profile update')->accessToken;
            return response()->json(['status'=>true,'message'=>"Success",'data'=>$data], 200);
        }
    }

    public function passwordUpdate(Request $request)
    {

        $username = $request->username;
        $password = $request->password;
        $passwordConfirmation = $request->password_confirmation;
        $user_id =User::where('username', $username)->value('id');
        if (is_null($user_id)) {
            return Response::json(['status'=>false,'message'=>"failed"], 200);
        } else {
            $user = User::find($user_id);
            $validator = Validator::make($request->all(), [
                        'username'            => 'exists:users',
                        'password'            => 'required|min:6',
                        'passwordConfirmation'=> 'required_with:password|same:password|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json(['status'=>false,'message'=>$validator->errors()], 200);
            } else {
                $user->password = bcrypt($password);
                User::where('id', $user_id)->update(['password' => $user->password ]);
                
                return response()->json(['status'=>true,'message'=>"Success"], 200);
            }
        }
    }
}
