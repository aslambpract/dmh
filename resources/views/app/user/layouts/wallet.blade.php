

<div class="row">
                        <div class="col-lg-4">

                            <!-- Area chart in colored card -->
                            <div class="card  border-info">
                                <div class="card-body">
                                    <div class="heading-elements">
                                        
                                    </div>

                                    <h3 class="no-margin text-semibold">{{round($user_balance,4)}}</h3>
                                       {{trans('wallet.balance')}}
                                
                                </div>

                                <div id="chart_area_color"></div>
                            </div>
                            <!-- /area chart in colored card -->

                        </div>
                        <div class="col-lg-4">

                            <!-- Area chart in colored card -->
                            <div class="card ">
                                <div class="card-body">
                                    <div class="heading-elements">
                                        
                                    </div>

                                    <h3 class="no-margin text-semibold">{{$total_credit}}</h3>
                                       {{trans('wallet.total_fund_credited')}} 
                               
                                </div>

                                <div id="chart_area_color"></div>
                            </div>
                            <!-- /area chart in colored card -->

                        </div>
                        <div class="col-lg-4">

                            <!-- Area chart in colored card -->
                            <div class="card ">
                                <div class="card-body">
                                    <div class="heading-elements">
                                        
                                    </div>

                                    <h3 class="no-margin text-semibold">{{ $total_debit }}</h3>
                                        {{trans('wallet.total_fund_debited')}}
                                   
                                </div>

                                <div id="chart_area_color"></div>
                            </div>
                            <!-- /area chart in colored card -->

                        </div>
                       
                   

             

                 
                      
                </div>


                       