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
            {{trans('Sign up Bonus Settings')}}
            </h5> <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
             {!! Form::model($options,['url' => '/admin/control-panel/sign_up_bonus_settings', 'method' => 'PATCH','class'=>'form-vertical optionsform ','data-parsley-validate'=>'true','role'=>'form'] )!!}
            <input type="hidden" name="_token" value="{{ csrf_token()}}"/>

            <fieldset>
                <legend class="text-uppercase font-size-sm font-weight-bold">
                     {{trans('Sign up Bonus Settings')}}
                </legend>


                <div class="table-responsive">
                 <table class="table table-hover">
                            <thead>
                                <th>{{ trans('settings.no') }}</th>
                                 <th>{{ trans('Rank') }}</th>
                                <th>{{ trans('Qualify Personalsv') }}</th>
                                <th>{{ trans('Income') }}</th>
                                <th>{{ trans('Capping') }} </th>
                                                              
                            </thead>
                            <tbody>
                                @foreach($settings as $signup)
                                <tr>
                                    
                                

                                    <td> {{$signup->id}}</td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="rank[{{$signup->id}}]" value="{{$signup->rank}}"  style="width:150px;">
                                        </div>
                                        </div>

                                       <!--  <a class="settings form-control" data-pk="{{$signup->id}}" data-type='text' id="signup_name" data-title='Enter signup name' data-name="signup_name">
                                                 {{$signup->signup_name}}
                                        </a> -->
                                    </td>


                                    <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="qualify_personal_sv[{{$signup->id}}]" value="{{$signup->qualify_personal_sv}}"  style="width:150px;">
                                        </div>
                                        </div>

                                       <!--  <a class="settings form-control" data-pk="{{$signup->id}}" data-type='text' id="signup_name" data-title='Enter signup name' data-name="signup_name">
                                                 {{$signup->signup_name}}
                                        </a> -->
                                    </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="number" name="income[{{$signup->id}}]" value="{{$signup->income}}" id="income">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$signup->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this signup' data-name="top_up">
                                                 {{$signup->top_up}}
                                        </a> -->
                                    </td> 

                                     </td>
                                     <td>
                                        <div class="form-group ">
                                        <div class="input-group">
                                            <input class="form-control" type="string" name="capping[{{$signup->id}}]" value="{{$signup->capping}}" id="capping" style="width:10px;">
                                        </div>
                                        </div>

                                        <!-- <a class="settings form-control" data-pk="{{$signup->id}}" data-type='text' 
                                            id="top_up" data-title='Enter number of personal enrollies need to achieve this signup' data-name="top_up">
                                                 {{$signup->top_up}}
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
