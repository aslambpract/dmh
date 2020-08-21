<!--     <div class="card imagebg1 fillheight">
            <div class="card-heading">
               
            </div>
            <div class="card-body"> -->

<!-- <div class="alert alert-primary bg-white alert-styled-left alert-dismissible">
                        
                       
                    </div> -->
@if($next_purchase_date != null)

               <!--  <div class="text-center mb-3 py-2">
                            <h4 class="font-weight-semibold mb-1">{{trans('Monthly Repurchase')}}</h4>
                            <span class="text-muted d-block">{{trans('dashboard.this_is_a_demo_version_of_cloud_mlm_software_which_will_be_reset_everyday')}}. {{trans('dashboard.next_reset_will_be_in')}}  : </span>
                        </div> -->

<!-- 
                <div class="running_clock" id="running_clock">
                    


               
                    <h3 class="resetwarn">   
                    </h3>
                    <div class="row">
                        <div class="col-sm-12 align-middle">
                         
                            <div class="clock">
                            </div>

                            @section('styles')@parent
                            <style type="text/css">
                            .clock{
                            zoom: 0.9;
                            -moz-transform: scale(0.9);
                            max-width: 690px;
                            margin: 0px auto;
                            }
                            </style>


                            @endsection
                            @section('scripts')@parent
                            <script type="text/javascript">

                            var now=new Date();
                            // console.log(now);
                            var closing=new Date("{{$hourly1}}");//Set this to 10:00pm on the present day
                            // console.log(closing);

                             var diff = (closing.getTime()/1000) - (now.getTime()/1000);
                             // console.log(diff);
                            // var diff = "{{$hourly}}";


                            // var diff=closing-now;//Time difference in milliseconds

                            var clock = $('.clock').FlipClock(diff, {
                                clockFace: 'DailyCounter',
                                countdown: true,
                                showSeconds: true
                            });
                            </script>


                            @endsection
                        </div>
                    </div>

                    
@endif
@if($salary_date != null)                  
                </div> -->
               <!--   <div class="text-center mb-3 py-2">
                            <h4 class="font-weight-semibold mb-1">{{trans('Monthly Salary')}}</h4>
                            <span class="text-muted d-block">{{trans('dashboard.this_is_a_demo_version_of_cloud_mlm_software_which_will_be_reset_everyday')}}. {{trans('dashboard.next_reset_will_be_in')}}  : </span>
                        </div>

                <div class="running_clock1" id="running_clock1">
                     -->


               
                    <h3 class="resetwarn">   
                    </h3>
                    <div class="row">
                        <div class="col-sm-12 align-middle">
                         
                            <div class="clock1">
                            </div>

                            @section('styles')@parent
                            <style type="text/css">
                            .clock1{
                            zoom: 0.9;
                            -moz-transform: scale(0.9);
                            max-width: 690px;
                            margin: 0px auto;
                            }
                            </style>


                            @endsection
                            @section('scripts')@parent
                            <script type="text/javascript">

                            var now=new Date();
                             console.log(now);
                            var closing=new Date("{{$next_salary_date}}");//Set this to 10:00pm on the present day
                            // console.log(closing);

                             var difference = (closing.getTime()/1000) - (now.getTime()/1000);
                             console.log(difference);
                            // var diff = "{{$hourly}}";


                            // var diff=closing-now;//Time difference in milliseconds

                            var clock = $('.clock1').FlipClock(difference, {
                                clockFace: 'DailyCounter',
                                countdown: true,
                                showSeconds: true
                            });
                            </script>


                            @endsection
                        </div>
                    </div>

@endif                    

                   
                </div>
                 

            </div>
        </div>