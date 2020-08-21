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
            {{trans('controlpanel.riward_settings')}}
            </h5> <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
             {!! Form::model($options,['url' => '/admin/control-panel/riward_settings', 'method' => 'PATCH','class'=>'form-vertical optionsform ','data-parsley-validate'=>'true','role'=>'form'] )!!}
            <input type="hidden" name="_token" value="{{ csrf_token()}}"/>

            <fieldset>
                <legend class="text-uppercase font-size-sm font-weight-bold">
                     {{trans('controlpanel.riward_settings')}}
                </legend>


                <div class="table-responsive">
                 <table class="table table-hover">
                            <thead>
                                <th>{{ trans('settings.no') }}</th>
                                <th>{{ trans('Rank') }}</th>
                                <th>{{ trans('Percentage') }}</th>
                                <th>{{ trans('Minimum Monthly Income') }} </th>
                                <th>{{ trans('Points') }} </th>
                                <th>{{ trans('Allow To User After Six Months') }} </th>                              
                            </thead>
                            <tbody>
                                @foreach($settings as $riward)
                                <tr>
                                    
                                

                                    <td> {{$riward->id}}</td>


                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="rank[{{$riward->id}}]" value="{{$riward->rank}}"  style="width:150px;">
                                        </div>
                                        </div>

                                       <!--  <a class="settings form-control" data-pk="{{$riward->id}}" data-type='text' id="riward_name" data-title='Enter riward name' data-name="riward_name">
                                                 {{$riward->riward_name}}
                                        </a> -->
                                    </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="percentage[{{$riward->id}}]" value="{{$riward->percentage}}" id="percentage">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$riward->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this riward' data-name="top_up">
                                                 {{$riward->top_up}}
                                        </a> -->
                                    </td> 

                                     </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="mini_monthly_income[{{$riward->id}}]" value="{{$riward->mini_monthly_income}}" id="mini_monthly_income" style="width:100px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$riward->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this riward' data-name="top_up">
                                                 {{$riward->top_up}}
                                        </a> -->
                                    </td> 

                                      <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="points[{{$riward->id}}]" value="{{$riward->points}}" id="points" style="width:100px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$riward->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this riward' data-name="top_up">
                                                 {{$riward->top_up}}
                                        </a> -->
                                    </td> 

                                     </td> 

                                      <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="string" name="allow_after_six_months[{{$riward->id}}]" value="{{$riward->allow_after_six_months}}" id="allow_after_six_months"style="width:200px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$riward->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this riward' data-name="top_up">
                                                 {{$riward->top_up}}
                                        </a> -->
                                    </td> 

                                    
                                    
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
