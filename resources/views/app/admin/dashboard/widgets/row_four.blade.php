<div class="col-sm-3">
	<div class="card metric bg-sty1  text-dark">
	    <div class="card-header border-0 header-elements-inline pb-0">
	        <h6 class="card-title">{{trans('Total Activated Positions')}}</h6>
	    </div>
	    <div class="card-body pt-0 pb-0  text-dark">
	        <div class="d-flex mt-2">
	            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $approved_positions}} </h3>         
	        </div>
	    </div>
	</div>
</div>


<div class="col-sm-3">
	<div class="card metric bg-sty2   text-dark">
	    <div class="card-header border-0 header-elements-inline pb-0"><h6 class="card-title">{{trans('Position BTC Wallet')}}</h6>
	    </div>
	    <div class="card-body pt-0 pb-0  text-dark">
	        <div class="d-flex mt-2">
	            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">           {{ $positions_wallet }} </h3>          
	        </div>
	    </div>
	</div>
	
</div>

<div class="col-sm-3">
	<div class="card metric bg-sty2  text-dark">
	    <div class="card-header border-0 header-elements-inline pb-0">
	        <h6 class="card-title">{{trans('Special wallet')}}</h6>   
	    </div>
	    <div class="card-body pt-0 pb-0  text-dark">
	        <div class="d-flex mt-2">
	            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $special_wallet }} </h3>             
	        </div>      
	    </div>
	</div>
	
</div>

<div class="col-sm-3">
	<div class="card metric bg-sty1  text-dark">
	    <div class="card-header border-0 header-elements-inline pb-0"><h6 class="card-title">Positions infly BTC</h6>
	    </div>
	    <div class="card-body pt-0 pb-0  text-dark">
	        <div class="d-flex mt-2">
	            <h3 class="text-4xl no-margin  font-weight-semibold mt-1 mb-0">{{ $positions_infinity}} </h3>
	        </div>
	    </div>
	</div>
	
</div>