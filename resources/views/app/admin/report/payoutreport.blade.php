@extends('app.admin.layouts.default')



{{-- Web site Title --}}

@section('title') {{{ $title }}} :: @parent @stop

@section('styles')

@parent


<link href="{{asset('assets/globals/plugins/choosen/css/chosen.css')}}" rel="stylesheet">





@endsection

{{-- Content --}}

@section('main')



      @include('utils.errors.list')



<div class="card card-flat timeline-content">
                    <div class="card-header header-elements-inline">
                        <h4 class="card-title">{{trans('report.payout_released_report')}}</h4>

     </div>

     <div class="card-body"> 

     <form action="{{URL::to('admin/payoutreport')}}" method="post">

     	<input type="hidden" name="_token"  value="{{csrf_token()}}">

     	<div class="row">

     		<div class="form-group col-sm-6">

	     		<label class="form-label col-sm-4">{{trans('report.pick_start_date')}}</label>

	     		<div class="col-sm-6">

	     			<div class="input-group"> 

	     				<input type="text" autocomplete="off" class="form-control daterange-single" name="start" id="start" value="{{ date('m/01/Y') }}"  required="true">

	     			<span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar22 "></i></span>
                                        </span>

	     		



	     			</div>

	     		</div>

	     	</div>

	     	<div class="form-group col-sm-6">

	     		<label class="form-label col-sm-4">{{trans('report.pick_end_date')}}</label>

	     		<div class="col-sm-6">

	     			<div class="input-group"> 

	     				<input type="text" autocomplete="off" class="form-control daterange-single" name="end" id="end" value="{{ date('m/t/Y') }}"  required="true">

	     				<span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar22 "></i></span>
                                        </span>

	     		

	     			</div>

	     		</div>

	     	</div>

     	</div>

     	<div class="row">	

	     	<div class="form-group col-sm-6">

	     		<label class="form-label col-sm-4">{{trans('report.username')}}</label>

	     		<div class="col-sm-6">
	     			<input type="hidden" name="status" value="0">

	     			<select class="form-control chosen-select" name="username" id="username" required="true">

	     				<option value="all">{{trans('report.all')}}</option>
	     				@foreach($users as $item)
	     				<option value="{{$item->id}}">{{$item->username}}</option>
	     				@endforeach
	     			</select>



	     		</div>

	     	</div> 

     	</div>

     	<!--<div class="row">
     		<div class="form-group col-sm-6">
	     		<label class="form-label col-sm-4">User ID</label>
	     		<div class="col-sm-6">
	     			<select class="form-control chosen-select" name="user_id" id="user_id" required="true">
	     			<option value="all">All</option>
	     				@foreach($users as $item)
	     				<option value="{{$item->id}}">{{$item->user_id}}</option>
	     				@endforeach
	     			</select>
	     		</div>
	     	</div>

     	</div>-->

     	<div class="form-group col-sm-offset-6" >

     		<button type="submit" class="btn btn-primary">{{trans('report.get_report')}}</button>

     	</div>



     	

     </form>  



                     

	</div>

</div>

                  



            

@endsection







@section('scripts') @parent


<script src="{{asset('assets/globals/plugins/choosen/js/chosen.jquery.js')}}"></script>

    <script>

        $(document).ready(function() {

          

            $(".datetimepicker").datepicker()          

        });
        var config = {

      '.chosen-select'           : {},

      '.chosen-select-deselect'  : {allow_single_deselect:true},

      '.chosen-select-no-single' : {disable_search_threshold:10},

      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},

      '.chosen-select-width'     : {width:"95%"}

    };

    for (var selector in config) {

      $(selector).chosen(config[selector]);

    }  

     $('#username').on('change',function(){
    		$('#position :selected').prop("selected", false);
    		$('#user_id :selected').prop("selected", false);
    		 $('#user_id').trigger("chosen:updated");
    });


    $('#position').on('change',function(){

    		$('#username :selected').prop("selected", false);
    		 $('#username').trigger("chosen:updated");
    		 $('#user_id :selected').prop("selected", false);
    		 $('#user_id').trigger("chosen:updated");
    });

      $('#user_id').on('change',function(){
      		$('#position :selected').prop("selected", false);
    		$('#username :selected').prop("selected", false);
    		 $('#username').trigger("chosen:updated");
    });
       



        

    </script>

    @endsection