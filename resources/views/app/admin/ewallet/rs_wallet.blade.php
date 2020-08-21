@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title"> {{trans('ewallet.wallet')}}</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
   <!--  <table id="rs-wallet-table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{{trans('ewallet.username')}}</th>
                <th>{{trans('ewallet.from_user')}}</th>
                <th>{{trans('ewallet.rs_debit')}}</th>
                <th>{{trans('ewallet.rs_credit')}}</th>
                <th>{{trans('ewallet.date')}}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table> -->

     <table class="table table-striped table-hover" id="rs_wallet">
        <thead>
            <tr>
                <th>{{trans('ewallet.no')}}</th>
                <th>{{trans('ewallet.username')}}</th>
                <th>{{trans('ewallet.from_user')}}</th>
                <th>{{trans('ewallet.rs_debit')}}</th>
                <th>{{trans('ewallet.rs_credit')}}</th>
                <th>{{trans('ewallet.date')}}</th>
            </tr>
        </thead>
         <tbody>
                    @foreach($rstable as $key=> $report)
                    <tr>
                        <td>{{$key +1 }}</td>                      
                        <td>{{$report->username}}</td>
                                             
                        <td>{{$report->fromuser}}</td>
                        <td>{{$report->rs_debit}}</td>
                        <td>{{$report->rs_credit}}</td>
                       
                        <td>{{ date('d M Y H:i:s',strtotime($report->created_at))}}</td>
                    </tr>
                    @endforeach   
                </tbody>
            </table>
</div>
@stop {{-- Scripts --}} @section('scripts')
<script type="text/javascript">
$(document).ready(function() {
$('#rs_wallet').DataTable();
});
</script>

 @parent @stop