@if(Auth::check())

<!-- User menu -->





<!--- MANAGE STYLE FOR SIDEBAR MENU HERE --->



@section('styles')@parent

<style type="text/css">

    .sidebar .nav-item-header{

        display: none;

    }

</style>

@endsection





<!-- Main sidebar -->

<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">



    <div class="sidebar-mobile-toggler text-center">

        <a href="#" class="sidebar-mobile-main-toggle">

            <i class="icon-arrow-left8"></i>

        </a>

        {{trans('menu.navigation')}}

        <a href="#" class="sidebar-mobile-expand">

            <i class="icon-screen-full"></i>

            <i class="icon-screen-normal"></i>

        </a>

    </div>





    <div class="sidebar-content">





        <div class="sidebar-user">

            <div class="card-body">

                <div class="media">

                    <div class="mr-3">



                               

                                    {{ Html::image(route('imagecache', ['template' => 'profile', 'filename' => $image]), 'user', array('class' => 'rounded-circle','width' => '38','height' => '38')) }}

                                    



                                    </div>



<div class="media-body">

    <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>

    <div class="font-size-xs opacity-50 d-flex align-items-center">

        <svg class="feather d-inline-block" style="width: 20px">

            <use xlink:href="/backend/icons/feather/feather-sprite.svg#user" />

        </svg>

         {{ Auth::user()->username }}

         </div>

                    </div>



                    <div class="ml-3 align-self-center">

                        <a href="#" class="text-white">

                            <svg class="feather d-inline-block" style="width: 18px">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#settings" />

                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        </div>

                    <!-- /user menu -->





                    <!-- Main navigation -->

                    <div class="card card-sidebar-mobile">



                        <ul class="nav nav-sidebar" data-nav-type="accordion">

                             @if(true==false)

                             @include('app.user.partials.menu')

                             @endif

                        <!-- Main -->

                 



                        <li class="navigation-header"><span>{{trans('menu.main')}}</span> <i class="icon-menu" title="Main pages"></i></li>





                        <li class="nav-item {{set_active('user/dashboard')}}">

                            <a class="nav-link" href="{{url('user/dashboard')}}" class="nav-link active">                           

                            <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#home" />

                            </svg> 

                            <span class="text" >{{trans('menu.dashboard')}}</span>

                            </a>



                        </li>





                        

                        



                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.network')}} </div> <i class="icon-menu" title="Network"></i></li>





                    <li class="nav-item nav-item-submenu {{set_active('user/genealogy/*')}}{{set_active('user/sponsortree')}}{{set_active('user/tree')}}">

                        <a href="javascript:void(0);" class="nav-link">

                            <!--<b class="caret pull-right"></b>-->

                            <span class="badge pull-right"></span>

                            <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#layers" />

                            </svg> 

                            <span> {{trans('menu.network')}} </span>

                        </a>

                         <ul class="nav nav-group-sub" style="{{set_active_display('user/genealogy/*')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}}"  data-submenu-title="Network Explorers">

                            <li

                        class="nav-item nav-item-submenu {{set_active('user/genealogy')}}{{set_active('user/genealogy1')}} {{set_active('user/genealogy2')}} {{set_active('user/genealogy3')}} {{set_active('user/genealogy4')}} {{set_active('user/genealogy5')}} {{set_active('user/genealogy6')}} {{set_active('user/genealogy7')}} {{set_active('user/sponsortree')}}{{set_active('user/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Bronze</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('user/genealogy')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}} {{set_active('user/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                @if($stage1 > 0)
                                <li class="nav-item {{set_active('user/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/1')}}">
                                  
                                Level 1  </a></li>

                                @endif
                                  @if($stage2 > 0)
                                <li class="nav-item {{set_active('user/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/2')}}">
                                  
                                Leve 2 </a></li>
                                @endif

                                @if($stage3 > 0)

                                <li class="nav-item {{set_active('user/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/3')}}">
                                  
                                Level 3 </a></li>
                                 @endif

                            </ul>

                        </li>

                            <li

                        class="nav-item nav-item-submenu {{set_active('user/genealogy')}}{{set_active('user/genealogy1')}} {{set_active('user/genealogy2')}} {{set_active('user/genealogy3')}} {{set_active('user/genealogy4')}} {{set_active('user/genealogy5')}} {{set_active('user/genealogy6')}} {{set_active('user/genealogy7')}} {{set_active('user/sponsortree')}}{{set_active('user/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Silver</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('user/genealogy')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}} {{set_active('user/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                @if($stage4 > 0)
                                <li class="nav-item {{set_active('user/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/4')}}">
                                  
                                Level 1  </a></li>

                                 @endif
                                 @if($stage5 > 0) 
                                <li class="nav-item {{set_active('user/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/5')}}">
                                  
                                Leve 2 </a></li>
                                @endif

                                @if($stage6 > 0) 
                                <li class="nav-item {{set_active('user/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/6')}}">
                                  
                                Level 3 </a></li>
                                 @endif

                            </ul>

                        </li>

                        <li

                        class="nav-item nav-item-submenu {{set_active('user/genealogy')}}{{set_active('user/genealogy1')}} {{set_active('user/genealogy2')}} {{set_active('user/genealogy3')}} {{set_active('user/genealogy4')}} {{set_active('user/genealogy5')}} {{set_active('user/genealogy6')}} {{set_active('user/genealogy7')}} {{set_active('user/sponsortree')}}{{set_active('user/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Gold</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('user/genealogy')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}} {{set_active('user/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                 @if($stage7 > 0) 
                                <li class="nav-item {{set_active('user/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/7')}}">
                                  
                                Level 1  </a></li>

                                @endif

                                @if($stage8 > 0) 

                                <li class="nav-item {{set_active('user/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/8')}}">
                                  
                                Leve 2 </a></li>

                                @endif

                                @if($stage9 > 0)

                                <li class="nav-item {{set_active('user/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/9')}}">
                                  
                                Level 3 </a></li>

                                 @endif
                              

                            </ul>

                        </li>



                        <li

                        class="nav-item nav-item-submenu {{set_active('user/genealogy')}}{{set_active('user/genealogy1')}} {{set_active('user/genealogy2')}} {{set_active('user/genealogy3')}} {{set_active('user/genealogy4')}} {{set_active('user/genealogy5')}} {{set_active('user/genealogy6')}} {{set_active('user/genealogy7')}} {{set_active('user/sponsortree')}}{{set_active('user/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Platinum</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('user/genealogy')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}} {{set_active('user/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                @if($stage10 > 0)
                                <li class="nav-item {{set_active('user/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/10')}}">
                                  
                                Level 1  </a></li>

                                @endif

                                @if($stage11 > 0)

                                <li class="nav-item {{set_active('user/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/11')}}">
                                  
                                Leve 2 </a></li>

                                @endif

                                @if($stage12 > 0)

                                <li class="nav-item {{set_active('user/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/12')}}">
                                  
                                Level 3 </a></li>

                                 @endif
                              

                            </ul>

                        </li>

                         <li

                        class="nav-item nav-item-submenu {{set_active('user/genealogy')}}{{set_active('user/genealogy1')}} {{set_active('user/genealogy2')}} {{set_active('user/genealogy3')}} {{set_active('user/genealogy4')}} {{set_active('user/genealogy5')}} {{set_active('user/genealogy6')}} {{set_active('user/genealogy7')}} {{set_active('user/sponsortree')}}{{set_active('user/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Diamond</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('user/genealogy')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}} {{set_active('user/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                @if($stage13 > 0)
                                <li class="nav-item {{set_active('user/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/13')}}">
                                  
                                Level 1  </a></li>

                                @endif

                                @if($stage14 > 0)

                                <li class="nav-item {{set_active('user/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/14')}}">
                                  
                                Leve 2 </a></li>

                                @endif

                                @if($stage15 > 0)

                                <li class="nav-item {{set_active('user/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/15')}}">
                                  
                                Level 3 </a></li>

                                @endif
                              

                            </ul>

                        </li>

                         <li

                        class="nav-item nav-item-submenu {{set_active('user/genealogy')}}{{set_active('user/genealogy1')}} {{set_active('user/genealogy2')}} {{set_active('user/genealogy3')}} {{set_active('user/genealogy4')}} {{set_active('user/genealogy5')}} {{set_active('user/genealogy6')}} {{set_active('user/genealogy7')}} {{set_active('user/sponsortree')}}{{set_active('user/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Diamond 1</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('user/genealogy')}}{{set_active_display('user/sponsortree')}}{{set_active_display('user/tree')}} {{set_active('user/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                @if($stage16 > 0)
                                <li class="nav-item {{set_active('user/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/16')}}">
                                  
                                Level 1  </a></li>

                                @endif

                                @if($stage17 > 0)

                                <li class="nav-item {{set_active('user/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/17')}}">
                                  
                                Leve 2 </a></li>

                                @endif

                                @if($stage18 > 0)

                                <li class="nav-item {{set_active('user/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('user/genealogy/18')}}">
                                  
                                Level 3 </a></li>

                                @endif
                              

                            </ul>

                        </li>



