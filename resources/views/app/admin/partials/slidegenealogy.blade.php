@if(Auth::check())




            

                 <li class="nav-item-header mt-1">

                    <div class="text-uppercase font-size-xs line-height-xs">{{trans('menu.network')}} </div> 

                </li>


          
             

                <li

                    class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/tree')}} {{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} mt-1">

                    <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                        <span class="badge pull-right"></span>

                        <svg class="feather">

                            <use xlink:href="/backend/icons/feather/feather-sprite.svg#layers" />

                        </svg>

                        <span>{{trans('menu.genealogy')}}</span>

                    </a>
                    
                    <ul class="nav nav-group-sub p-1"

                        style="{{set_active_display('admin/genealogy')}}{{set_active_display('admin/sponsortree')}}"

                        data-submenu-title="Network Explorers">
                    
                  
                    @if (in_array('34', $sub_list))
                        
                        <li class="nav-item {{set_active('admin/sponsortree')}}"><a class="nav-link"

                                href="{{url('admin/sponsortree')}}">
                          
                        Sponsor Genealogy</a></li>

                    @endif
                    
                    @if(in_array('35', $sub_list))  
                        <li

                        class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} {{set_active('admin/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Bronze</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('admin/genealogy/1')}}{{set_active_display('admin/genealogy2')}} {{set_active('admin/genealogy3')}}{{set_active('admin/genealogy3')}}"

                                data-submenu-title="Network Explorers">

                                
                                <li class="nav-item {{set_active('admin/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/1')}}">
                                  
                                Level 1  </a></li>

                                <li class="nav-item {{set_active('admin/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/2')}}">
                                  
                                Leve 2 </a></li>

                                <li class="nav-item {{set_active('admin/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/3')}}">
                                  
                                Level 3 </a></li>
                              

                            </ul>

                        </li>

                     @endif

                     @if(in_array('36', $sub_list)) 

                        <li

                        class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} {{set_active('admin/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Silver</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('admin/genealogy')}}{{set_active_display('admin/tree')}} {{set_active('admin/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                
                                <li class="nav-item {{set_active('admin/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/4')}}">
                                  
                                Level 1  </a></li>

                                <li class="nav-item {{set_active('admin/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/5')}}">
                                  
                                Leve 2 </a></li>

                                <li class="nav-item {{set_active('admin/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/6')}}">
                                  
                                Level 3 </a></li>
                              

                            </ul>

                        </li>

                    @endif

                    @if(in_array('37', $sub_list)) 
                          <li

                        class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} {{set_active('admin/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Gold</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('admin/genealogy')}}{{set_active_display('admin/tree')}} {{set_active('admin/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                
                                <li class="nav-item {{set_active('admin/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/7')}}">
                                  
                                Level 1  </a></li>

                                <li class="nav-item {{set_active('admin/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/8')}}">
                                  
                                Leve 2 </a></li>

                                <li class="nav-item {{set_active('admin/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/9')}}">
                                  
                                Level 3 </a></li>
                              

                            </ul>

                        </li>

                    @endif

                    @if(in_array('38', $sub_list)) 

                        <li

                        class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} {{set_active('admin/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Platinum</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('admin/genealogy')}}{{set_active_display('admin/tree')}} {{set_active('admin/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                
                                <li class="nav-item {{set_active('admin/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/10')}}">
                                  
                                Level 1  </a></li>

                                <li class="nav-item {{set_active('admin/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/11')}}">
                                  
                                Leve 2 </a></li>

                                <li class="nav-item {{set_active('admin/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/12')}}">
                                  
                                Level 3 </a></li>
                              

                            </ul>

                        </li>
                   
                   @endif

                   @if(in_array('39', $sub_list)) 
                         <li

                        class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} {{set_active('admin/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Diamond</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('admin/genealogy')}}{{set_active_display('admin/tree')}} {{set_active('admin/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                
                                <li class="nav-item {{set_active('admin/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/13')}}">
                                  
                                Level 1  </a></li>

                                <li class="nav-item {{set_active('admin/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/14')}}">
                                  
                                Leve 2 </a></li>

                                <li class="nav-item {{set_active('admin/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/15')}}">
                                  
                                Level 3 </a></li>
                              

                            </ul>

                        </li>

                    @endif    

                    @if(in_array('40', $sub_list)) 

                         <li

                        class="nav-item nav-item-submenu {{set_active('admin/genealogy')}}{{set_active('admin/genealogy1')}} {{set_active('admin/genealogy2')}} {{set_active('admin/genealogy3')}} {{set_active('admin/genealogy4')}} {{set_active('admin/genealogy5')}} {{set_active('admin/genealogy6')}} {{set_active('admin/genealogy7')}} {{set_active('admin/tree')}} mt-1">

                        <a href="javascript:void(0);" class="nav-link pt-2 pb-1">

                            <span class="badge pull-right"></span>

                            <span>Diamond 1</span>

                        </a>
                                 <ul class="nav nav-group-sub p-1"

                                style="{{set_active_display('admin/genealogy')}}{{set_active_display('admin/tree')}} {{set_active('admin/referral_list')}}"

                                data-submenu-title="Network Explorers">

                                
                                <li class="nav-item {{set_active('admin/genealogy1')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/16')}}">
                                  
                                Level 1  </a></li>

                                <li class="nav-item {{set_active('admin/genealogy2')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/17')}}">
                                  
                                Leve 2 </a></li>

                                <li class="nav-item {{set_active('admin/genealogy3')}} mt-1"><a class="nav-link pt-2 pb-1"

                                        href="{{url('admin/genealogy/18')}}">
                                  
                                Level 3 </a></li>
                              

                            </ul>

                        </li>
                       
                    @endif

                     




                       


                    </ul>

                </li>






@endif