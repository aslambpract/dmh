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
    <div class="card card-flat">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
            {{trans('controlpanel.rank_settings')}}
            </h5> <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
             {!! Form::model($options,['url' => '/admin/control-panel/rank-settings', 'method' => 'PATCH','class'=>'form-vertical optionsform ','data-parsley-validate'=>'true','role'=>'form'] )!!}
            <input type="hidden" name="_token" value="{{ csrf_token()}}"/>

            <fieldset>
                <legend class="text-uppercase font-size-sm font-weight-bold">
                     {{trans('controlpanel.rank_settings')}}
                </legend>


                <div class="table-responsive">
                 <table class="table table-hover">
                            <thead>
                                <th>{{ trans('settings.no') }}</th>
                                <th>{{ trans('settings.rank_name') }}</th>
                                <th>{{ trans('Personal PV') }}</th>
                                <!-- <th>{{ trans('settings.consultant_bonus') }} </th> -->
                               <!--  <th>{{ trans('settings.sales_development_bonus') }} </th> -->
                                <th>{{ trans('Monthly Purchase SV') }} </th>
                               <!--  <th>{{ trans('settings.daily_capping_binary') }} </th>
                                <th>{{ trans('settings.reward_points') }} </th> -->
                                 <th>{{ trans('Total CSV') }} </th>
                                <th>{{ trans('Rank Bonus') }} </th>
                               <!--  <th>{{ trans('settings.monthly_salary') }} </th> -->
                                <!-- <th>{{ trans('settings.franchise_bonus') }} </th> -->
                               <!--  <th>{{ trans('settings.life_insurance') }} </th> -->
                                   



                            </thead>
                            <tbody>
                                @foreach($settings as $rank)
                                <tr>
                                    
                                

                                    <td> {{$rank->id}}</td>


                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="rank_name[{{$rank->id}}]" value="{{$rank->rank_name}}"  style="width:150px;">
                                        </div>
                                        </div>

                                       <!--  <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' id="rank_name" data-title='Enter Rank name' data-name="rank_name">
                                                 {{$rank->rank_name}}
                                        </a> -->
                                    </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="personal_pv[{{$rank->id}}]" value="{{$rank->personal_pv}}" id="personal_pv" style="width:90px;"> 
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    </td> 

                                     </td>
                                     <!-- <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="consultant_bonus[{{$rank->id}}]" value="{{$rank->consultant_bonus}}" id="consultant_bonus">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->

                                      <!-- <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="sales_development_bonus[{{$rank->id}}]" value="{{$rank->sales_development_bonus}}" id="sales_development_bonus">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->

                                     </td> 

                                      <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="monthly_repurchase[{{$rank->id}}]" value="{{$rank->monthly_repurchase}}" id="monthly_repurchase" style="width:90px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    </td> 

                                    <!--  <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="daily_capping_binary[{{$rank->id}}]" value="{{$rank->daily_capping_binary}}" id="daily_capping_binary">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->
                                      <!-- <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="reward_points[{{$rank->id}}]" value="{{$rank->reward_points}}" id="reward_points">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="string" name="total_sales_volume[{{$rank->id}}]" value="{{$rank->total_sales_volume}}" id="total_sales_volume"style="width:100px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    </td> 

                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="rank_bonus[{{$rank->id}}]" value="{{$rank->rank_bonus}}" id="rank_bonus" style="width:120px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    </td> 
                                  <!--   <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="monthly_salary[{{$rank->id}}]" value="{{$rank->monthly_salary}}" id="monthly_salary">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->
                                    <!-- <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="franchise_bonus[{{$rank->id}}]" value="{{$rank->franchise_bonus}}" id="franchise_bonus">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->
                                    <!--  <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="life_insurance[{{$rank->id}}]" value="{{$rank->life_insurance}}" id="life_insurance">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this rank' data-name="top_up">
                                                 {{$rank->top_up}}
                                        </a> -->
                                    <!-- </td>  -->

                                   




















                                  <!--   <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            @if($rank->quali_rank_id)
                                            <input class="form-control" type="text" name="quali_rank_id[{{$rank->id}}]" value="{{$settings[$rank->quali_rank_id - 1]->rank_name}}" id="quali_rank_id">
                                            @else
                                            <input class="form-control" type="text" name="quali_rank_id[{{$rank->id}}]" value="NA" id="quali_rank_id">
                                            @endif
                                        </div>
                                        </div> -->

                                       <!--  <a class="settings form-control" data-pk="{{$rank->id}}" data-type='select' 
                                            data-source="{{URL::to('admin/getallranks')}}"  id="quali_rank_id" data-title='Enter number of personal enrollies need to achieve this rank' data-name="quali_rank_id">
                                            @if($rank->quali_rank_id)
                                                 {{$settings[$rank->quali_rank_id - 1]->rank_name}}
                                            @else
                                                 NA
                                            @endif
                                                
                                        </a> -->
                                  <!--   </td>
                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="quali_rank_count[{{$rank->id}}]" value="{{$rank->quali_rank_count}}" id="quali_rank_count">   
                                        </div>
                                        </div> -->
                                      <!--   <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="quali_rank_count" data-title='Enter number of ranks under them to achive this rank ' data-name="quali_rank_count">
                                                 {{$rank->quali_rank_count}}
                                        </a> -->
                                 <!--    </td>
                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="rank_bonus[{{$rank->id}}]" value="{{$rank->rank_bonus}}" id="rank_bonus">
                                        </div>
                                        </div> -->

                                       <!--  <a class="settings form-control" data-pk="{{$rank->id}}" data-type='text' 
                                            id="rank_bonus" data-title='Enter rank bonus ' data-name="rank_bonus">
                                                 {{$rank->rank_bonus}}
                                        </a> -->
                                 <!--    </td>
                                    <td> -->
                                   <!--   <button type="submit" class="btn bg-dark" value="{{$rank->id}}" name="submit">Save</button> -->
                                     
                                    <!-- </td> -->
                                    <!-- {!! Form::close() !!} -->
                                   <!--  </form> -->
                                    
                                </tr>
                                @endforeach

                            </tbody>    

                        </table>

</div>
            
            </fieldset>
                </div>

            <div class="row" align="right">
                <div class="col-md-12">
                    <div class="col-md-4" align="center">
                        <button class="btn bg-dark" type="submit" style="margin-bottom: 20px;"> {{trans('controlpanel.save')}}</button>
                    </div>
                    <div class="col-md-8"></div>
                </div>
            </div>
                   

{!! Form::close() !!}


        <!-- </div> -->
    </div>
</div>
@stop

@section('styles')@parent
<style type="text/css">
</style>
@endsection

{{-- Scripts --}}
@section('scripts')
@parent
<script type="text/javascript">

</script>
@stop