<!-- juan side bar tree start -->
                        <!--  <li class="nav-item {{set_active('user/genealogy')}}"><a class="nav-link" href="{{url('user/genealogy/2')}}">{{trans('Circle 1 Genealogy')}}</a></li>
                         <li class="nav-item {{set_active('user/genealogy')}}"><a class="nav-link" href="{{url('user/genealogy/3')}}">{{trans('Circle 2 Genealogy')}}</a></li>
                         <li class="nav-item {{set_active('user/genealogy')}}"><a class="nav-link" href="{{url('user/genealogy/4')}}">{{trans('Circle 3 Genealogy')}}</a></li>
                         <li class="nav-item {{set_active('user/genealogy')}}"><a class="nav-link" href="{{url('user/genealogy/5')}}">{{trans('Circle 4 Genealogy')}}</a></li> -->

                       
<!-- juan side bar tree end -->                           

                           

                        </ul>

                    </li>





              

                <!-- @if($user_registration==2 || $user_registration==5)  -->

                    <!-- <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.members_management')}} </div> <i class="icon-menu" title="{{trans('menu.members_management')}}"></i></li>

                    <li class="nav-item nav-item-submenu {{set_active('user/users')}}{{set_active('user/users/*')}}">

                        <a href="javascript:void(0);" class="nav-link"> -->

                             <!--<b class="caret pull-right"></b>-->

                             <!-- <svg class="feather"> -->

                                <!-- <use xlink:href="/backend/icons/feather/feather-sprite.svg#users" /> -->

                            <!-- </svg>  -->

                            <!-- <span class="text"> {{trans('menu.members')}}  </span> -->

                        <!-- </a> -->

                       <!--  <ul class="nav nav-group-sub" style="{{set_active_display('user/register')}}" data-submenu-title="{{trans('menu.members_management')}}">



                         

                             <li class="nav-item {{set_active('user/register')}}"><a class="nav-link" href="{{url('user/register')}}">{{trans('menu.enroll_new_member')}} </a></li>

                        </ul> -->

                    </li>

                <!-- @endif -->

               <!--  @if(Auth::user()->status != "rejected")

                    <li class="nav-item nav-item-submenu {{set_active('user/onlinestore')}}{{set_active('user/sales')}}">

                        <a href="javascript:void(0);" class="nav-link"> -->

                            <!--<b class="caret pull-right"></b>-->

                            <!-- <span class="badge pull-right"></span>

                            <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#shopping-bag" />

                            </svg> 

                            <span>{{trans('menu.online_store')}}   </span>

                        </a>

                         <ul class="nav nav-group-sub" style="{{set_active_display('user/onlinestore')}}"  data-submenu-title="{{trans('menu.online_store')}}">



                            <li class="nav-item {{set_active('user/onlinestore')}}"><a class="nav-link" href="{{url('user/onlinestore')}}">{{trans('menu.purchase_order')}}</a></li>

                            <li class="nav-item {{set_active('user/sales')}}"><a class="nav-link" href="{{url('user/sales')}}"> {{trans('menu.my_order')}}  </a></li>

                        </ul>

                    </li>

                    @endif -->





                    



                 <!--     <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">My Account</div> <i class="icon-menu" title="{{trans('menu.myaccount')}}"></i></li>

                     <li class="nav-item {{set_active('user/myaccount*')}}">

                        <a class="nav-link" href="{{url('user/myaccount')}}">

                        <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#printer" />

                            </svg> 

                            <span class="text">My account</span>

                        </a>

                    </li> -->


                   <!--  @if(App\Payout::where('user_id',Auth::user()->id)->exists())



                     <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Join Phase 3</div> <i class="icon-menu" title="{{trans('menu.myaccount')}}"></i></li>

                     <li class="nav-item {{set_active('user/joinphase/3')}}">

                        <a class="nav-link" href="{{url('user/joinphase/3')}}">

                        <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#printer" />

                            </svg> 

                            <span class="text">Join Phase 3</span>

                        </a>

                    </li>



                    @endif -->




                    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs"></div> <i class="icon-menu" title="{{trans('menu.e_wallet')}}"></i></li>

                    <li class="nav-item nav-item-submenu {{set_active('user/ewallet')}}{{set_active('user/fund-transfer')}}{{set_active('user/my-transfer')}} {{set_active('user/payoutrequest')}} {{set_active('user/allpayoutrequest')}}">

                        <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#credit-card" />

                            </svg> 

                            <span class="text"> {{ trans('Transaction')}} </span>

                        </a>

                        <ul class="nav nav-group-sub" style="{{set_active_display('user/ewallet')}} 

                        {{set_active_display('user/fund-transfer')}}

 
 
                        {{set_active_display('user/allpayoutrequest')}}" data-submenu-title="{{ trans('menu.e_wallet')}}">



                            

                                <li class="nav-item {{set_active('user/ewallet')}}"><a class="nav-link" href="{{url('user/ewallet')}}">{{trans(' Transaction History')}}</a></li>
 

 
 
                               

                                <li class="nav-item  {{set_active('user/allpayoutrequest')}} ">

                                <a class="nav-link" href="{{url('user/allpayoutrequest')}}">{{trans('menu.view_my_payout')}}</a>



                            </li>





                            </li>



                            

                            

                        </ul>

                    </li>





                            

                   <!--  <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs"></div> <i class="icon-menu" title="{{trans('menu.request_voucher')}}"></i></li>

                    <li class="nav-item nav-item-submenu {{set_active('user/requestvoucher')}}{{set_active('user/myvoucher')}}">

                        <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#minus-square" />

                            </svg> 

                            <span class="text"> {{trans('menu.vouchers')}} </span>

                        </a>

                        <ul class="nav nav-group-sub" style="{{set_active_display('user/requestvoucher')}} {{set_active_display('user/myvoucher')}}" data-submenu-title="{{ trans('menu.request_voucher')}}">



                              @if($voucher_user_request == 'yes')   



                             <li class="nav-item {{set_active('user/requestvoucher')}}"><a class="nav-link" href="{{url('user/requestvoucher')}}">{{trans('menu.request_voucher')}}</a></li>

                           @endif



                             <li class="nav-item {{set_active('user/myvoucher')}}"><a class="nav-link" href="{{url('user/myvoucher')}}">{{trans('menu.my_voucher')}}</a></li>

                            

                            

                        </ul>

                    </li> -->

                    



                     <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.profile')}}</div> <i class="icon-menu" title="{{trans('menu.profile')}}"></i></li>

                     <li class="nav-item {{set_active('user/profile')}}">

                        <a class="nav-link" href="{{url('user/profile')}}">

                            <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#user" />

                            </svg> 

                            <span class="text">{{trans('menu.profile')}}</span>

                        </a>

                    </li>



                         <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.support')}} </div> <i class="icon-menu" title="Support"></i></li>

                    <li class="nav-item nav-item-submenu {{set_active('user/inbox')}} {{set_active('user/helpdesk/*')}} {{set_active('user/helpdesk/*/*')}} {{set_active('user/helpdesk/*/*/*')}}">

                        <a href="javascript:void(0);" class="nav-link">

                            <!--<b class="caret pull-right"></b>-->

                            <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#mail" />

                            </svg> 

                            <span class="text">{{trans('menu.support')}} </span>

                        </a>

                        <ul class="nav nav-group-sub" style=" {{set_active_display('user/inbox')}} {{set_active_display('user/helpdesk/*')}}" data-submenu-title="Support streams">

                             <li class="nav-item {{set_active('user/inbox')}}"><a class="nav-link" href="{{url('user/inbox')}}">{{trans('menu.mailbox')}} </a></li>

                             <li class="nav-item  {{set_active('user/helpdesk/*')}} {{set_active('user/helpdesk/*/*')}} {{set_active('user/helpdesk/*/*/*')}} ">

                                <a class="nav-link" href="{{url('user/helpdesk/tickets-dashboard')}}">{{trans('menu.tickets')}} </a>

                            </li>

                            

                      

                        </ul>

                    </li>





                    <li class="nav-item nav-item-submenu {{set_active('user/allnews')}}{{set_active('user/allvideos')}}{{set_active('user/documentdownload')}}">

                        <a href="javascript:void(0);" class="nav-link">

                            <!--<b class="caret pull-right"></b>-->

                            <span class="badge pull-right"></span>

                            <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#image" />

                            </svg> 

                            <span>{{trans('menu.news_&_videos')}}   </span>

                        </a>

                         <ul class="nav nav-group-sub" style="{{set_active_display('user/allnews')}}"  data-submenu-title="News & Videos">



                            <li class="nav-item {{set_active('user/allnews')}}"><a class="nav-link" href="{{url('user/allnews')}}">{{trans('menu.news')}}</a></li>

                            <li class="nav-item {{set_active('user/allvideos')}}"><a class="nav-link" href="{{url('user/allvideos')}}"> {{trans('menu.videos')}} </a></li>

                               <li class="nav-item {{set_active('user/documentdownload')}}"><a class="nav-link" href="{{url('user/documentdownload')}}">{{trans('menu.downloads')}}</a></li>

                            

                        </ul>

                    </li>













                   <!--   <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.lead')}}</div> <i class="fa fa-bullhorn" title="{{trans('menu.profile')}}"></i></li>
 -->
                    <!--  <li class="nav-item {{set_active('user/lead')}}">

                        <a class="nav-link" href="{{url('user/lead')}}">

                        <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#users" />

                            </svg> 

                            <span class="text">{{trans('menu.lead')}}</span>

                        </a>

                    </li> -->



                  <!--   <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.upload_file')}}</div> <i class="fa fa-bullhorn" title="{{trans('menu.profile')}}"></i></li>

                     <li class="nav-item {{set_active('user/upload_file')}}">

                        <a class="nav-link" href="{{url('user/upload_file')}}">

                        <svg class="feather">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#users" />

                            </svg> 

                            <span class="text">{{trans('menu.upload_file')}}</span>

                        </a>

                    </li> -->

                    

                     <li class="nav-item {{set_active('auth/logout')}}">

                        <a class="nav-link" href="{{ url('/logout') }}"  onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                                     <svg class="feather">

                                                        <use xlink:href="/backend/icons/feather/feather-sprite.svg#log-out" />

                                                    </svg> 

                                                     <span class="text"> {{trans('menu.logout')}}</span></a>

                    </li>



                                </ul>

                        

                    </div>

                    <!-- /main navigation -->

                </div>

            </div>

            <!-- /main sidebar -->



       

@endif





