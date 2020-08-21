

<style type="text/css">
    
.c-bg-c{
        background-color:#00c0ef;
    }
.c-bg-c1{
        background-color:#00a65a;
    }
.c-bg-c2{
        background-color:#0ba7b4;
    }
.c-bg-c3{
        background-color:#f39c11;
    }
.c-bg-c4{
        background-color:#d87b6c ;
    }
.c-bg-c5{
        background-color:#38cccc ;
    }
 .c-bg-c6{
        background-color:#f4a361 ;
    }
.c-bg-c7{
        background-color:#3c8dbc ;
    }
.c-bg-c8{
        background-color:#ff69b3 ;
    }
.c-bg-c9{
        background-color:#33cb98 ;
    }
.c-bg-c10{
        background-color:#fdb3c0 ;
    }
.c-bg-c11{
        background-color:#daa521 ;
    }

.row-sty h3{
    font-size: 23px;
}
</style>

<div class="row row-sty">

                        <div class="col-lg-3">



                            <!-- Arega chart in colored card -->

                            <div class="card c-bg-c">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">{{$GLOBAL_RANK}}</h3>

                                       {{trans('dashboard.member_current_position')}}

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.member_current_position')}}</div> -->

                                </div>



                                <div id="chart_area_color"></div>

                            </div>

                            <!-- /area chart in colored card -->



                        </div>

                        <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                            <!-- <div class="card c-bg-c1">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">{{$left_bv}}</h3>

                                       {{trans('dashboard.primary_group_accumulate_sv')}}  -->

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.primary_group_accumulate_sv')}} </div> -->

                                <!-- </div> -->



                               <!--  <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->

                        <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                           <!--  <div class="card c-bg-c2">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-semibold">{{ $right_bv }}</h3>

                                        {{trans('dashboard.secondary_group_accumulate_sv')}}
 -->
                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.secondary_group_accumulate_sv')}}</div> -->

                                <!-- </div> -->


<!-- 
                                <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->

                       

                        <div class="col-lg-3">



                            <!-- Area chart in colored card -->

                            <div class="card c-bg-c3">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">

                                    {{(round($total_income,2))}}</h3>

                                        {{trans('dashboard.total_income')}}

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.total_income')}}</div> -->

                                </div>



                                <div id="chart_area_color"></div>

                            </div>

                            <!-- /area chart in colored card -->



                        </div>



                        <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                            <!-- <div class="card c-bg-c4">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">

                                    {{$personal_sv}}</h3>

                                        {{trans('dashboard.personal_sales')}}(PSV) -->

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.personal_sales')}}</div> -->

                                <!-- </div>



                                <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->





                        





                     

                          

                     



                        <div class="col-lg-3">



                            <!-- Sparklines in colored card -->

                            <div class="card c-bg-c5">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">
                                               <!-- {{currency(round($balance,2))}} -->

                                    </h3> 

                                   {{trans('dashboard.user_balance')}}

                                    <!-- <div class="text-muted text-size-small">{{trans('dashboard.user_balance')}}</div> -->

                                </div>



                                <div id="sparklines_color"></div>

                            </div>

                            <!-- /sparklines in colored card -->



                        </div>

                        <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                            <!-- <div class="card c-bg-c6">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">{{$total_left}}</h3>

                                       {{trans('Primary ASV')}}  -->

                                    <!-- <div class="text-muted text-size-small"> {{trans('Primary ASV')}} </div> -->

                               <!--  </div>



                                <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->



                         <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                          <!--   <div class="card c-bg-c7">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">{{$total_right}}</h3>

                                       {{trans('Secondary ASV')}}  -->

                                    <!-- <div class="text-muted text-size-small"> {{trans('Secondary ASV')}} </div>
 -->
                               <!--  </div>



                                <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->



                        <div class="col-lg-3">



                            <!-- Area chart in colored card -->

                            <div class="card c-bg-c8">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">

                                    {{(round($total_income,2))}}</h3>

                                        {{trans('dashboard.cash_wallet_balance')}}

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.cash_wallet_balance')}}</div> -->

                                </div>



                                <div id="chart_area_color"></div>

                            </div>

                            <!-- /area chart in colored card -->



                        </div>

                         <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                            <!-- <div class="card c-bg-c9">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">

                                    {{$rede_wallet}}</h3>

                                        {{trans('dashboard.redemption_wallet_balance')}} -->

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.redemption_wallet_balance')}}</div> -->

                               <!--  </div>



                                <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->

                        <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                           <!--  <div class="card c-bg-c10">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">

                                    {{$reward_balance}}</h3>

                                        {{trans('dashboard.reward_wallet_balance')}}
 -->
                                   <!--  <div class="text-muted text-size-small"> {{trans('dashboard.reward_wallet_balance')}}</div> -->

                                <!-- </div> -->



                            <!--     <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->

                         <!-- <div class="col-lg-3"> -->



                            <!-- Area chart in colored card -->

                           <!--  <div class="card c-bg-c11">

                                <div class="card-body text-center">

                                    <div class="heading-elements">

                                        

                                    </div>



                                    <h3 class="no-margin text-bold">

                                    {{$salary_balance}}</h3>

                                        {{trans('dashboard.salary_wallet_balance')}} -->

                                    <!-- <div class="text-muted text-size-small"> {{trans('dashboard.salary_wallet_balance')}}</div>
 -->
                               <!--  </div>



                                <div id="chart_area_color"></div>

                            </div> -->

                            <!-- /area chart in colored card -->



                        <!-- </div> -->



                          

                </div>





                       