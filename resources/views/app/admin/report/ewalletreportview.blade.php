@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('styles') @parent

<style type="text/css">
.invoice>div:not(.invoice-footer) {
    margin-bottom: 43px;
}
.invoice-price .invoice-price-right {
    padding: 3px;
}

.headerfooter{
  background-color:#12c3cc!important;
}

</style>

@endsection
{{-- Content --}}
@section('main')

 
<div class="card card-flat timeline-content">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">{{$title}}</h6>
            <div class="header-elements">
             <!--  <button type="button" class="btn btn-light btn-sm" id="savepdf"><i class="icon-file-check mr-2"></i> Save</button> -->
              <div class="print" >
              <button type="button" class="btn btn-light btn-sm ml-3" onclick="printDiv('invoice-content')"><i class="icon-printer mr-2"></i>  {{trans('report.print')}}</button>
            </div>
             </div>
          </div>

    
    <div id="invoice-content">
          <div class="card-body">
        @include('app.admin.report.reportheader')
        <br>
    	<div class="table-responsive">
    	  <table class="table table-invoice" id = "ewalletreport">
    			<thead class="headerfooter">
    				<tr>
    					<th>{{trans('report.no')}}</th>      
                        <th>{{trans('report.username')}}</th>
                        <th>{{trans('report.full_name')}}</th> 
                        <th>{{trans('report.bonus_from')}}</th>                       
                        <th>{{trans('report.bonus_type')}}</th>                        
                         <th>{{trans('report.amount')}} </th>
                        <th>{{trans('report.date')}} </th>                     
                    </tr>
                </thead>
	            <tbody>
	            	@foreach($reportdata as $key=> $report)
	            	<tr>
	            		<td>{{$key +1 }}</td>	
                        <td>{{$report->username}}</td>
                        <td>{{$report->name}} {{$report->lastname}} </td>
                        <td>{{$report->fromuser}}</td>

	                                    
                        <td>@if($report->payment_type == 'released') Payout Released @else  {{  str_replace('_', ' ', $report->payment_type)}} @endif</td>
                        <td>{{$report->total_amount}}</td>
                        
                        <td>{{ date('d M Y H:i:s',strtotime($report->created_at))}}</td>
					</tr>
	                @endforeach   
				</tbody>
         <tfoot align = "left" class="headerfooter">
        
         
         </tfoot>
        	</table>
        </div>
        	<div class="invoice-price">                       
            	<div class="invoice-price-right">
                  
                	<!-- {{trans('report.total_credit')}} {{ round($totalamount,2)}}  -->
                </div>
            </div>
    </div>
   <!--  <div class="invoice-footer text-muted">
    	<p class="text-center m-b-5">
        	{{trans('report.thank_you_for_your_business')}}
        </p>
        <p class="text-center">
        	<span class="m-r-10"><i class="fa fa-globe"></i> cloudmlmsoftware.com</span>
            <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
            <span class="m-r-10"><i class="fa fa-envelope"></i> info@cloudmlmsoftware.com</span>
        </p>
    </div> -->
</div>  
</div>           
@endsection



@section('scripts') @parent
<script type="text/javascript">
function printDiv(print) {
     var printContents = document.getElementById(print).innerHTML;
     var originalContents = document.body.innerHTML;
     
     document.body.innerHTML = printContents;

     window.print();
        
     document.body.innerHTML = originalContents;
}
    
  </script>
  <script type="text/javascript">


$(document).ready(function() {
$('#ewalletreport').DataTable();
});

</script>


    @endsection