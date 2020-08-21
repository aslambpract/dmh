<?php

namespace App\Http\Controllers\Admin;

use App\Commission;
use App\Http\Controllers\Admin\AdminController;
use App\PackageHistory;
use App\Packages;
use App\PointTable;
use App\Product;
use App\Products;
use App\PurchaseHistory;
use App\Sponsortree;
use App\Tree_Table;
use App\User;
use App\Orderproduct;
use App\Category;
use App\Order;
use App\AppSettings;
use App\Shippingaddress;
use App\Ranksetting;
use App\PendingCommission1;
use App\SponsorCommission;
use App\PendingBinaryCommission;
use App\Balance;
use App\SponsorCommissionPending;

use Auth;
use DB;
use Illuminate\Http\Request;
use Response;
use Session;
use Input;
use DataTables;
use Redirect;

// use App\Http\Controllers\Admin\DB;

use Validator;

class OnlineStoreController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title     = trans('products.online_store');
        $sub_title = trans('products.online_store');
        $base      = trans('products.online_store');
        $method    = trans('products.online_store');
        
        $orders = Order::select('order.invoice_id as invoice', 'users.username', 'shoppingaddress.country as shipping_country', 'order.total_amount', 'shoppingaddress.status', 'order.created_at')
         ->join('users', 'users.id', '=', 'order.user_id')
         ->join('shoppingaddress', 'shoppingaddress.order_id', '=', 'order.id')
         ->orderBy('order.created_at', 'desc')
         ->get(5);
         
         $oders_count = Order::count();
         $total_sale  = Order::sum('total_amount');
         $weekly_sale_count = Order::whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-7 days')))->count();
         $monthly_sale_count = Order::whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 month')))->count();
         $yearly_sale_count = Order::whereDate('created_at', '>=', date('Y-m-d H:i:s', strtotime('-1 year')))->count();

         $pending_orders = Order::where('status', '=', 'Pending')->count();
         $total_products=Product::all();
         $count_product=count($total_products);
        

   


        return view('app.admin.online_store.dashboard_online_store', compact('title', 'sub_title', 'base', 'method', 'orders', 'oders_count', 'total_sale', 'weekly_sale_count', 'yearly_sale_count', 'monthly_sale_count', 'pending_orders', 'count_product'));
    }

    public function getCategoryJson()
    {


        $graph=array();
        $category=Category::select('id', 'category_name')->get();
      
        $i=0;
        foreach ($category as $key => $value) {
            $count = Orderproduct::join('product', 'product.id', '=', 'orderproduct.product_id')
             ->join('category', 'category.id', '=', 'product.category_id')
             -> where('category.id', '=', $value->id)
             ->sum('orderproduct.count');
            $graph[$i]['value']= $count;
            $graph[$i]['name']=$value->category_name;
            $i++;
        }
       
        return response()->json($graph);
    }

    public function getSaleJson()
    {
          


          $duration = strtotime('-365 days');
          $graph = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as    value'))
          ->whereDate('created_at', '>=', date('Y-m-d H:i:s', $duration))
          ->orderBy('date', 'asc')
          ->groupBy('date')
          // ->take(15)
          ->get();
          return response()->json($graph);
    }

    public function salesdet()
    {

        $title     = trans('products.sales');
        $sub_title =  trans('products.sales');
        $base      = trans('products.sales');
        $method    = trans('products.sales');
      
                
        return view('app.admin.online_store.sales', compact('title', 'base', 'method', 'sub_title'));
    }


    public function salesrecord()
    {

   
        $users = Order::join('orderproduct', 'orderproduct.order_id', '=', 'order.id')
                ->join('product', 'orderproduct.product_id', '=', 'product.id')
                ->join('users', 'users.id', '=', 'order.user_id')
                ->join('shoppingaddress', 'shoppingaddress.id', '=', 'order.shipping_id')
                ->where('order.approved_status','!=','approved')
                ->where('order.approved_status','!=','rejected')
                ->select('order.id', 'order.invoice_id', 'users.username', 'shoppingaddress.option_type', 'shoppingaddress.fname', 'shoppingaddress.lname', 'shoppingaddress.address', 'shoppingaddress.city', 'shoppingaddress.state', 'shoppingaddress.pincode', 'shoppingaddress.email', 'shoppingaddress.country', 'shoppingaddress.contact', 'order.total_count', 'order.total_amount', 'orderproduct.created_at')
                ->groupBy('order.id')
                ->orderby('order.id', 'asc')
                ->get();

        $count_users=count($users);

            return DataTables::of($users)
             ->editColumn('invoice', '<a href="{{{ URL::to(\'admin/invoice/\' . $id  ) }}}" class="btn btn-primary" title="Invoice"><i class="icon-file-eye2" aria-hidden="true"></i></a>')
              ->editColumn('approve', '<a href="{{{ URL::to(\'admin/approve_orders/\' . $id  ) }}}" class="btn btn-success" title="Approve"><i class="icon-checkmark" aria-hidden="true"></i></a>')
               ->editColumn('reject', '<a href="{{{ URL::to(\'admin/reject_orders/\' . $id  ) }}}" class="btn btn-danger" title="Reject"><i class="icon-trash" aria-hidden="true"></i></a>')
            ->removeColumn('id')
            ->setTotalRecords($count_users)
            ->escapeColumns([])
            ->make();
    }

    public function viewmore($id)
    {
 
        $title=trans('products.view_order');
        $base=trans('products.view_order');
        $method=trans('products.view_order');
        $sub_title=trans('products.view_order');
        $company=AppSettings::find(1);
        $user=shippingaddress::where('id', '=', $id)->first();
        $invoice_ids=$user->order_id;
        $invoice=order::where('id', $invoice_ids)->value('invoice_id');
        // dd($user);
        $products = order::where('order.id', '=', $invoice_ids)
                         ->join('orderproduct', 'orderproduct.order_id', '=', 'order.id')
                         ->join('product', 'product.id', '=', 'orderproduct.product_id')
                         ->select('order.*', 'orderproduct.*', 'product.*')
                         ->whereNull('orderproduct.deleted_at')
                         ->get();
                          // dd($products);
                       
         $total_amount =order::where('order.id', '=', $invoice_ids)
                         ->sum('order.total_amount');


        $invoice =order::where('order.id', '=', $invoice_ids)->value('invoice_id');


        $email=$user->email;
        $country  = $user->country;
        $fname  = $user->fname;
        $lname  = $user->lname;
        $state  = $user->state;
        $contact  = $user->contact;
        $email  = $user->email;
        $address  = $user->address;
        $city  = $user->city;
        $payment= $user->payment;
        $date=$user->created_at;
        $company_name=$company->company_name;
        $company_address=$company->company_address;
        $email_address=$company->email_address;
        $max_id=order::where('user_id', Auth::user()->id)->max('id');
        $total = order::where('user_id', Auth::user()->id)
                        ->where('id', $max_id)->get();
         $admin_user=User::join('profile_infos', 'users.id', '=', 'profile_infos.user_id')->select('users.*', 'profile_infos.*')->where('users.id', 1)->get();


      
        
        return view('app.admin.online_store.invoice', compact('title', 'sub_title', 'method', 'user', 'country', 'fname', 'total', 'lname', 'state', 'contact', 'email', 'address', 'city', 'date', 'company', 'company_name', 'company_address', 'email_address', 'invoice_ids', 'payment', 'products', 'total_amount', 'invoice', 'admin_user'));
    }

     public function approve_orders(Request $request ,$id)

    {    
          Order::where('id','=',$id)->update(['approved_status'=>"approved"]);
         $user_details=Order::where('id',$id)->first();  
         $total_pv=PurchaseHistory::where('user_id',$user_details->user_id)->sum('pv');

         $sum_pv=$total_pv+$user_details->total_pv;
       // dd($sum_pv);

         $prev=PurchaseHistory::where('user_id',$user_details->user_id)->max('id');
            $prev_pack=PurchaseHistory::where('id',$prev)->value('package_id');
            $prev_pack_sv=Packages::where('id',$prev_pack)->value('sv');
 
        $package_id = Packages::where('sv','<=',$sum_pv)->max('id');
        // dd(123);
         PurchaseHistory::create([
            'user_id'          => $user_details->user_id,
            'purchase_user_id' => $user_details->user_id,
            'package_id'       => $package_id,
            'product'          => $package_id,
             'pv'               => $user_details->total_pv,
            // 'pv'               => $sum_pv,
            'count'            => 1,
            'total_amount'     =>$user_details->total_amount,
            'pay_by'           => 'na',
            'purchase_type'    =>'product_purchase',
            'sales_status'     => "yes",
            'approved'         =>"approved",

            ]);


//////////////////////////////////
 // $pendings=PendingCommission1::where('type','pending')->where('give_sp_cm','=',0)->pluck('user_id');
 // $pendings=$pendings->toArray();
 //           $test = in_array($user_details->user_id, $pendings);
           
 //                if($test == true){
 //                foreach ($pendings as $key => $value) 
 //                { 
 //                  $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
 //                  $s_id=PurchaseHistory::where('user_id',$sponsor)->max('id');
 //                  $sponsor_pack_sv=PurchaseHistory::where('id',$s_id)->value('pv');
 //                  if($sponsor_pack_sv >= 51){
 //                  if($user_details->user_id == $value){
 //                    if($sum_pv >=51){
 //                  $sponsor=Sponsortree::where('user_id',$value)->value('sponsor');
 //                  SponsorCommission::sponsorCommission($value,$package_id,$prev_pack_sv,$sponsor);
 //                  PendingCommission1::where('user_id','=',$value)->update(['type'=>'receve','give_sp_cm'=>1]);
 //                }
 //                }
 //                  }}}





                  //add today
                  // else
                  // {    
                        // $pendings=SponsorCommissionPending::where('user_id',$user_details->user_id)->where('status','=',0)->value('sv');
                        // if($pendings == null){
                        //     if($user_details->total_pv < 51)
                        //     {
                        //         SponsorCommissionPending::create([
                        //         'user_id'=>$user_details->user_id,
                        //         'sv'=>$user_details->total_pv,
                        //         'status'=>0,
                        //         ]);
                        //     }
                        // }
                        // else
                        // {   
                        //     $total_sv=PurchaseHistory::where('user_id',$user_details->user_id)->sum('pv');
                        //     $pendings=SponsorCommissionPending::where('user_id',$user_details->user_id)->where('status','=',0)->value('sv');
                        //     SponsorCommissionPending::where('user_id', $user_details->user_id)->increment('sv',$user_details->total_pv);
                        //     $sv=SponsorCommissionPending::where('user_id',$user_details->user_id)->where('status','=',0)->value('sv');
                        //     if($sv >=51 )
                        //     {
                                
                        //         if($total_sv <=816)
                        //         {
                        //             $sv=$total_sv-$user_details->total_pv;
                        //         }
                        //         else
                        //         {
                        //             $sv=$user_details->total_pv;
                        //         }
                        //             $sponsor=Sponsortree::where('user_id',$user_details->user_id)->value('sponsor');
                        //             SponsorCommission::sponsorCommission($user_details->user_id,$sv,$prev_pack_sv,$sponsor);
                        //             SponsorCommissionPending::where('user_id','=',$user_details->user_id)->update(['status'=>1]);
                                
                        //     }
                        // }
                        // if($user_details->total_pv >=51)
                        // { 
                        //     $total_sv=PurchaseHistory::where('user_id',$user_details->user_id)->sum('pv');
                            
                        //     if($total_sv >816)
                        //     {  
                        //        $prev=PurchaseHistory::where('user_id',$user_details->user_id)->max('id');
                        //        // $id=$prev-1;
                        //        $prev_sv=PurchaseHistory::where('id','!=',$prev)->where('user_id',$user_details->user_id)->sum('pv');
                        //        $sv=816-$prev_sv;
                        //         if($sv > 1)
                        //         {
                        //             $sponsor=Sponsortree::where('user_id',$user_details->user_id)->value('sponsor');
                        //             SponsorCommission::sponsorCommission($user_details->user_id,$sv,$prev_pack_sv,$sponsor);
                        //         }   
                               

                        //     }
                        //     else
                        //     {
                        //       $sv=$user_details->total_pv;
                            
                           
                        //     $sponsor=Sponsortree::where('user_id',$user_details->user_id)->value('sponsor');
                        //     SponsorCommission::sponsorCommission($user_details->user_id,$sv,$prev_pack_sv,$sponsor);
                        //     }
                        // }

                    
              // }
//////////////////////////////////////////////
             
// $sum_pv=PurchaseHistory::where('user_id',$user_details->user_id)->sum('pv');
// if($sum_pv >=51){
// // $binary_pending=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',$user_details->user_id)->get();
// $binary_pendin=PendingBinaryCommission::where('status','=',0)->where('sponsor_id',$user_details->user_id)->max('id');
// $binary_pending=PendingBinaryCommission::where('id','=',$binary_pendin)->get();
// // dd($binary_pending);
// foreach ($binary_pending as $key => $value)
// {  
//   // $ac=PurchaseHistory::where('user_id',$value['left_user_id'])->where('purchase_type','=','registration')->value('pv');
//   // $bc=PurchaseHistory::where('user_id',$value['right_user_id'])->where('purchase_type','=','registration')->value('pv');  
//   $a=PurchaseHistory::where('user_id',$value['left_user_id'])->max('id');
//   $b=PurchaseHistory::where('user_id',$value['right_user_id'])->max('id');
//   $a1=PurchaseHistory::where('id',$a)->value('pv');
//   $b2=PurchaseHistory::where('id',$b)->value('pv');
//   if($a1 >= 51 && $b2 >= 51){
//     if($a < $b){
//       PointTable::binary($value['left_user_id'], $user_details->user_id);}
//    if($b < $a){
//       PointTable::binary($value['right_user_id'], $user_details->user_id);
//     }      
 
//   PendingBinaryCommission::where('sponsor_id','=',$user_details->user_id)->update(['status'=>1]);
// }
// }
//   }
/////////////////////////////////////////                        
        
            
        // PointTable::updatePoint($user_details->total_pv,$user_details->user_id);
        $sum_pv=PurchaseHistory::where('user_id',$user_details->user_id)->sum('pv');
        $rank_id=User::where('id',$user_details->user_id)->value('rank_id');
        $next_rank_id=$rank_id+1;
        // Ranksetting::RankUpdate1($user_details->user_id,$sum_pv,$next_rank_id,$rank_id);

        $sponsor_id=Sponsortree::where('user_id',$user_details->user_id)->value('sponsor');

        // Ranksetting::StockiestBonus($sponsor_id,$user_details->user_id,$user_details->total_pv);
        Session::flash('flash_notification', array('level' => 'success', 'message' => trans(' Approved Sucessfully')));
        return Redirect::back();

    }
     public function reject_orders(Request $request,$id)

    {
       Order::where('id',$id)->update(['approved_status'=>"rejected"]);
       $user_details=Order::where('id',$id)->first(); 

       Commission::create([
                'user_id'        => $user_details->user_id,
                'from_id'        => 1,
                'total_amount'   => $user_details->total_amount,
                'payable_amount' => $user_details->total_amount,
                'payment_type'   => 'refund_amount',
                'note'           => "na",
                ]);

        Balance::where('user_id',$user_details->user_id)->increment('balance',$user_details->total_amount);

       PurchaseHistory::where('user_id','=',$user_details->user_id)->update(['approved'=>"rejected"]);
       Session::flash('flash_notification', array('level' => 'success', 'message' => 'Deleted successfully'));
        return Redirect::back();

    }
     public function approvesales()
    {

        $title     = trans('products.approved_orders');
        $sub_title = trans('products.approved_orders');
        $base      = trans('products.approved_orders');
        $method    = trans('products.approved_orders');
        
        $orders = Order::select('order.invoice_id as invoice', 'users.username', 'shoppingaddress.country as shipping_country', 'order.total_amount', 'shoppingaddress.status', 'order.created_at','order.approved_status')
         ->where('order.approved_status','=','approved')
         ->join('users', 'users.id', '=', 'order.user_id')
         ->join('shoppingaddress', 'shoppingaddress.order_id', '=', 'order.id')
         ->orderBy('order.created_at', 'desc')
         ->get();
          

       return view('app.admin.online_store.approved_orders', compact('title', 'sub_title', 'base', 'method', 'orders', 'oders_count', 'total_sale', 'weekly_sale_count', 'yearly_sale_count', 'monthly_sale_count', 'pending_orders', 'count_product'));
    }

      public function rejected_orders()
    {

        $title     = trans('products.rejected_sales');
        $sub_title = trans('products.rejected_sales');
        $base      = trans('products.rejected_sales');
        $method    = trans('products.rejected_sales');
        
        $orders = Order::select('order.invoice_id as invoice', 'users.username', 'shoppingaddress.country as shipping_country', 'order.total_amount', 'shoppingaddress.status', 'order.created_at','order.approved_status')
         ->where('order.approved_status','=','rejected')
         ->join('users', 'users.id', '=', 'order.user_id')
         ->join('shoppingaddress', 'shoppingaddress.order_id', '=', 'order.id')
         ->orderBy('order.created_at', 'desc')
         ->get();
        

        return view('app.admin.online_store.rejected_orders', compact('title', 'sub_title', 'base', 'method', 'orders', 'oders_count', 'total_sale', 'weekly_sale_count', 'yearly_sale_count', 'monthly_sale_count', 'pending_orders', 'count_product'));
    }
    
}
