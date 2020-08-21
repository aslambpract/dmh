@extends('app.admin.layouts.default')

@section('page_class', 'sidebar-xs') 

{{-- Web site Title --}}

@section('title') {{{ $title }}} :: @parent @stop

@section('styles')

@parent

@endsection

@section('sidebar')

@parent

<!-- Secondary sidebar -->

@include('app.admin.control_panel.sidebar')

<!-- /secondary sidebar -->

@endsection





        {{-- Content --}}

        @section('main')

<div id="settings-page">

    <div class="card card-white">

        <div class="card-header pb-1 pt-1 bg-dark" style="">

            <h5 class="mb-0 font-weight-light">

                {{trans('controlpanel.commission_settings')}}

            </h5>

             <div class="text-right d-lg-none w-100">

               <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 

                </div>

        </div>

        <div class="card-body bordered">

            <fieldset class="mb-3">

  

              <div class="card-body">

                <ul class="nav nav-tabs nav-tabs-highlight nav-justified">

                  <li class="nav-item active"><a href="#steps-commission-tab1" class="nav-link  steps-commission active " data-toggle="tab" data-payment='binary_commission' >{{trans('Phase')}}</a></li>

                 <!--  <li class="nav-item"><a href="#steps-commission-tab2" class="nav-link steps-commission" data-toggle="tab" data-payment='level_commission'>{{trans('controlpanel.level_commission')}} </a></li> -->

                  <li class="nav-item"><a href="#steps-commission-tab3" class="nav-link steps-commission" data-toggle="tab" data-payment='sponsor_commission'>{{trans('Sponsor Commission')}}</a></li>

                 

                  <!-- <li class="nav-item"> <a href="#steps-commission-tab4" class="nav-link steps-commission" data-toggle="tab" data-payment='binary_matching_bonus'>{{trans('Signup Bonus')}}</a></li> -->

                

                </ul> 

        </div>





                <div class="tab-content">

                  <div class="tab-pane active  " id="steps-commission-tab1">

                  <form id="binaryform" class="form-horizontal" action="{{url('admin/control-panel/add-binarycommission')}}" method="post"  name="form-wizard">

                              {{csrf_field()}}

                            

                    <div class="row">

                       

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.commission_period') }} </label>

                      </div>

                            <div class="col-sm-6">

                            <label class="radio-inline"><input type="radio" name="period" value="instant" {{ ($binary_commission->period === "instant" ? 'checked' : '') }}>{{ trans('controlpanel.instant') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="daily" {{ ($binary_commission->period === "daily" ? 'checked' : '') }}>{{ trans('controlpanel.daily') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="weekly" {{ ($binary_commission->period === "weekly" ? 'checked' : '') }}>{{ trans('controlpanel.weekly') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="monthly" {{ ($binary_commission->period === "monthly" ? 'checked' : '') }}>{{ trans('controlpanel.monthly') }}</label>

                          <!--   <label class="radio-inline"><input type="radio" name="period" value="every" {{ ($binary_commission->period === "every" ? 'checked' : '') }}>{{ trans('controlpanel.every_month_15th_and_30th') }}</label> -->

                            </div>

                        

                    </div>

                    <br>



                    <!--     <div class="row">

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.commission_type') }} </label>

                          </div>

                            <div class="col-sm-6">

                              

                                

                               <select class="form-control selectype" name="type" id="type" required >

                                 <option value="{{$binary_commission->type}}">{{$binary_commission->type}}</option>

                                 @if($binary_commission->type == 'fixed')

                                <option value="percentage" ) >{{ trans('controlpanel.percentage')}}</option>

                                @else

                                <option value="fixed">{{ trans('controlpanel.fixed')}}</option>

                                @endif

                            </select>

                            </div>

                        

                    </div> -->

                    <br>



                        

                    <div class="pair_show">



                         <div class="row">

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.pair_value') }} </label>

                          </div>

                            <div class="col-sm-6">

                            <div class="col-sm-6">

                             
                            </div>

                            </div>

                    </div>

                  

                  

                      <div class="row">

                         <div class="col-sm-4">

                      </div>


                </div>

            </div>

            <br>

 



        

             <br>

 

            <!--   <div class="row">

               <div class="col-sm-4">

               <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.binary_cap') }} </label>

               </div>

                <div class="col-sm-6">

                     <label class="form-check-label d-flex align-items-center">

                         <input name="binary_cap" {{($binary_commission->binary_cap == "yes" ? 'checked' : '' )}}  class="form-check-input form-check-paymentcontrol-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text=" {{trans('controlpanel.off')}}" data-on-color="success" data-on-text=" {{trans('controlpanel.on')}}" data-size="small" id="binary_cap" type="checkbox"/>  

                     </label>

                </div>

              </div> -->

              <br>



               <!-- <div class="cap_show">

                 <div class="row">

                  <div class="col-sm-4">

               <label for="name" class="col-sm-6 control-label">{{ trans('packages.ceiling') }} </label>

               </div>

                <div class="col-sm-2">

                          <input type="number" class="form-control" id="ceiling" placeholder="{{trans('controlpanel.enter_ceiling')}}" name="ceiling" value="{{$binary_commission->ceiling}}">

                       </div>

                   </div>

               </div> -->

               <br>

                <div class="row">

                     <div class="col-sm-4">

               <button class="btn bg-dark" type="submit"> {{trans('controlpanel.save')}}</button>

               </div>

                </div>





          </form>

           </div>





            <!-- <div class="tab-pane fade" id="steps-commission-tab2">



                <form id="levelform" class="form-horizontal" action="{{url('admin/control-panel/add-levelcommission')}}" method="post"  name="form-wizard">

                    {{csrf_field()}}

                    <div class="row">

                       

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.commission_type') }} </label>

                      </div>

                            <div class="col-sm-6">

                            <label class="radio-inline"><input type="radio" name="type" value="fixed" {{ ($level_commission->type === "fixed" ? 'checked' : '') }}>{{ trans('controlpanel.fixed') }}</label>

                            <label class="radio-inline"><input type="radio" name="type" value="percent" {{ ($level_commission->type === "percent" ? 'checked' : '') }}>{{ trans('controlpanel.percent') }}</label>

                           

                            </div>

                        

                    </div>

                    <br>



                        <div class="row">

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.commission_based_on_package') }} </label>

                          </div>

                            <div class="col-sm-6">

                              

                                

                               <select class="form-control seleccriteria" name="criteria" id="criteria" required >

                                 <option value="{{$level_commission->criteria}}">{{$level_commission->criteria}}</option>

                                 @if($level_commission->criteria == 'yes')

                                <option value="no" ) >{{ trans('controlpanel.no')}}</option>

                                @else

                                <option value="yes">{{ trans('controlpanel.yes')}}</option>

                                @endif

                            </select>

                            </div>

                        

                    </div>

                    <br>



                       <div class="levelpack_show">

                        {{ trans('controlpanel.package_level_commission') }}

                      <div class="row">

                          <table class="table table-invoice">

                          <thead>

                         <tr>

                          <th>{{trans('controlpanel.package')}}</th>  

                           <th>{{trans('controlpanel.level_1')}}</th>      

                            <th>{{trans('controlpanel.level_2')}}</th>                       

                            <th>{{trans('controlpanel.level_3')}}</th>                        

                          

                              </tr>

                          </thead>

                        <tbody>

                          

                      

                      @foreach($level_settings as $key=>$level)

                      <tr>

                     <td>

                     {{$level->package}}

                  </td>

                      <td>

                       

                          <input type="number" class="form-control" id="{{$level->id}}" placeholder="{{trans('controlpanel.enter_package_level1_commission')}}" name="levelpack1[]" value="{{$level->commission_level1}}">

                    </td>

                     <td>

                             <input type="number" class="form-control" id="{{$level->id}}" placeholder="{{trans('controlpanel.enter_package_level2_commission')}}" name="levelpack2[]" value="{{$level->commission_level2}}">

                    </td>

                         <td>

                            <input type="number" class="form-control" id="{{$level->id}}" placeholder="{{trans('controlpanel.enter_package_level3_commission')}}" name="levelpack3[]" value="{{$level->commission_level3}}">

                      </td>

                        </tr>

                         



                       @endforeach

                        </tbody>

                        </table>

                </div>

             </div>

              <br>



                       <div class="levelnopack_show">

                      <div class="row">

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.level_commission') }} </label>

                      </div>

                   

                       <div class="col-sm-2">

                         {{trans('controlpanel.level_1')}}

                          <input type="number" class="form-control" id="{{$level_commission->id}}" placeholder="{{trans('controlpanel.enter_level1_commission')}}" name="levelno1" value="{{$level_commission->nlevel_1}}">

                      </div>

                       <div class="col-sm-2">

                          {{trans('controlpanel.level_2')}}

                             <input type="number" class="form-control" id="{{$level_commission->id}}" placeholder="{{trans('controlpanel.enter_level2_commission')}}" name="levelno2" value="{{$level_commission->nlevel_2}}">

                         </div>

                          <div class="col-sm-2">

                              {{trans('controlpanel.level_3')}}

                            <input type="number" class="form-control" id="{{$level_commission->id}}" placeholder="{{trans('controlpanel.enter_package_level3_commission')}}" name="levelno3" value="{{$level_commission->nlevel_3}}">

                       </div>

                       

                </div>

             </div>



          

                <div class="row">

                     <div class="col-sm-4">

               <button class="btn bg-dark" type="submit"> {{trans('controlpanel.save')}}</button>

               </div>

                </div>





          </form>

                </div>

 -->





            <div class="tab-pane fade" id="steps-commission-tab3">





                <form id="levelform" class="form-horizontal" action="{{url('admin/control-panel/add-sponsorcommission')}}" method="post"  name="form-wizard">

                    {{csrf_field()}}

                    <div class="row">

                       

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.commission_period') }} </label>

                      </div>



                           <div class="col-sm-6">

                            <label class="radio-inline"><input type="radio" name="period" value="instant" {{ ($sponsor_commission->period === "instant" ? 'checked' : '') }}>{{ trans('controlpanel.instant') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="daily" {{ ($sponsor_commission->period === "daily" ? 'checked' : '') }}>{{ trans('controlpanel.daily') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="weekly" {{ ($sponsor_commission->period === "weekly" ? 'checked' : '') }}>{{ trans('controlpanel.weekly') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="monthly" {{ ($sponsor_commission->period === "monthly" ? 'checked' : '') }}>{{ trans('controlpanel.monthly') }}</label>

                          <!--   <label class="radio-inline"><input type="radio" name="period" value="every" {{ ($binary_commission->period === "every" ? 'checked' : '') }}>{{ trans('controlpanel.every_month_15th_and_30th') }}</label> -->

                            </div>

                        

                    </div>

                    <br>



                       

                    <br>



                      

              <br>



                       <div class="levelnopack_show">

                     

             </div>



          

                <div class="row">

                     <div class="col-sm-4">

               <button class="btn bg-dark" type="submit"> {{trans('controlpanel.save')}}</button>

               </div>

                </div>





          </form>

                </div>





            <div class="tab-pane fade" id="steps-commission-tab4">

                 <form id="matchingform" class="form-horizontal" action="{{url('admin/control-panel/add-matchingbonus')}}" method="post"  name="form-wizard">

                 {{csrf_field()}}

                              

                    <div class="row">

                       

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('SignUp Bonus ') }} </label>

                      </div>

                           

                               <div class="col-sm-6">

                            <label class="radio-inline"><input type="radio" name="period" value="instant" {{ ($sponsor_commission->period === "instant" ? 'checked' : '') }}>{{ trans('controlpanel.instant') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="daily" {{ ($sponsor_commission->period === "daily" ? 'checked' : '') }}>{{ trans('controlpanel.daily') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="weekly" {{ ($sponsor_commission->period === "weekly" ? 'checked' : '') }}>{{ trans('controlpanel.weekly') }}</label>

                            <label class="radio-inline"><input type="radio" name="period" value="monthly" {{ ($sponsor_commission->period === "monthly" ? 'checked' : '') }}>{{ trans('controlpanel.monthly') }}</label>

                          <!--   <label class="radio-inline"><input type="radio" name="period" value="every" {{ ($binary_commission->period === "every" ? 'checked' : '') }}>{{ trans('controlpanel.every_month_15th_and_30th') }}</label> -->

                          
                           

                            </div>

                        

                    </div>

                    <br>



                       

                    <br>



                       <div class="matchpack_show">

                      <div class="row">

                        

                </div>

             </div>

              <br>



                       <div class="matchnopack_show">

                      <div class="row">

                         <div class="col-sm-4">

                          <label for="name" class="col-sm-6 control-label">{{ trans('controlpanel.matching_bonus') }} </label>

                      </div>

                   

                       <div class="col-sm-2">

                        {{trans('controlpanel.level_1')}}

                       

                          <input type="number" class="form-control" id="{{$matching_bonus->id}}" placeholder="{{trans('controlpanel.enter_level1_matching_bonus')}}" name="matchno1" value="{{$matching_bonus->matching_level1}}">

                      </div>

                       <div class="col-sm-2">

                        {{trans('controlpanel.level_2')}}

                             <input type="number" class="form-control" id="{{$matching_bonus->id}}" placeholder="{{trans('controlpanel.enter_level2_matching_bonus')}}" name="matchno2" value="{{$matching_bonus->matching_level2}}">

                         </div>

                          <div class="col-sm-2">

                            {{trans('controlpanel.level_3')}}

                            <input type="number" class="form-control" id="{{$matching_bonus->id}}" placeholder="{{trans('controlpanel.enter_package_level3_matching_bonus')}}" name="matchno3" value="{{$matching_bonus->matching_level3}}">

                       </div>

                       

                </div>

             </div>



          

                <div class="row">

                     <div class="col-sm-4">

               <button class="btn bg-dark" type="submit"> {{trans('controlpanel.save')}}</button>

               </div>

                </div>





          </form>

                </div>



                </div>

</fieldset>

    </div>

</div>

</div>

@stop



@section('styles')@parent

<style type="text/css">

</style>

@endsection

@section('overscripts') @parent

<script type="text/javascript">

</script>

@endsection



{{-- Scripts --}}

@section('scripts')

@parent

<script type="text/javascript">



    $(document).ready(function(){

        var simple = '<?php echo $type; ?>';

        var binary_cap='<?php echo $binary_cap; ?>';

        var criteria='<?php echo $criteria; ?>';

        var spon_criteria='<?php echo $spon_criteria; ?>';

        var matching_criteria='<?php echo $matching_criteria; ?>';

        if(simple == 'fixed'){

         $(".pair_show").show(); 

         $(".percent_show").hide();

         $(".cap_show").hide(); 

        }

        else{

         $(".pair_show").hide(); 

         $(".percent_show").show();

         $(".cap_show").hide(); 

        }

        if(binary_cap == 'yes'){

          $(".cap_show").show(); 

        }

        else{

          $(".cap_show").hide(); 

        }

        if(criteria == 'yes'){

          $(".levelpack_show").show(); 

          $(".levelnopack_show").hide(); 

        }

        else{

          $(".levelnopack_show").show(); 

          $(".levelpack_show").hide(); 

        }

        if(spon_criteria == 'yes'){

          $(".sponpack_show").show(); 

          $(".sponnopack_show").hide(); 

        }

        else{

            $(".sponnopack_show").show(); 

            $(".sponpack_show").hide();

        }

        if(matching_criteria == 'yes'){

             $(".matchnopack_show").hide(); 

             $(".matchpack_show").show(); 

        }

        else{

            $(".matchnopack_show").show(); 

            $(".matchpack_show").hide();



        }



          

    });

    </script>

    <script type="text/javascript">

       

$('.selectype[name=type]').change(function() {

    var type=$(this).val();

    if(type=='fixed'){

     $(".pair_show").show();

     $(".percent_show").hide();

    }else if(type=='percentage'){

     $(".percent_show").show();

     $(".pair_show").hide();

    }else{

     $(".pair_show").hide();

     $(".percent_show").hide();

     $(".cap_show").hide();

    }



})

</script>



<script type="text/javascript">

    

    $('.seleccriteria[name=criteria]').change(function() {

      var criteria=$(this).val();

      if(criteria=='yes'){

         $(".levelpack_show").show();

         $(".levelnopack_show").hide();

      }else{

         $(".levelnopack_show").show();

         $(".levelpack_show").hide();

      }



    })

</script>



<script type="text/javascript">

    

    $('.selecsponcriteria[name=sponcriteria]').change(function() {

     var criteria=$(this).val();

        if(criteria=='yes'){

         $(".sponpack_show").show(); 

         $(".sponnopack_show").hide(); 

        }else{

         $(".sponnopack_show").show();

         $(".sponpack_show").hide();

        }



    })



</script>



<script type="text/javascript">

    

    $('.selectmatchcriteria[name=matchcriteria]').change(function() {

     var criteria=$(this).val();

        if(criteria=='yes'){

         $(".matchnopack_show").hide(); 

         $(".matchpack_show").show(); 

        }else{

         $(".matchnopack_show").show(); 

         $(".matchpack_show").hide(); 

        }



    })



</script>

    

<script type="text/javascript">

  $(document).ready(function () {

    $('.form-check-paymentcontrol-switch').each(function(e) {

          var switch_elem = $(this);

          key = switch_elem.attr('name');

          val_boolean = switch_elem.bootstrapSwitch('state'); 

          switch_elem.bootstrapSwitch('state', val_boolean);    

    });

  });



  $('.form-check-paymentcontrol-switch').on('switchChange.bootstrapSwitch', function(e) {

    var switch_elem = $(this);

    switch_key = switch_elem.attr('name');

    switch_val_boolean = switch_elem.bootstrapSwitch('state'); 

    $("<input />").attr("type", "hidden")

          .attr("name", "check")

          .attr("value", switch_val_boolean)

          .appendTo("#binaryform");

     if(switch_val_boolean == true){

        $(".cap_show").show();}

     else{

        $(".cap_show").hide();}

  });







</script>

@stop

