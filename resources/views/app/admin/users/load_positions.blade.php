@extends('app.admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop
@section('styles')
@parent


@endsection
{{-- Content --}}
@section('main')
    
         @include('flash::message')

      @include('utils.errors.list')

<div class="card card-flat" >
	<div class="card-header header-elements-inline">
    	<div class="card-header header-elements-inline-btn">
			
        <h4 class="card-title">{{trans('adminuser.add_number_of_positions')}} </h4>
            
            
            
        </div>
     </div>
     <div class="card-body">
    <form action="{{url('admin/users/load_positions')}}" class="smart-wizard form" method="post"  >
    <input type="hidden" name="_token" value="{{csrf_token()}}">


          
        <div class="form-group">
            <label class="col-sm-2 col-form-label" for="amount">
                 {{trans('adminuser.load_position')}}: <span class="symbol required"></span>
            </label>
                <div class="col-sm-4">
                <input type="text" id="load_position" name="load_position" class="form-control" required>
            </div>           
        </div>
       
         
         <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-4">
                        
                        <button type="reset" class="btn btn-sm btn-secondary">
                        <span class="glyphicon glyphicon-remove-circle"></span> {{
                        trans("modal.reset") }}
                        </button>
                        <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        
                        {{ trans("modal.Add") }}
                        
                        </button>
                    </div>
                </div>


    </form>
</div>
    



	</div>


              

           

            
@endsection
