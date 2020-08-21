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

            {{trans('Wallet Settings')}}

            </h5> <div class="text-right d-lg-none w-100">

                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 

                </div>

        </div>

        <div class="card-body bordered">

             {!! Form::model($options,['url' => '/admin/control-panel/ewallet_settings', 'method' => 'PATCH','class'=>'form-vertical optionsform ','data-parsley-validate'=>'true','role'=>'form'] )!!}

            <input type="hidden" name="_token" value="{{ csrf_token()}}"/>



            <fieldset>

                <legend class="text-uppercase font-size-sm font-weight-bold">

                     {{trans('Ewallet Settings')}}

                </legend>





                <div class="table-responsive">

                 <table class="table table-hover">

                            <thead>
                                <th>{{ trans('settings.id') }}</th>
                                 <th>{{ trans('settings.type') }}</th>
                                
                                <th>{{ trans('settings.bitcoin_address') }}</th>

                               

                                

                            

                            </thead>

                            <tbody>

                                @foreach($settings as $salary)

                                <tr>

                                    

                                



                                    <td> {{$salary->id}}</td>
                                 <td> {{str_replace('_',' ',$salary->type)}}  </td>
 




                                    <td>

                                        <div class="form-group ">

                                        <div class="input-group">

                                            <input class="form-control" type="text" name="bitcoin_address[{{$salary->id}}]" value="{{$salary->bitcoin_address}}"  style="width:150px;">

                                        </div>

                                        </div>


 

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

