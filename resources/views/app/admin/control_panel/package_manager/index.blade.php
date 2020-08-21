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

                Circle Settings

            </h5>

             <div class="text-right d-lg-none w-100">

                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 

                </div>

        </div>

        <div class="card-body bordered">





             <div class="table-responsive">

             <table class="table table-striped">

                            <thead> 

                                <th>{{ trans('Circle') }} </th>

                                <th>{{ trans('Amount') }}</th>

                                 <th>{{ trans('Position In Fly') }}(BTC)</th>

                                <th>{{ trans('Accounts In Infinity') }}</th>

                                <th>{{ trans('Positions In Infinitiy') }}(Count)</th>

                                <th>{{ trans('Payout') }}(BTC) </th>                                

                                <th>{{ trans('Special Wallet') }} </th>                                

                            </thead>

                            <tbody>

                                @foreach($packages as $package)



                                <tr>

                                    <td>   {{$package->package}} </td>
                                     <td>  {{$package->amount}}  </td>
                                     <td>  {{$package->positions_in_fly}} </td>                   
                                    <td> {{$package->accounts_in_infinity}} </td>
                                     <td>  {{$package->positions_in_infinity}}  </td>  
                                     <td>  {{$package->payout}}  </td>
                                     <td>  {{$package->special_wallet}}  </td>
                                      <td>

                                         <a href="{{url('admin/control-panel/package-manager/edit/'.$package->id)}}"> {{trans('controlpanel.view')}}/{{trans('controlpanel.edit')}} <i class="icon-play3 ml-2"></i></a>

                                        

                                       </td> 

                                </tr>  

                                @endforeach

                                

                            </tbody>





                          </table>  

                      </div>



           







        </div>

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

