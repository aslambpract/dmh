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
    		 <table class="table table-invoice" id = "payoutreport">
    			<thead class="headerfooter">
    				<tr>
    					<th>{{trans('report.no')}}</th>
                        <!-- <th>{{trans('report.userid')}}</th> -->
    					<th>{{trans('report.username')}}</th>
						<th>{{trans('report.fullname')}}</th>                        
                        <th>{{trans('report.bank_details')}}</th>
                        
                        <th>{{trans('report.amount_released')}}</th>
                        
                        <th>{{trans('report.date')}} </th>
                        
                    </tr>
                </thead>
	            <tbody>
	            	@foreach($reportdata as $key=> $report)
	            	<tr>
	            		<td>{{$key +1 }}</td>	                   
                        <!-- <td>{{$report->id}}</td> -->
	                    <td>{{$report->username}}</td>
	                    <td>{{$report->name}} {{$report->lastname}}</td>	                   
                        <td>
                          <span style="font-weight: 700;">  {{trans('report.acc_name')}} : </span><br> {{$report->account_holder_name}} <br>
                          <span style="font-weight: 700;">  {{trans('report.acc_no')}}:</span><br> {{$report->account_number}} <br>
                          <span style="font-weight: 700;">  {{trans('report.bank_name')}}:</span><br> {{$report->sort_code}} <br>
                            </td>
                       
	                    <td>{{date('d-M-Y H:i:s',strtotime($report->created_at))}}</td>
					</tr>
	                @endforeach   
				</tbody>
           <tfoot align = "left" class="headerfooter">
          <th></th><th></th><th></th><th> {{trans('report.total')}}</th> <th>

         </tfoot>
        	</table>
        </div>
        	<!-- <div class="invoice-price">                       
            	<div class="invoice-price-right col-sm-offset-6">
                	{{trans('report.total_amount')}}  $ {{number_format($totalamount,2)}}
                </div>
            </div> -->
    </div>
  <!--   <div class="invoice-footer text-muted">
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
    @endsection