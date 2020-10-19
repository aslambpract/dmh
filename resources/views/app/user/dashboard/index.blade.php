@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop  {{-- Content --}} @section('main') 

@section('styles') 

@parent 
  <!-- <style type="text/css"> .bg-sty{ background-color:#00c0ef; } .bg-sty1{ background-color:#00c0ef; } .bg-sty2{ background-color:#00c0ef; } .bg-sty2{ background-color:#00c0ef; } .fon-sty h6{ font-size: 17px; } .dashboard-records .card { min-height: 125px; } </style>     -->
   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->


@endsection

@section('scripts')

@parent 

 

@endsection


 
@section('main') 




<div class="row" >

                <div class="col-md-3 col-sm-6 text-dark">

                    
					<div class="card metric bg-sty1 text-dark">

					    <div class="card-header border-0 header-elements-inline pb-0">

					        <h6 class="card-title">Total fund credit</h6>

					    </div>

					    <div class="card-body pt-0 pb-0 text-dark">

					            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{$total_credit}} </h3>
					        
					         

					    </div>

					</div>

                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="card metric bg-sty1 text-dark">

					    <div class="card-header border-0 header-elements-inline pb-0">

					        <h6 class="card-title">Total Income</h6>

					    </div>

					    <div class="card-body pt-0 pb-0 text-dark">

					            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ 00 }} </h3>
					        
					         

					    </div>

					</div>

                </div>


<!-- 
                <div class="col-md-3 col-sm-6">

                    <div class="card metric bg-sty1 text-dark">

					    <div class="card-header border-0 header-elements-inline pb-0">

					        <h6 class="card-title">Total positions</h6>

					    </div>

					    <div class="card-body pt-0 pb-0 text-dark">

					            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ 00 }} </h3>
					        
					         

					    </div>

					</div>

                </div>  -->







               <div class="col-md-3 col-sm-6">

                     <div class="card metric bg-sty1 text-dark">

					    <div class="card-header border-0 header-elements-inline pb-0">

					        <h6 class="card-title">Balance</h6>

					    </div>

					    <div class="card-body pt-0 pb-0 text-dark">

					            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ 00 }} </h3>
					        
					         

					    </div>

					</div>

                </div> 

                 <div class="col-md-3 col-sm-6">

                     <div class="card metric bg-sty1 text-dark">

                        <div class="card-header border-0 header-elements-inline pb-0">

                            <h6 class="card-title">Maximum Level</h6>

                        </div>

                        <div class="card-body pt-0 pb-0 text-dark">

                                <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{$maximum_level}} </h3>
                            
                             

                        </div>

                    </div>

                </div> 


                     

                     <!-- <div class="col-md-3 col-sm-6">
                     	<div class="card metric bg-sty1 text-dark">
                     		<div class="card-header border-0 header-elements-inline pb-0">
                     			<h6 class="card-title">Circle 0</h6>
                     		</div>
                     		<div class="card-body pt-0 pb-0 text-dark">
                     			<h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $user_phase1 }} </h3>
                     		</div>
                     	</div>
                     </div>

                     <div class="col-md-3 col-sm-6">
                     	<div class="card metric bg-sty1 text-dark">
                     		<div class="card-header border-0 header-elements-inline pb-0">
                     			<h6 class="card-title">Circle 1</h6>
                     		</div>
                     		<div class="card-body pt-0 pb-0 text-dark">
                     			<h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $user_phase2 }} </h3>
                     		</div>
                     	</div>
                     </div>

                     <div class="col-md-3 col-sm-6">
                     	<div class="card metric bg-sty1 text-dark">
                     		<div class="card-header border-0 header-elements-inline pb-0">
                     			<h6 class="card-title">Circle 2</h6>
                     		</div>
                     		<div class="card-body pt-0 pb-0 text-dark">
                     			<h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $user_phase3 }} </h3>
                     		</div>
                     	</div>
                     </div>


                     <div class="col-md-3 col-sm-6">
                     	<div class="card metric bg-sty1 text-dark">
                     		<div class="card-header border-0 header-elements-inline pb-0">
                     			<h6 class="card-title">Circle 3</h6>
                     		</div>
                     		<div class="card-body pt-0 pb-0 text-dark">
                     			<h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $user_phase4 }} </h3>
                     		</div>
                     	</div>
                     </div>


                     <div class="col-md-3 col-sm-6">
                     	<div class="card metric bg-sty1 text-dark">
                     		<div class="card-header border-0 header-elements-inline pb-0">
                     			<h6 class="card-title">Circle 4</h6>
                     		</div>
                     		<div class="card-body pt-0 pb-0 text-dark">
                     			<h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $user_phase5 }} </h3>
                     		</div>
                     	</div>
                     </div> -->



                 </div>

       



<div class="row display-flex">
 
    <div class="col-xl-6 col-sm-6">
       
        @include('app.user.dashboard.widget_join_graph')
       
    </div>

        <div class="col-xl-6 col-sm-6">
       
        @include('app.user.dashboard.widget_maps')
       
    </div>

   
</div>

<br>

<div class="panel panel-inverse">

    <div class="panel-body"> 


           
            @include('app.user.dashboard.widget_share_referral')
            <!-- @include('app.user.dashboard.widget_share_referral') -->



 



             
 

@endsection





@section('scripts')

@parent

<script type="text/javascript">

</script>

@endsection

