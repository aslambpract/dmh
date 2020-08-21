@extends('app.admin.layouts.default')
@section('page_class', 'sidebar-xs') 
{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop
@section('styles')
@parent
@endsection
@section('sidebar')
@parent
<!-- Secfondary sidebar -->
@include('app.admin.control_panel.sidebar')
<!-- /secondary sidebar -->
@endsection


        {{-- Content --}}
        @section('main')



<div id="settings-page">
    <div class="card card-flat">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
            {{trans('all.salary_settings')}}
            </h5> <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
             {!! Form::model($options,['url' => '/admin/control-panel/salary_settings', 'method' => 'PATCH','class'=>'form-vertical optionsform ','data-parsley-validate'=>'true','role'=>'form'] )!!}
            <input type="hidden" name="_token" value="{{ csrf_token()}}"/>

            <fieldset>
                <legend class="text-uppercase font-size-sm font-weight-bold">
                     {{trans('all.salary_settings')}}
                </legend>


                <div class="table-responsive">
                 <table class="table table-hover">
                            <thead>
                                <th>{{ trans('settings.no') }}</th>
                                <th>{{ trans('Post Name') }}</th>
                                <th>{{ trans('Monthly Repurchase') }}</th>
                                <th>{{ trans('Calculation Periods') }} </th>
                                <th>{{ trans('Percentage') }} </th>
                                <th>{{ trans('Sales Volume') }} </th>
                                 <th>{{ trans('Closing Date') }} </th>
                                <!-- <th>{{ trans('Ratio') }} </th> -->
                                <!-- <th>{{ trans('Payment') }} </th>
                                <th>{{ trans('Carry Forward Volume') }}  --></th>
                            
                            </thead>
                            <tbody>
                                @foreach($settings as $salary)
                                <tr>
                                    
                                

                                    <td> {{$salary->id}}</td>


                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="post_name[{{$salary->id}}]" value="{{$salary->post_name}}"  style="width:150px;">
                                        </div>
                                        </div>

                                       <!--  <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' id="salary_name" data-title='Enter salary name' data-name="salary_name">
                                                 {{$salary->salary_name}}
                                        </a> -->
                                    </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="monthly_repurchase[{{$salary->id}}]" value="{{$salary->monthly_repurchase}}" id="monthly_repurchase" style="width:10px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    </td> 

                                     </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="calculation_periods[{{$salary->id}}]" value="{{$salary->calculation_periods}}" id="calculation_periods">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    </td> 


                                        <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="ratio[{{$salary->id}}]" value="{{$salary->ratio}}" id="ratio" style="width:90px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    </td> 


                                      <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="sales_volume[{{$salary->id}}]" value="{{$salary->sales_volume}}" id="sales_volume" style="width:100px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    </td> 

                                        <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="date" name="closing_date[{{$salary->id}}]" value="{{$salary->closing_date}}" id="closing_date">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    </td> 

                                     </td> 

                                    <!--   <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="ratio[{{$salary->id}}]" value="{{$salary->ratio}}" id="ratio" style="width:100px;">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    <!-- </td>  -->

                                   <!--   <td>
                                         <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="string" name="payment[{{$salary->id}}]" value="{{$salary->payment}}" id="payment" style="width:160px;">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    <!-- </td>  -->
                                     <!--  <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="string" name="carry_forward_volume[{{$salary->id}}]" value="{{$salary->carry_forward_volume}}" id="carry_forward_volume"style="width:210px;">
                                        </div>
                                        </div> -->

                                        <!-- <a class="settings form-control" data-pk="{{$salary->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this salary' data-name="top_up">
                                                 {{$salary->top_up}}
                                        </a> -->
                                    <!-- </td>                                    -->
                              

                                    
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
