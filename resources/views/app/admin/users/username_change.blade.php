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
      
        <h4 class="card-title">{{trans('ticket_config.change_username')}} </h4>
            
            
            
        </div>
     </div>
     <div class="card-body">
    <form action="{{url('admin/users/change_username')}}" class="smart-wizard form" method="post"  >
    <input type="hidden" name="_token" value="{{csrf_token()}}">
     <input type="hidden" name="id" value="{{$id}}">


        <div class="form-group">
            <label class="col-sm-2 col-form-label" for="amount">
                 {{trans('ticket_config.username')}}: <span class="symbol required"></span>
            </label>
                <div class="col-sm-4">
                <input type="text" id="username" name="username" class="form-control" required value="{{$item->username}}">
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
                        
                        {{ trans("modal.edit") }}
                        
                        </button>
                    </div>
                </div>


    </form>
</div>
    



  </div>


              

           

            
@endsection
