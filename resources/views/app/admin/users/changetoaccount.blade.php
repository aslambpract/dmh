@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent

@endsection @section('main')
<div class="card card-flat border-top-success">
     <div class="card-header bg-white header-elements-xl-inline">
        <div class=""><h5>{{trans("users.user_account")}}</h5></div>
            <div class="header-elements text-center">
                <a data-action="collapse">
                </a>
            </div>
    </div>
    <div class="card card-flat">
       <div class="card-body">

        <form action="{{url('admin/useraccounts/changetoaccount',$item->id)}}" method="POST">
            {!!csrf_field() !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                    <label>Account </label>
                                    <input type="text"  readonly="" class="form-control input-sm"  value="{{$username}}-POS-{{$item->account_no}} ">
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input type="text" name="username" id="username" class="form-control input-sm" placeholder=" Username">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
                                    </div>
                                </div>
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last name">
                                      
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                                    </div>
                                </div>
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Bitcoin address</label>
                                        <input type="text" name="bitcoinaddress" id="bitcoinaddress" class="form-control input-sm" placeholder="Bitcoin address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Confirm password </label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            
                            <input type="submit" value="Register" class="btn btn-info btn-block">
                        
                        </form>
       
           
    </div>
    
</div>
</div>
 

 @stop

{{-- Scripts --}}
@section('scripts')
    @parent
<script type="text/javascript ">
   

</script>
@stop