@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('styles') @parent

<style type="text/css">


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
                      
                        <!-- <th>{{trans('report.userid')}}</th> -->
                        <th>{{trans('report.income')}}</th>
                        <th>{{trans('report.expense')}}</th>                        
                    
                        
                    </tr>
                </thead>
         
                <tbody>
                 
                    
                     <tr>
                                          
                       
                      
                       
                    </tr>
                   
                   
                </tbody>
           <tfoot align = "left" class="headerfooter">
          <th> {{trans('report.total_profit')}}</th> 
         </tfoot>
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
 @endsection