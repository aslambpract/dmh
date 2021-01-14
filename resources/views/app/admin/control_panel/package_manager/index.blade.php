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
<form action="{{URL::to('admin/control-panel/update_refferal_bonus')}}" method="get">
<div id="refferal">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
               Refferal Settings
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
        <div class="form-group row">

        <label class="col-form-label col-lg-5">Refferal Bonus</label>

         <div class="col-lg-6">

       
        <div class="input-group">
            <input class="form-control" type="text" name="refferal_bonus" value="{{$refferal_bonus}}" >
                                 
                                 
         </div>
                                    
        </div>
           <button class="btn bg-dark Content-center" type="submit">Save</button>  
</div>   

        </div>
    </div>
</div>
</form>
<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
                Bronze
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <th>Stages</th>
                    <th>Fee</th>
                    <th>Upline Fee</th>
                    <th>Upgrade Fee</th>
                    <th>Charge</th>
                    <th>Member Benefit</th>
                    <th>Downline Bonus</th>
                    <th>Insurance Completing Fee</th>
                    <th>LongRich Registration Fee</th>
                    <th>Insurance Registration Fee</th>
                </thead>

                <tbody>

                    @foreach($bronze as $package)
                    <tr>
                        <td>{{$package->package}} </td>
                        <td>{{$package->fee}}  </td>
                        <td>{{$package->upline_fee}}  </td>
                        <td>{{$package->upgrade_fee}} </td> <td>{{$package->charge}} </td>
                        <td>{{$package->member_benefit}}  </td>  
                        <td>{{$package->downline_bonus}}  </td>
                        <td>{{$package->insurace_completing_fee}}  </td>
                        <td>{{$package->longrich_reg_fee}}  </td>
                        <td>{{$package->insurance_reg_fee}}  </td>

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

<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
               Silver
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <th>Stages</th>
                    <th>Fee</th>
                    <th>Upline Fee</th>
                    <th>Upgrade Fee</th>
                    <th>Charge</th>
                    <th>Member Benefit</th>
                    <th>Downline Bonus</th>
                    <th>Insurance Completing Fee</th>
                    <th>LongRich Registration Fee</th>
                    <th>Insurance Registration Fee</th>
                </thead>

                <tbody>

                    @foreach($silver as $package)
                    <tr>
                        <td>{{$package->package}} </td>
                        <td>{{$package->fee}}  </td>
                        <td>{{$package->upline_fee}}  </td>
                        <td>{{$package->upgrade_fee}} </td> <td>{{$package->charge}} </td>
                        <td>{{$package->member_benefit}}  </td>  
                        <td>{{$package->downline_bonus}}  </td>
                        <td>{{$package->insurace_completing_fee}}  </td>
                        <td>{{$package->longrich_reg_fee}}  </td>
                        <td>{{$package->insurance_reg_fee}}  </td>

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
<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
               Gold
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <th>Stages</th>
                    <th>Fee</th>
                    <th>Upline Fee</th>
                    <th>Upgrade Fee</th>
                    <th>Charge</th>
                    <th>Member Benefit</th>
                    <th>Downline Bonus</th>
                    <th>Insurance Completing Fee</th>
                    <th>LongRich Registration Fee</th>
                    <th>Insurance Registration Fee</th>
                </thead>

                <tbody>

                    @foreach($gold as $package)
                    <tr>
                        <td>{{$package->package}} </td>
                        <td>{{$package->fee}}  </td>
                        <td>{{$package->upline_fee}}  </td>
                        <td>{{$package->upgrade_fee}} </td> <td>{{$package->charge}} </td>
                        <td>{{$package->member_benefit}}  </td>  
                        <td>{{$package->downline_bonus}}  </td>
                        <td>{{$package->insurace_completing_fee}}  </td>
                        <td>{{$package->longrich_reg_fee}}  </td>
                        <td>{{$package->insurance_reg_fee}}  </td>

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

<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
               Platinum
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <th>Stages</th>
                    <th>Fee</th>
                    <th>Upline Fee</th>
                    <th>Upgrade Fee</th>
                    <th>Charge</th>
                    <th>Member Benefit</th>
                    <th>Downline Bonus</th>
                    <th>Insurance Completing Fee</th>
                    <th>LongRich Registration Fee</th>
                    <th>Insurance Registration Fee</th>
                </thead>

                <tbody>

                    @foreach($platinum as $package)
                    <tr>
                        <td>{{$package->package}} </td>
                        <td>{{$package->fee}}  </td>
                        <td>{{$package->upline_fee}}  </td>
                        <td>{{$package->upgrade_fee}} </td> <td>{{$package->charge}} </td>
                        <td>{{$package->member_benefit}}  </td>  
                        <td>{{$package->downline_bonus}}  </td>
                        <td>{{$package->insurace_completing_fee}}  </td>
                        <td>{{$package->longrich_reg_fee}}  </td>
                        <td>{{$package->insurance_reg_fee}}  </td>

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

<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
               Diamond
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <th>Stages</th>
                    <th>Fee</th>
                    <th>Upline Fee</th>
                    <th>Upgrade Fee</th>
                    <th>Charge</th>
                    <th>Member Benefit</th>
                    <th>Downline Bonus</th>
                    <th>Insurance Completing Fee</th>
                    <th>LongRich Registration Fee</th>
                    <th>Insurance Registration Fee</th>
                </thead>

                <tbody>

                    @foreach($diamond as $package)
                    <tr>
                        <td>{{$package->package}} </td>
                        <td>{{$package->fee}}  </td>
                         <td>{{$package->upline_fee}}  </td>
                        <td>{{$package->upgrade_fee}} </td> <td>{{$package->charge}} </td>
                        <td>{{$package->member_benefit}}  </td>  
                        <td>{{$package->downline_bonus}}  </td>
                        <td>{{$package->insurace_completing_fee}}  </td>
                        <td>{{$package->longrich_reg_fee}}  </td>
                        <td>{{$package->insurance_reg_fee}}  </td>

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

<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
               Diamond 1
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <th>Stages</th>
                    <th>Fee</th>
                    <th>Upline Fee</th>
                    <th>Upgrade Fee</th>
                    <th>Charge</th>
                    <th>Member Benefit</th>
                    <th>Downline Bonus</th>
                    <th>Insurance Completing Fee</th>
                    <th>LongRich Registration Fee</th>
                    <th>Insurance Registration Fee</th>
                </thead>

                <tbody>

                    @foreach($diamond1 as $package)
                    <tr>
                        <td>{{$package->package}} </td>
                        <td>{{$package->fee}}  </td>
                        ]<td>{{$package->upline_fee}}  </td>
                        <td>{{$package->upgrade_fee}} </td> <td>{{$package->charge}} </td>
                        <td>{{$package->member_benefit}}  </td>  
                        <td>{{$package->downline_bonus}}  </td>
                        <td>{{$package->insurace_completing_fee}}  </td>
                        <td>{{$package->longrich_reg_fee}}  </td>
                        <td>{{$package->insurance_reg_fee}}  </td>

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

