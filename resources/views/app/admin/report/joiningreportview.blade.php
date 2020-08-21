@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('styles') @parent

@endsection
{{-- Content --}}
@section('main')
<div class="card card-flat timeline-content">
        <div class="card-header bg-transparent header-elements-inline">
            <h6 class="card-title">{{$title}}</h6>
            <div class="header-elements">
             <!--  <button type="button" class="btn btn-light btn-sm" id="savepdf"><i class="icon-file-check mr-2"></i> Save</button> -->
              <div class="print" >
              <button type="button" class="btn btn-light btn-sm ml-3" onclick="printDiv('invoice-content')"><i class="icon-printer mr-2"></i> {{trans('report.print')}}</button>
            </div>
             </div>
          </div>

    
    <div id="invoice-content">
          <div class="card-body">
        @include('app.admin.report.reportheader')
        <br>

    	<div class="table-responsive">
    		  <table class="table table-invoice" id ="joining_report" >
    			<thead  >
    				<tr style="background-color: black;color: white;">
    					<th>{{trans('report.no')}}</th>
    					<th>{{trans('report.username')}}</th>
						<th>{{trans('report.first_name')}}</th>
                        <th>{{trans('report.last_name')}}</th>
                        <th>{{trans('report.email')}}</th>
                        <th>{{trans('report.consultant_username')}}</th>
                        <th>{{trans('report.business_plan')}}</th>

                       
                      
                        <th>{{trans('report.date_joined')}}</th>
                    </tr>
                </thead>
	            <tbody>
	            	@foreach($reportdata as $key=>$report)
	            	<tr>
	            		<td>{{ $key +1 }}</td>
	                    <td>{{$report->username}}</td>
	                    <td>{{$report->name}}</td>
	                    <td>{{$report->lastname}}</td>
	                    <td>{{$report->email}}</td>
                      <td>{{$report->sponsor}}</td>
                      <td>{{$report->pack}}</td>


	                   
	                    <td>{{ date('d M Y H:i:s',strtotime($report->created_at))}}</td>
					</tr>
	                @endforeach   
				</tbody>
        
        	</table>
        </div>
        </div>
       
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
$('#joining_report').DataTable();
});

</script>
    @endsection