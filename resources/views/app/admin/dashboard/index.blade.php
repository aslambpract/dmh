@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop
{{-- Content --}} @section('main')
@section('styles')
@parent
<style type="text/css">
.dashboard-records .card {
min-height: auto !important;
}
</style>
@endsection
@section('scripts')
@parent

@endsection

<div class="row dashboard-records" id="dashboard-records-1">

 
     <div class="col-xl-12">
            <a href="http://infinity-btc.cloudmlm.online/cron/dbclear" class="btn btn-danger"> Database refresh</a>
            <a href="http://infinity-btc.cloudmlm.online/cron/register/100" class="btn btn-info">Register 100 Users</a>
            <a href="http://infinity-btc.cloudmlm.online/cron/register/200" class="btn btn-info">Register 200 Users</a>
    </div>
    <div class="col-xl-12">


        <div class="row">
               @include('app.admin.dashboard.widgets.row_one')
        </div>
        <div class="row">
               @include('app.admin.dashboard.widgets.row_two')
        </div>
        <div class="row">
               @include('app.admin.dashboard.widgets.row_three')
        </div>
        <div class="row">
               @include('app.admin.dashboard.widgets.row_four')
        </div>
 
    </div>
    

</div>
 

<div class="row display-flex">
 
    <div class="col-xl-6 col-sm-6">
       
        @include('app.admin.dashboard.widgets.counter_counter')
       
    </div>

    <div class="col-xl-6 col-sm-6">
        <!--JOIN_MAP WIDGET START-->
        @include('app.admin.dashboard.widgets.promotional_share_referral')
        <!--JOIN_MAP WIDGET END-->
    </div>
</div>
 

 

@endsection


@section('scripts')
@parent
@endsection