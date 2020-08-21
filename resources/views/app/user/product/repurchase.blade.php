@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('styles') @parent @endsection {{-- Content --}} @section('main') @include('flash::message') @include('utils.errors.list')
<div class="card card-flat" >
	<div class="card-header header-elements-inline">
    	<div class="card-header header-elements-inline-btn">
			
        <h4 class="card-title">{{trans('ticket_config.business_plan_repurchase')}} </h4>
            
            
            
        </div>
     </div>
     <div class="card-body">
  
        <form action="{{url('user/repurchaseuser')}}" class="smart-wizard form-horizontal" method="post">
            <input name="_token" type="hidden" value="{{csrf_token()}}">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="username">
                    {{trans('ewallet.enter_username')}}:
                    <span class="symbol required">
                        </span>
                </label>
                <div class="col-sm-4">
                    <input class="form-control" id="key-word-user-binary" name="key-word-user-binary" placeholder=" {{trans('tree.search_member')}}" type="text" required="required" />
                    <input id="key_user_hidden" name="key_user_hidden" type="hidden"/>
                    <input class="form-control autocompleteusers" id="username" name="autocompleteusers" type="hidden" >
                    <input class="form-control key_user_hidden" name="username" type="hidden">
                    </input>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="amount">
                  Choose Business Plan:
                    <span class="symbol required">
                        </span>
                </label>
                <div class="col-sm-4">
                   <select name="package" id="package" class="form-control" required>
                    <option value="">
                        Business Plan
                    </option>
                    @foreach($packages as $key=>$package)
                      <option value="{{$key}}">
                        {{$package}}
                    </option>
                    @endforeach
                       
                   </select>
                </div>
            </div>
        
            <div class="col-sm-offset-2">
                <div class="form-group" style="float: left; margin-right: 0px;">
                    <div class="col-sm-2">
                        <button class="btn btn-info" id="add_amount" name="add_amount" tabindex="4" type="submit" value="{{trans('ewallet.add_amount')}}">
                           Assign Package
                        </button>
                    </div>
                </div>
            </div>
            </input>
        </form>
    </div>
</div>



@endsection @section('overscripts') @parent

@endsection 
@section('scripts')
 @parent
 <script type="text/javascript">
$(document).on('submit', 'form', function() {
   $(this).find('button:submit, input:submit').attr('disabled','disabled');
 });
</script>

 @endsection