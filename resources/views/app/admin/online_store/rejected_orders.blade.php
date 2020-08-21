@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent

<style type="text/css">

</style>

@endsection @section('main')

<!-- Basic datatable -->

<div class="panel panel-flat">

    <div class="panel-heading">

        <h5 class="panel-title">Rejected Orders</h5>

        <div class="heading-elements">

            <ul class="icons-list">

                <li><a data-action="collapse"></a></li>

            </ul>

        </div>

    </div>

  <!--   <table class="table datatable-basic table-striped table-hover" id="ewallet-table">

                            <thead>

                                <tr>

                                    <th>

                                        {{trans('ewallet.username')}}

                                    </th>

                                    <th>

                                        {{trans('ewallet.from_user')}}

                                    </th>

                                    <th>

                                        {{trans('ewallet.amount_type')}}

                                    </th>

                                    <th>

                                        {{trans('ewallet.debit')}}

                                    </th>

                                 

                                    <th>

                                        {{trans('ewallet.date')}}

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            </tbody>

                        </table> -->

                          <table class="table datatable-basic table-striped table-hover" id="wallet1" >

                           

                <thead>

                    <tr style="background-color: black;color: white;">

                        <th>{{trans('report.no')}}</th>

                                                                    
                        <th>{{trans('report.invoice')}}</th>                                               

                        <th>{{trans('report.username')}}</th>   

                        <th>{{trans('report.shipping_address')}}</th>                                             

                        <th>{{trans('report.total_amount')}}</th>  
                        <th>{{trans('report.status')}}</th> 
                                                                 

                        <th>{{trans('report.date')}}</th>

                        

                        

                    </tr>

                </thead>

                <tbody>

                    @foreach($orders as $key=> $report)

                    <tr>
                        <td>{{ $key +1 }}</td>
                        <td>{{$report->invoice}}</td>
                        <td>{{$report->username}}</td>
                        <td>{{$report->shipping_country}}</td>
                        <td>{{$report->total_amount}}</td>    
                        <td>{{$report->approved_status}}</td>                                  
                        <td>{{ date('d M Y H:i:s',strtotime($report->created_at))}}</td>
                    </tr>

                    @endforeach   

                </tbody>

            </table>

                    </div>

                  

@stop



{{-- Scripts --}}

@section('scripts')

    @parent

    <script type="text/javascript">

$(document).ready(function() {

$('#wallet1').DataTable();

});

</script>

<script type="text/javascript ">

   



</script>

@stop