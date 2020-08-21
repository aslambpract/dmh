@if(Auth::check())





@section('styles')@parent

<style type="text/css">

    .sidebar .nav-item-header {

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



                        {{ Html::image(route('imagecache', ['template' => 'profile', 'filename' => $image]), 'Admin', array('class' => 'rounded-circle','width' => '38','height' => '38')) }}





                    </div>



                    <div class="media-body">

                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>

                        <div class="font-size-xs opacity-50 d-flex align-items-center">

                            <svg class="feather d-inline-block" style="width: 20px">

                                <use xlink:href="/backend/icons/feather/feather-sprite.svg#user" />

                            </svg>

                            &nbsp; {{ Auth::user()->username }}

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











        <!-- Main navigation -->

        <div class="card card-sidebar-mobile">



            <ul class="nav nav-sidebar" data-nav-type="accordion">

                @if(true==false)

                @include('app.admin.partials.menu')

                @endif

                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.main')}}</div> 

                </li>







                <li class="nav-item {{set_active('admin/dashboard')}}">

                    <a class="nav-link" href="{{url('admin/dashboard')}}" class="nav-link active">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#home" />

                        </svg>

                        <span class="text">{{trans('menu.dashboard')}}</span>

                    </a>

                </li>











                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.network')}} </div> 

                </li>





                <li

                    class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/sponsortree')}}{{set_active('admin/tree')}}">

                    <a href="javascript:void(0);" class="nav-link">

                        <span class="badge pull-right"></span>

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#layers" />

                        </svg>

                        <span> {{trans('menu.genealogy')}} </span>

                    </a>

                    <ul class="nav nav-group-sub"

                        style="{{set_active_display('admin/genealogy/*')}}{{set_active_display('admin/sponsortree')}}{{set_active_display('admin/tree')}}"

                        data-submenu-title="Network Explorers">



                        <li class="nav-item {{set_active('admin/genealogy/1')}}">
                            <a class="nav-link" href="{{url('admin/genealogy/1')}}">{{trans('Circle 00 Genealogy')}}</a>
                        </li>

                          <li class="nav-item {{set_active('admin/genealog/2')}}">
                            <a class="nav-link" href="{{url('admin/genealogy/2')}}">{{trans('Circle 0 Genealogy')}}</a>
                        </li>

                          <li class="nav-item {{set_active('admin/genealogy/3')}}">
                            <a class="nav-link" href="{{url('admin/genealogy/3')}}">{{trans('Circle 1 Genealogy')}}</a>
                        </li>

                          <li class="nav-item {{set_active('admin/genealogy/4')}}">
                            <a class="nav-link" href="{{url('admin/genealogy/4')}}">{{trans('Circle 2 Genealogy')}}</a>
                        </li>

                          <li class="nav-item {{set_active('admin/genealogy/5')}}">
                            <a class="nav-link" href="{{url('admin/genealogy/5')}}">{{trans('Circle 3 Genealogy')}}</a>
                        </li>

                        <li class="nav-item {{set_active('admin/genealogy/6')}}">
                            <a class="nav-link" href="{{url('admin/genealogy/6')}}">{{trans('Circle 4 Genealogy')}}</a>
                        </li>
 
                        <li class="nav-item {{set_active('admin/sponsortree')}}">
                            <a class="nav-link"href="{{url('admin/sponsortree')}}">{{trans('Sponsor Genealogy')}}</a>
                        </li>

                        <li class="nav-item {{set_active('admin/tree')}}"><a class="nav-link"

                                href="{{url('admin/tree')}}">{{trans('menu.tree-genealogy')}}</a></li>



                    </ul>

                </li>



                 
<!-- 
                    <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('Users File')}}</div>

                    

                </li> -->

               <!--  <li class="nav-item {{set_active('admin/users_file/*')}}{{set_active('admin/users_file')}}">

                    <a class="nav-link" href="{{url('admin/users_file')}}">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#user" />

                        </svg>

                        <span class="text">{{trans('Users File')}} </span>

                    </a>

                </li> -->





                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.members_management')}}</div>

                   

                </li>

                <li

                    class="nav-item nav-item-submenu {{set_active('admin/users')}}{{set_active('admin/useraccounts')}}{{set_active('admin/register')}}{{set_active('admin/lead')}}">

                    <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#users" />

                        </svg>

                        <span class="text"> {{trans('menu.members')}} </span>

                    </a>

                    <ul class="nav nav-group-sub "

                        style="{{set_active_display('admin/users')}}{{set_active_display('admin/useraccounts')}}{{set_active_display('admin/lead')}}{{set_active_display('admin/register')}} "

                        data-submenu-title="Member Management">



                        <li class="nav-item {{set_active('admin/users')}}"><a class="nav-link"

                                href="{{url('admin/users')}}">{{trans('menu.list_all_members')}}</a></li>

                        <li class="nav-item {{set_active('admin/useraccounts')}}"><a class="nav-link"

                                href="{{url('admin/useraccounts')}}">{{trans('menu.user_accounts')}}</a></li>

 
                        

                        <li class="nav-item {{set_active('admin/users/load_positions')}}"><a class="nav-link"

                                href="{{url('admin/users/load_positions')}}">{{trans('menu.load_positions')}}</a></li>        

                                   
                          
                              

                        <li class="nav-item {{set_active('admin/users/password')}}"><a class="nav-link"

                                href="{{url('admin/users/password')}}">{{trans('menu.change-password')}}</a></li>



                        <li class="nav-item {{set_active('admin/users/changeusername')}}"><a class="nav-link"

                                href="{{url('admin/users/changeusername')}}">{{trans('menu.Change_Username')}}</a></li>

                                

                    </ul>

                </li>






                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Circle user</div>
                </li>

                <li  class="nav-item nav-item-submenu {{set_active('admin/phase/*')}} ">
                    <a href="javascript:void(0);" class="nav-link">
                        <svg class="feather">
                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#users" />
                        </svg>
                        <span class="text"> Circle user </span>
                    </a>
                    <ul class="nav nav-group-sub "
                        style="{{set_active_display('admin/phase/*')}}" data-submenu-title="Circle user">

                        <li class="nav-item {{set_active('admin/phase/1')}}">
                            <a class="nav-link" href="{{url('admin/phase/1')}}">Circle 0 </a>
                        </li> 
                          <li class="nav-item {{set_active('admin/phase/2')}}">
                            <a class="nav-link" href="{{url('admin/phase/2')}}">Circle 1 </a>
                        </li> 
                          <li class="nav-item {{set_active('admin/phase/3')}}">
                            <a class="nav-link" href="{{url('admin/phase/3')}}">Circle 2 </a>
                        </li> 
                          <li class="nav-item {{set_active('admin/phase/4')}}">
                            <a class="nav-link" href="{{url('admin/phase/4')}}">Circle 3 </a>
                        </li> 
                        <li class="nav-item {{set_active('admin/phase/5')}}">
                            <a class="nav-link" href="{{url('admin/phase/5')}}">Circle 4 </a>
                        </li> 

                                

                    </ul>

                </li>







                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.wallets')}}</div> 

                </li>

                <li

                    class="nav-item nav-item-submenu {{set_active('admin/wallet')}} {{set_active('admin/rs-wallet')}}  {{set_active('admin/fund-credits')}} {{set_active('admin/payoutrequest')}} {{set_active('admin/failedpayout')}}">

                    <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#credit-card" />

                        </svg>

                        <span class="text">{{trans('menu.transactions')}} </span>

                    </a>

                    <ul class="nav nav-group-sub"

                        style="{{set_active_display('admin/wallet')}}{{set_active_display('admin/rs-wallet')}}   {{set_active_display('admin/fund-credits')}} {{set_active_display('admin/payoutrequest')}} {{set_active_display('admin/failedpayout')}} "

                        data-submenu-title="Wallets">



                        <li class="nav-item {{set_active('admin/wallet')}}"><a class="nav-link"

                                href="{{url('admin/wallet')}}">{{trans('menu.transaction_history')}}</a></li>

                       

                       <li class="nav-item {{set_active('admin/fund-credits')}}"><a class="nav-link"

                                href="{{url('admin/fund-credits')}}">{{trans('menu.transfer_credit')}} </a></li>

                        <li class="nav-item  {{set_active('admin/payoutrequest')}}"><a class="nav-link"

                                href="{{url('admin/payoutrequest')}}">{{trans('menu.payout_requests')}}</a>

                        </li>

                        <li class="nav-item  {{set_active('admin/failedpayout')}}">

                            <a class="nav-link" href="{{url('admin/failedpayout')}}"> Failed payout</a>

                        </li>



                    </ul>

                </li>
 




                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.support')}}</div> 

                </li>

                <li

                    class="nav-item nav-item-submenu {{set_active('admin/inbox')}} {{set_active('admin/helpdesk/*')}} {{set_active('admin/helpdesk/*/*')}} {{set_active('admin/helpdesk/*/*/*')}}">

                    <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#mail" />

                        </svg>

                        <span class="text">{{trans('menu.support')}}</span>

                    </a>

                    <ul class="nav nav-group-sub"

                        style=" {{set_active_display('admin/inbox')}} {{set_active_display('admin/helpdesk/*')}}"

                        data-submenu-title="Support streams">

                        <li class="nav-item {{set_active('admin/inbox')}}"><a class="nav-link"

                                href="{{url('admin/inbox')}}">{{trans('menu.mailbox')}}</a></li>

                        <li

                            class="nav-item  {{set_active('admin/helpdesk/*')}} {{set_active('admin/helpdesk/*/*')}} {{set_active('admin/helpdesk/*/*/*')}} ">

                            <a class="nav-link"

                                href="{{url('admin/helpdesk/tickets-dashboard')}}">{{trans('menu.tickets')}}</a>

                        </li>





                    </ul>

                </li>







                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.resources_manager')}}</div> 

                </li>



                <li

                    class="nav-item nav-item-submenu {{set_active('admin/autoresponse')}} {{set_active('admin/documentupload')}} 

                     {{set_active('admin/optionsettings')}}{{set_active('admin/getnews')}}{{set_active('admin/uploadusers')}}">



                    <a href="javascript:void(0);" class="nav-link">



                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#download" />

                        </svg>

                        <span class="text">{{trans('menu.resources')}}</span>

                    </a>

                    <ul class="nav nav-group-sub"

                        style="{{set_active_display('admin/documentupload')}}{{set_active_display('admin/getnews')}}{{set_active('admin/uploadusers')}}"

                        data-submenu-title="Resource manager">

                        <li class="nav-item {{set_active('admin/documentupload')}}"><a class="nav-link"

                                href="{{url('admin/documentupload')}}">{{trans('menu.Documents')}}</a></li>

                        <li class="nav-item {{set_active('admin/getnews')}}"><a class="nav-link"

                                href="{{url('admin/getnews')}}">{{trans('menu.news')}}</a></li>

                        <li class="nav-item {{set_active('admin/addvideos')}}"><a class="nav-link"

                                href="{{url('admin/addvideos')}}">{{trans('menu.videos')}}</a></li>

                       <!--  <li class="nav-item {{set_active('admin/uploadusers')}}"><a class="nav-link"

                                href="{{url('admin/uploadusers')}}">{{trans('menu.upload_users')}}</a></li> -->







                    </ul>

                </li>





                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.configuration')}}</div> 

                </li>



                <li class="nav-item-header ">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.settings')}}</div> 

                </li>



                <li class="nav-item nav-item-submenu  {{set_active('admin/users/reavtivation')}} {{set_active('admin/approve_payments')}} {{set_active('admin/users/positions')}}" >

                    <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#settings" />

                        </svg>

                        <span class="text">{{trans('menu.settings')}}</span>

                    </a>

                    <ul class="nav nav-group-sub" style="{{set_active_display('admin/control-panel')}} {{set_active_display('admin/approve_payments')}} {{set_active_display('admin/users/positions')}} {{set_active_display('admin/users/reavtivation')}}"

                        data-submenu-title="Control Panel">

                        <li class="nav-item {{set_active('admin/control-panel')}}">

                            <a class="nav-link"

                                href="{{url('admin/control-panel')}}">{{trans('menu.control_panel')}}</a>

                        </li>

                     <li class="nav-item {{set_active('admin/control-panel/package-manager')}}"><a class="nav-link"

                                href="{{url('admin/control-panel/package-manager')}}">Circle settings </a></li>

  <li class="nav-item {{set_active('admin/control-panel/ewallet_settings')}}"><a class="nav-link"

                                href="{{url('admin/control-panel/ewallet_settings')}}">{{trans('menu.payment_settings')}}</a></li>                         <li class="nav-item {{set_active('admin/approve_payments')}}"><a class="nav-link"

                                href="{{url('admin/approve_payments')}}">{{trans('menu.pay_status')}}</a></li>


                                 <li class="nav-item {{set_active('admin/users/positions')}}"><a class="nav-link"

                                href="{{url('admin/users/positions')}}">Activate positions </a></li>

                          <li class="nav-item {{set_active('admin/users/reavtivation')}}"><a class="nav-link"

                                href="{{url('admin/users/reavtivation')}}">Reactivate account</a></li>  

                    </ul>

                </li>







                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.profile_management')}}</div>

                    

                </li>

                <li class="nav-item {{set_active('admin/userprofiles/*')}}{{set_active('admin/userprofile')}}">

                    <a class="nav-link" href="{{url('admin/userprofile')}}">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#user" />

                        </svg>

                        <span class="text">{{trans('menu.profile')}} </span>

                    </a>

                </li>



                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.wallets')}}</div>

                </li>











                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.reports')}}</div> 

                </li>

                <li

                    class="nav-item nav-item-submenu {{set_active('admin/salesreport')}}{{set_active('admin/topearners')}}{{set_active('admin/joiningreport')}}{{set_active('admin/incomereport')}}

                    {{set_active('admin/payoutreport')}}{{set_active('admin/joiningreportbysponsor')}}{{set_active('admin/joiningreportbycountry')}}{{set_active('admin/fundcredit')}}{{set_active('admin/payoutreport')}}{{set_active('admin/summaryreport')}} ">

                    <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#printer" />

                        </svg>

                        <span class="text"> {{trans('menu.reports')}}</span>

                    </a>

                    <ul class="nav nav-group-sub"

                        style=" {{set_active_display('admin/salesreport')}}{{set_active_display('admin/topearners')}}{{set_active_display('admin/joiningreport')}}{{set_active_display('admin/incomereport')}}{{set_active_display('admin/payoutreport')}}{{set_active_display('admin/joiningreportbysponsor')}}{{set_active_display('admin/joiningreportbycountry')}}{{set_active_display('admin/fundcredit')}}{{set_active_display('admin/summaryreport')}}"

                        data-submenu-title="REPORTS">

                        <li class="nav-item {{set_active('admin/joiningreport')}}"><a class="nav-link"

                                href="{{url('admin/joiningreport')}}">{{trans('menu.joining-report')}}</a></li>

                       <!--  <li class="nav-item {{set_active('admin/fundcredit')}}"><a class="nav-link"

                                href="{{url('admin/fundcredit')}}"> {{trans('menu.fund-credit-report')}}</a></li> -->

                        <li class="nav-item {{set_active('admin/incomereport')}}"><a class="nav-link"

                                href="{{url('admin/incomereport')}}">{{trans('menu.member-income-report')}}</a></li>

                        <li class="nav-item {{set_active('admin/topearners')}}"><a class="nav-link"

                                href="{{url('admin/topearners')}}"> {{trans('menu.top-earners-report')}} </a></li>

                        <li class="nav-item {{set_active('admin/payoutreport')}}"><a class="nav-link"

                                href="{{url('admin/payoutreport')}}">{{trans('menu.payout-report')}}</a></li>

                        <!-- <li class="nav-item {{set_active('admin/salesreport')}}"><a class="nav-link"

                                href="{{url('admin/salesreport')}}">{{trans('menu.sales_report')}}</a></li>

                        <li class="nav-item {{set_active('admin/summaryreport')}}"><a class="nav-link"

                                href="{{url('admin/summaryreport')}}">{{trans('menu.summaryreport')}}</a></li> -->

                    </ul>

                </li>





                @if(true==true)

                <li class="nav-item-header">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.email_marketing')}} </div>

                    <svg class="feather">

                        <use xlink:href="/backend/icons/feather/feather-sprite.svg#send" />

                    </svg>

                </li>



                <li class="nav-item nav-item-submenu {{set_active('admin/campaign')}}">

                    <a href="javascript:void(0);" class="nav-link">

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#send" />

                        </svg>

                        <span class="text">{{trans('menu.campaigns')}}</span>

                    </a>

                    <ul class="nav nav-group-sub" style="{{set_active_display('admin/campaign')}}"

                        data-submenu-title="CAMPAIGN MANAGEMENT">



                        <li class="nav-item {{set_active('admin/campaign/create')}}">

                            <a class="nav-link" href="{{url('admin/campaign/create')}}">

                                {{trans('menu.create_new_campaign')}}

                            </a>

                        </li>



                        <li class="nav-item {{set_active('admin/campaign/lists')}}">

                            <a class="nav-link" href="{{url('admin/campaign/lists')}}">

                                {{trans('menu.manage_campaigns')}}

                            </a>

                        </li>

                        <li class="nav-item {{set_active('admin/campaign/contacts')}}">

                            <a class="nav-link" href="{{url('admin/campaign/contacts')}}">

                                {{trans('menu.contacts_lists')}}

                            </a>

                        </li>

                        <li class="nav-item {{set_active('admin/campaign/autoresponders')}}">

                            <a class="nav-link" href="{{url('admin/campaign/autoresponders')}}">

                                {{trans('menu.autoresponders_list')}}

                            </a>

                        </li>

                        <li class="nav-item {{set_active('admin/campaign/autoresponders/create')}}">

                            <a class="nav-link" href="{{url('admin/campaign/autoresponders/create')}}">

                                {{trans('menu.create_autoresponder')}}

                            </a>

                        </li>



                    </ul>

                </li>

                @endif











                <li class="nav-item {{set_active('auth/logout')}}">

                    <a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault();

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