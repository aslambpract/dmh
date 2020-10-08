 

<div class="col-sm-3">
	<div class="card metric bg-sty1  text-dark">
    <div class="card-header border-0 header-elements-inline pb-0">
        <h6 class="card-title"> {{trans('Network Members')}}</h6>
    </div>
    <div class="card-body pt-0 pb-0  text-dark">
        <div class="d-flex mt-2">
            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{$user_account_count}} </h3>
        </div>  
    </div>
</div>

</div>

<div class="col-sm-3">
	<div class="card metric bg-sty1  text-dark">
	    <div class="card-header border-0 header-elements-inline pb-0">
	        <h6 class="card-title">{{trans('dashboard.members_income')}}</h6>
	    </div>
	    <div class="card-body pt-0 pb-0  text-dark">
	        <div class="d-flex mt-2">
	            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{$total_amount}} </h3>            
	        </div>
	    </div>
	</div>
</div>

<div class="col-sm-3">
	<div class="card metric bg-sty1  text-dark">
	    <div class="card-header border-0 header-elements-inline pb-0">
	        <h6 class="card-title">Items In Mail Box</h6>
	    </div>
	    <div class="card-body pt-0 pb-0  text-dark">
	        <div class="d-flex mt-2">
	            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{$total_messages}} </h3>  
	        </div>       
	    </div>
	</div>
</div>


<div class="col-sm-3">
	<div class="card metric bg-sty2  text-dark">
		<div class="card-header border-0 header-elements-inline pb-0">
			<h6 class="card-title">{{trans('Total Payout')}}</h6>
		</div>
		<div class="card-body pt-0 pb-0  text-dark">
			<div class="d-flex mt-2">
				<h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $total_payout  }} </h3>
			</div>
		</div>
	</div>
</div>
