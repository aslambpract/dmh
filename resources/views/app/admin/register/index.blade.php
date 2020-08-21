@extends('app.admin.layouts.default')
{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop
@section('styles')
@parent
<style type="text/css">
.wizard>.actions>ul>li>a[href="#finish"] {
    display: none
}
ul.nav.nav-tabs.nav-tabs-vertical {
    background: #eaeaea;
}

.nav-tabs-vertical .nav-item.show .nav-link, .nav-tabs-vertical .nav-link.active{
    background-color: #fff;

</style>

@endsection
{{-- Content --}}
@section('main')
@include('flash::message')
@include('utils.errors.list')

<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h6 class="card-title">{{trans('register.register_new_member') }}</h6>
       
    </div>
    <div class="card-body">
        <form class="form-vertical steps-validation" action="{{url('admin/register')}}" method="POST" data-parsley-validate="true" name="form-wizard" id="regform">
          {!! csrf_field() !!}
            <input type="hidden" name="payable_vouchers[]" value="">
            <input type="hidden" name="payment" id="payment" value="cheque">
            <!-- <input type="hidden" name="amount" value="{{$package_amount}}">  -->
            <!-- <input type="hidden" name="pack_new" id="pack_new" value=""> -->
            <input type="hidden" name="payment_method" value="card">
            <input type="hidden" name="currency" value="USD">
            <!-- <input type="hidden" name="package_amount" id="package_amount" amount="{{$package_amount}}"> -->
            <h6 class="width-full">{{trans('register.network_information') }}  </h6>
            <fieldset>
                <div class="row"> 
                    <div class="col-md-4">
                        <div class="required form-group-feedback-right {{ $errors->has('sponsor') ? ' has-error' : '' }}">
                            {!! Form::label('sponsor', trans("all.sponsor"), array('class' => 'col-form-label')) !!}
                            <input class="form-control" value="{{Auth::user()->username}}" required="required" data-parsley-required-message="all.please_enter_sponsor_name" name="sponsor" type="text" id="sponsor" data-parsley-group="block-0" data-parsley-sponsor="null">
                           
                            <div class="form-control-feedback">
                                <i class="icon-person text-muted"></i>
                            </div>
                            <span class="form-text">
                                <small>{!!trans("all.type_your_sponsor_username") !!}</small>
                                @if ($errors->has('sponsor'))
                                <strong>{{ $errors->first('sponsor') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    @if($leg)
                    <div class="col-md-4">
                        <div class="required form-group{{ $errors->has('placement_user') ? ' has-error' : '' }}">
                            {!! Form::label('placement_user', trans("all.placement_username"), array('class' => 'col-form-label')) !!} {!! Form::text('placement_user', $placement_user, ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_placement_username") ,'data-parsley-group' => 'block-0','value' => $placement_user,'readonly']) !!}
                        </div>
                    </div>
                    @else @if($placement_user)
                    <input type="hidden" name="placement_user" placeholder="{{trans('register.placement_username')}}" class="form-control" value="{{$placement_user}}" required > @endif @endif
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4">
                        <div class="required form-group-feedback-right {{ $errors->has('leg') ? ' has-error' : '' }}">
                            {!! Form::label('leg', trans("register.position"), array('class' => 'col-form-label',($leg)? 'readonly' : "")) !!}
                            <select class="form-control select2" name="leg" id="leg" required data-parsley-group="block-0">
                                <option @if($leg=='L' ) selected @endif value="L">{{ trans('register.left')}}</option>
                                <option @if($leg=='R' ) selected @endif value="R">{{ trans('register.right')}}</option>
                            </select>
                            <div class="form-control-feedback">
                                <i class=" icon-drag-left-right text-muted"></i>
                            </div>
                            <span class="form-text">
                                <small>{!!trans("all.enter_position") !!}</small>
                                @if ($errors->has('leg'))
                                <strong>{{ $errors->first('leg') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="required form-group-feedback-right {{ $errors->has('package') ? ' has-error' : '' }}">
                            {!! Form::label('package', trans("register.package"), array('class' => 'col-form-label')) !!}
                            <select class="form-control select2" name="package" id="package" required="required" data-parsley-required-message="Please Select Package" data-parsley-group="block-0" onchange="package_info(this.value)">
                                @foreach($package as $data)
                                <option value="{{$data->id}}" amount="{{$data->amount}}" rs="{{$data->rs}}" pv="{{$data->pv}}">{{$data->package}} </option>
                                @endforeach
                            </select>
                             {{ Form::hidden('amount', null, array('id' => 'amount_field')) }}
                            <div class="form-control-feedback">
                                <i class="icon-crown text-muted"></i>
                            </div>
                            <span class="form-text">
                                <small>{!!trans("all.select_package") !!}</small>
                                @if ($errors->has('package'))
                                <strong>{{ $errors->first('package') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6 class="width-full">  {{trans('register.contact_information') }}  </h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="required form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("register.first_name"), array('class' => 'col-form-label')) !!} {!! Form::text('firstname', Input::old('firstname'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_first_name"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("all.your_firstname") !!}</small>
                                @if ($errors->has('firstname'))
                                <strong>{{ $errors->first('firstname') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            {!! Form::label('lastname', trans("register.last_name"), array('class' => 'col-form-label')) !!} {!! Form::text('lastname', Input::old('lastname'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_last_name"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("all.your_lastname") !!}</small>
                                @if ($errors->has('lastname'))
                                <strong>{{ $errors->first('lastname') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('country') ? ' has-error' : '' }}">
                        {!! Form::label('country', trans("register.country"), array('class' => 'col-form-label')) !!} 
                            <select name="country" class="form-control" data-parsley-group="wizard-step-2" id="country" required>
                                @foreach($countries as $key => $country_item)
                                    @if($key=="US")
                                    <option value="{{ $key }}" selected>{{ $country_item }}</option>
                                    @else
                                    <option value="{{$key}}" >{{$country_item}}</option>
                                    @endif
                                @endforeach
                            </select>
                           
                            <span class="form-text">
                                <small>{!!trans("all.select_country") !!}</small>
                                @if ($errors->has('country'))
                                <strong>{{ $errors->first('country') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        {!! Form::label('state', trans("register.state"), array('class' => 'col-form-label')) !!} 
                            <select name="state" class="form-control" data-parsley-group="wizard-step-2" id="state" required >
                                @foreach($states as $key=>$state)
                                <option value="{{$key}}">{{$state}}</option>
                                @endforeach
                            </select>
                            <span class="form-text">
                                <small>{!!trans("all.select_your_state") !!}</small>
                                @if ($errors->has('state'))
                                <strong>{{ $errors->first('state') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        <div class="required form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            {!! Form::label('zip', trans("register.zip_code"), array('class' => 'col-form-label')) !!} {!! Form::text('zip', Input::old('zip'), ['class' => 'form-control','required' => 'required','id' => 'zip','data-parsley-required-message' => trans("all.please_enter_zip"),'data-parsley-group' => 'block-1','data-parsley-zip' => 'us','data-parsley-type' => 'digits','data-parsley-length' => '[5,8]','data-parsley-state-and-zip' => 'us','data-parsley-validate-if-empty' => '','data-parsley-errors-container' => '#ziperror' ]) !!}
                            <span class="form-text">
                                <span id="ziplocation"><span></span></span>
                            <span id="ziperror"></span>
                            <small>{!!trans("all.your_zip") !!}</small> @if ($errors->has('zip'))
                            <strong>{{ $errors->first('zip') }}</strong> @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', trans("register.address"), array('class' => 'col-form-label')) !!} {!! Form::textarea('address', Input::old('address'), ['class' => 'form-control','required' => 'required','id' => 'address','rows'=>'2','data-parsley-required-message' => trans("all.please_enter_address"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("all.your_address") !!}</small>
                                @if ($errors->has('address'))
                                <strong>{{ $errors->first('address') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('city') ? ' has-error' : '' }}">
                            {!! Form::label('city', trans("register.city"), array('class' => 'col-form-label')) !!} {!! Form::text('city', Input::old('city'), ['class' => 'form-control','required' => 'required','id' => 'city','data-parsley-required-message' => trans("all.please_enter_city"),'data-parsley-group' => 'block-1']) !!}
                            
                            <span class="form-text">
                                <small>{!!trans("all.your_city") !!}</small>
                                @if ($errors->has('city'))
                                <strong>{{ $errors->first('city') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('gender') ? ' has-error' : '' }}">
                            {!! Form::label('gender', trans("register.gender"), array('class' => 'col-form-label')) !!} {!! Form::select('gender', array('m' => trans("all.male"), 'f' => trans("all.female") ),NULL,['class' => 'form-control select2','required' => 'required','data-parsley-required-message' => trans("all.please_select_gender"),'data-parsley-group' => 'block-1']) !!}
                            
                            <span class="form-text">
                                <small>{!!trans("all.select_your_gender_from_list") !!}</small>
                                @if ($errors->has('gender'))
                                <strong>{{ $errors->first('gender') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('phone') ? ' has-error' : '' }}">
                            {!! Form::label('phone', trans("register.phone"), array('class' => 'col-form-label')) !!} {!! Form::text('phone', Input::old('phone'), ['class' => 'form-control','id' => 'phone','required'=>'required','data-parsley-required-message' => trans("all.please_enter_phone_number"),'data-parsley-group' => 'block-1']) !!}
                          
                            <span class="form-text">
                                <small>{!!trans("all.enter_your_phone_number") !!}</small>
                                @if ($errors->has('phone'))
                                <strong>{{ $errors->first('phone') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans("register.email"), array('class' => 'col-form-label')) !!} {!! Form::email('email', Input::old('email'), ['class' => 'form-control','required' => 'required','id' => 'email','data-parsley-required-message' => trans("all.please_enter_email"),'data-parsley-group' => 'block-1','data-parsley-email'=>"null"]) !!}
                           
                            <span class="form-text">
                                <small>{!!trans("all.type_your_email") !!}</small>
                                @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- begin col-6 -->
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('passport') ? ' has-error' : '' }}">
                            {!! Form::label('passport', trans("register.national_identification_number"), array('class' => 'col-form-label')) !!} {!! Form::text('passport', Input::old('passport'), ['class' => 'form-control','required' => 'required','id' => 'passport','data-parsley-required-message' => trans("all.please_enter_passport"),'data-parsley-group' => 'block-1']) !!}
                            
                            <span class="form-text">
                                <small>{!!trans("all.type_your_passport_number") !!}</small>
                                @if ($errors->has('passport'))
                                <strong>{{ $errors->first('passport') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="hidden" name="transaction_pass" class="form-control" placeholder="Transaction Password " value="{{$transaction_pass}}">
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6 class="width-full">  {{trans('register.login_information') }}   </h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="required form-group-feedback-right {{ $errors->has('username') ? ' has-error' : '' }}">
                            {!! Form::label('username', trans("register.username"), array('class' => 'col-form-label')) !!} {!! Form::text('username', Input::old('username'), ['class' => 'form-control','required' => 'required','id' => 'username','data-parsley-required-message' => trans("all.please_enter_username"),'data-parsley-type' => 'alphanum','data-parsley-group' => 'block-2','data-parsley-username'=>"null"]) !!}
                            
                            <span class="form-text">
                                <small>{!!trans("all.desired_username_used_to_login") !!}</small>
                                @if ($errors->has('username'))
                                <strong>{{ $errors->first('username') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4">
                        <div class="passy required form-group-feedback-right {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', trans("register.password"), array('class' => 'col-form-label')) !!}
                            <div class="form-group label-indicator-absolute position-relative">
                                {!! Form::password('password', ['class' => 'form-control pwstrength','required' => 'required','id' => 'password','data-parsley-required-message' => trans("all.please_enter_password"),'data-parsley-minlength'=>'6','data-parsley-group' => 'block-2']) !!}
                                <div class="form-control-feedback form-control-feedback-lg">
                                <span class="label password-indicator-label-abs">Strong</span>    
                            </div>
                                                      
                            </div>
                            
                             <span class="form-text">
                                <small>{!!trans("all.a_secure_password") !!}</small>
                                @if ($errors->has('password'))
                                <strong>{{ $errors->first('password') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4">
                        <div class="required form-group-feedback-right {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('confirm_password', trans("register.confirm_password"), array('class' => 'col-form-label')) !!} {!! Form::password('confirm_password',['class' => 'form-control','required' => 'required','id' => 'confirm_password','data-parsley-equalto' => '#password','data-parsley-required-message' => trans("all.please_enter_password_confirmation"),'data-parsley-minlength'=>'6','data-parsley-group' => 'block-2']) !!}
                           
                            <span class="form-text">
                                <small>{!!trans("all.confirm_your_password") !!}</small>
                                @if ($errors->has('confirm_password'))
                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <!-- end col-6 -->
                </div>
              
                <!-- end row -->
            </fieldset>
<h6 class="width-full">  {{trans('register.payment') }}   </h6>

<fieldset>
<div class="card-body bordered">

<div class="d-md-flex">
<ul class="nav nav-tabs nav-tabs-vertical flex-column mr-md-3 wmin-md-200 mb-md-0 border-bottom-0"  id="myTab">

        @foreach($payment_type as $k => $payment)
        @if($payment->id==1)
        <li class="nav-item" payment="{{$payment->code}}">
            <a class="nav-link active" payment="{{$payment->code}}" data-toggle="tab" href="#tab{{$k}}" role="tab" >
            <br/>{{$payment->payment_name}}</a>
        </li>
        @else
        <li class="nav-item" payment="{{$payment->code}}">
        <a class="nav-link" payment="{{$payment->code}}" data-toggle="tab" href="#tab{{$k}}">
            <br/>{{$payment->payment_name}}</a>
        </li>
        @endif @endforeach
    </ul>

 <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                    <div class="tab-content" >
                        @foreach($payment_type as $ke => $pay) @if($pay->payment_name=="Cheque")
                        <div class="tab-pane fade show active" id="tab{{$ke}}" role="tabpanel">
                            <div class="text-center">
                             @if($payment_gateway->bank_details == "")
                              <h4> {{trans("register.please_save_merchants_bank_details_in_payment_gateway_manager")}}</h4>
                              @else
                                <h1>
                                    {{trans('Package Amount') }}:
                                <span name="fee" id="paypal_joining"> ${{$package_amount}} </span>   
                                </p></h1>
                                <h3>{{trans('register.confirm_registration') }}</h3>
                                <p>
                                    <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                </p>
                                @endif
                            </div>
                        </div>
      
      @elseif($pay->payment_name=="Ewallet")
                        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                            <div class="text-center">
                                <div class="row">
                                <div class="col-sm-3">
                                  </div>
                                  <label class="col-sm-2 control-label" for="username">
                                       {{trans('register.username')}}:
                                      <span class="symbol ">
                                          </span>
                                  </label>
                                  <div class="col-sm-4">
                                      <input class="form-control" id="ewalletusername" name="ewalletusername" type="text">
                                     
                                  </div>
                                  </div>
                                    <br/>
                                    <div class="row">
                                       <div class="col-sm-3">
                                           
                                           
                                        </div>
                                        <label class="col-sm-2 control-label" for="amount">
                                                {{trans('register.transaction_password')}}: <span class="symbol "></span>
                                        </label>
                                        <div class="col-sm-4">
                                                <input type="password" id="ewallet_password" name="ewallet_password" class="form-control">
                                        </div>
                                    </div>
                                <h1> <p class="text-success">
                                    {{trans('Package Amount') }}:
                                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                                </p></h1>
                                <h3>{{trans('register.confirm_registration') }}</h3>
                                <p>
                                    <button class="btn btn-success btn-lg" role="button" id="ewalletbutton">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                </p>
                            </div>
                        </div>
         @elseif($pay->payment_name=="Bitaps")
                        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                            <div class="text-center">
                             @if($payment_gateway->btc_address == "")
                              <h4>{{trans("register.please_save_merchants_bitaps_address_in_payment_gateway_manager")}}</h4>
                              @else
                                <h1> <p class="text-success">
                                    {{trans('Package Amount') }}:
                                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                                </p></h1>
                                <h3>{{trans('register.confirm_registration') }}</h3>
                                <p>
                                    <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                </p>
                                @endif
                            </div>
                        </div>
        @elseif($pay->payment_name=="Paypal")
        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
            <div class="text-center">
              @if($payment_gateway->paypal_username == "" && $payment_gateway->paypal_password == "")
              <h4> {{trans("register.please_save_merchants_paypal_details_in_payment_gateway_manager")}}</h4>
              @else
                <input type="hidden" name="PAYMENTREQUEST_0_ITEMAMT" value="100">
                <input type="hidden" name="PAYMENTREQUEST_0_AMT" value="100" readonly>
                 <h1> <p class="text-success">
                    {{trans('register.joining_fee') }}:
                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                </p></h1>
                <h3>{{trans('register.confirm_registration') }}</h3>
                <p>
                    <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                </p>
                
                <div id="myContainer" style="margin-top:100px">
                </div>
                @endif
            </div>
        </div>
         @elseif($pay->payment_name == "Stripe") 

          <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
            <div class="text-center">
             @if($payment_gateway->stripe_secret_key == "" && $payment_gateway->stripe_public_key == "")
              <h4> {{trans("register.please_save_merchants_stripe_details_in_payment_gateway_manager")}}</h4>
              @else
                <h1> <p class="text-success">
                    {{trans('register.joining_fee') }}:
                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                </p></h1>
                
                <p>
                    <input 
                        type="button"
                        id="stripe_btn"
                        class="btn btn-primary"
                        value="Pay with Card"
                        data-key="{{$payment_gateway->stripe_public_key}}"
                        data-amount="{{$package_amount}}"
                        data-currency="usd"
                        data-bitcoin="false"
                        data-name="register"
                        
                        data-description="{{trans('register.stripe_payment')}}"
                        data-locale="auto"
                    >

                    <h3>{{trans('register.confirm_registration') }}</h3>
                </p>
                @endif
            </div>
        </div>
                                        
              
        @elseif($pay->payment_name=="Rave")
        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
            <div class="text-center">
            @if($payment_gateway->rave_public_key == "" && $payment_gateway->rave_secret_key == "")
              <h4> {{trans("register.please_save_merchants_rave_details_in_payment_gateway_manager")}}</h4>
              @else
                <h1> <p class="text-success">
                    {{trans('register.joining_fee') }}:
                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                </p></h1>
                <h3>{{trans('register.confirm_registration') }}</h3>
                <p>
                    <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                </p>
                @endif
            </div>
        </div>   

        @elseif($pay->payment_name=="Authorize")
        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                 <div class="text-center">

                    @if($payment_gateway->auth_transaction_key == "" && $payment_gateway->auth_merchant_name == "")
                      <h4> {{trans("register.please_save_merchants_authorize.net_details_in_payment_gateway_manager")}}</h4>
                      @else
                                                             
                            <h1> <p class="text-success">
                    {{trans('register.joining_fee') }}:
                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                </p></h1>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="required form-group {{ $errors->has('card_number') ? ' has-error' : '' }}">
                                    {!! Form::label('card_number', trans("register.card_number"), array('class' => 'control-label')) !!} {!! Form::text('card_number', Input::old('card_number'), ['class' => 'form-control','data-parsley-required-message' => trans("register.please_enter_card_number"),'data-parsley-group' => 'block-3']) !!}
                                    <span class="help-block">
                                        <small>{!!trans("register.your_card_number") !!}</small>
                                        @if ($errors->has('card_number'))
                                        <strong>{{ $errors->first('card_number') }}</strong>
                                        @endif
                                    </span>
                                </div>
                            </div>

                              <div class="col-md-6">
                                <div class="required form-group {{ $errors->has('cvv') ? ' has-error' : '' }}">
                                    {!! Form::label('cvv', trans("register.cvv"), array('class' => 'control-label')) !!} {!! Form::text('cvv', Input::old('cvv'), ['class' => 'form-control','data-parsley-required-message' => trans("register.please_enter_card_number"),'data-parsley-group' => 'block-3']) !!}
                                    <span class="help-block">
                                        <small>{!!trans("register.cvv") !!}</small>
                                        @if ($errors->has('cvv'))
                                        <strong>{{ $errors->first('cvv') }}</strong>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                 
                                <div class="required form-group {{ $errors->has('card_last_four') ? ' has-error' : '' }}">
                                    {!! Form::label('year', trans("register.expiration_date"), array('class' => 'control-label')) !!} 
                                    {!!  Form::selectRange('year', date('Y'), 2040,Input::old('year'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("register.please_enter_expiration_date"),'data-parsley-group' => 'block-3']);  !!}
                                    
                                    <span class="help-block">
                                        <small>{!!trans("register.your_expirationdate") !!}</small>
                                        @if ($errors->has('expiration_date'))
                                        <strong>{{ $errors->first('expiration_date') }}</strong>
                                        @endif
                                    </span>
                                </div>
                             
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="required form-group {{ $errors->has('card_last_four') ? ' has-error' : '' }}">
                                 
                                 {!! Form::label('year', trans("register.expiration_date"), array('class' => 'control-label')) !!} 

                                {!!  Form::selectMonth('month',Input::old('month'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("register.please_enter_expiration_date"),'data-parsley-group' => 'block-3']);  !!}
                                 <span class="help-block">
                                        <small>{!!trans("register.your_expirationdate") !!}</small>
                                        @if ($errors->has('year'))
                                        <strong>{{ $errors->first('year') }}</strong>
                                        @endif
                                    </span>
                                
                            </div>
                            </div>
                            
                        </div>
                  
                    <p>
                         <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                    </p>
                    @endif
               
            </div> 
        </div>        

         @elseif($pay->payment_name=="Ipaygh")
        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
            <div class="text-center">
                  @if($payment_gateway->ipaygh_merchant_key == "")
                      <h4> {{trans("register.please_save_merchants_ipaygh_details_in_payment_gateway_manager")}}</h4>
                      @else
                <h1> <p class="text-success">
                    {{trans('register.joining_fee') }}:
                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                </p></h1>
                <h3>{{trans('register.confirm_registration') }}</h3>
                <p>
                    <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                </p>
                @endif
            </div>
        </div>   

        @elseif($pay->payment_name=="Skrill")
        <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
            <div class="text-center">
               @if($payment_gateway->skrill_mer_email == "")
                  <h4> {{trans("register.please_save_merchants_skrill_details_in_payment_gateway_manager")}}</h4>
                  @else
             <h1> <p class="text-success">
                    {{trans('register.joining_fee') }}:
                    <span name="fee" class="ewallet_joining"> ${{$package_amount}} </span>
                </p></h1>
                <h3>{{trans('register.confirm_registration') }}</h3>
                <p>
                   <button class="btn btn-success btn-lg" role="button">
                    {{$pay->payment_name}} {{trans('register.payment_confirmation')}}
                </button>
               </p>
               @endif
            </div>
        </div>      


        @else
      <div class="tab-pane fade in" id="tab{{$ke}}" role="tabpanel">
             <div class="table-responsive div-vouher-payment">                      
               <table class="table table-dark bg-slate-600 table-vouher-regpayment">
                 <thead>
                   <tr>
                     <th>#</th>
                     <th>{{trans('register.voucher_code')}}</th>
                     <th>{{trans('register.amount_used')}}</th>
                     <th>{{trans('register.voucher_balance')}}</th>
                     <th>{{trans('register.remaining')}}</th>
                     <th>{{trans('register.validate_voucher')}}</th>
                   </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <td>1</td>
                     <td><input type="text" name="voucher[]" class="form-control"></td>
                     <td><span class="amount"></span></td>
                     <td><span class="balance"></span></td>                             
                     <td><span class="remaining"></span></td>                             
                     <td class="td-validate-voucher"><button class="btn btn-info validatevoucher" onclick="return false;">{{trans('register.validate')}}</button></td>
                   </tr>
                   </tbody>
                 </table>
                  <br>
                 <p><button id="resulttable" class="btn btn-primary" payment="{{$pay->code}}" role="button" style="border-color:#00bcd4; background-color: #00bcd4" >{{{ trans('all.confirm') }}}</button></p>
             </div>
               
          </div>
    @endif @endforeach
    </div>
</div>
</div>
</div>           

</fieldset>
</form>
</div>
</div>

@endsection @section('overscripts') @parent
<script type="text/javascript">
$(document).ready(function(){
$("#package").change(function(){
$(this).find("option:selected").each(function(){
var optionValue = $(this).attr("value");
$('#pack_new').val(optionValue);


});
}).change();
});

</script>
<script type="text/javascript">
$(document).ready(function(){
$("#package").change(function(){
$(this).find("option:selected").each(function(){
var optionValue = $(this).attr("value");
$('#pack_new').val(optionValue);


});
}).change();
});

</script>
<script type="text/javascript">
var joiningfe = {{ $joiningfee }};
</script>
@endsection @section('scripts') @parent
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
<script>
var country_id = $('#country :selected').attr('value');
   if(country_id){
       $.ajax({

          type:"GET",
          url:"{{url('api/get-state-list')}}?country_id="+country_id,
          success:function(res){               
           if(res){
               $("#state").empty();
               $.each(res,function(key,value){
                   $("#state").append('<option value="'+key+'">'+value+'</option>');
               });
          
           }else{
              $("#state").empty();
           }
          }
       });
   }else{
       $("#state").empty();
       $("#city").empty();
   }

   $('#country').change(function(){
   var countryID = $(this).val(); 
   console.log(1222222222222222);
   console.log(countryID);
   if(countryID){
       $.ajax({
          type:"GET",
          url:"{{url('api/get-state-list')}}?country_id="+countryID,
          success:function(res){               
           if(res){
               $("#state").empty();
               $.each(res,function(key,value){
                   $("#state").append('<option value="'+key+'">'+value+'</option>');
               });
          
           }else{
              $("#state").empty();
           }
          }
       });
   }else{
       $("#state").empty();
       $("#city").empty();
   }      
  });
</script>

<script type="text/javascript">

  $(document).ready(function() {
       $("#myTab li").click(function(e) {
          $('#payment').val($(this).attr('payment'));
   });
  });
</script> 

<script src="https://checkout.stripe.com/checkout.js"></script>
<script>
        $(document).ready(function() {

            $('#stripe_btn').on('click', function(event) {
                event.preventDefault();
                var $button = $(this),
                    $form = $button.parents('form');
                var opts = $.extend({}, $button.data(), {
                    token: function(result) {
                        $form.append($('<input>').attr({ type: 'hidden', name: 'stripeToken', value: result.id })).submit();
                    }
                });
                StripeCheckout.open(opts);
            });
            
            $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
                $('#payment').val($(this).attr('payment'));
           });
        });
</script>

<script type="text/javascript">
    
$('#ewalletbutton').click(function(event) {

    event.preventDefault();
    
    var username = $("#ewalletusername").val();
    var password = $("#ewallet_password").val();

    var amount = {{ $joiningfee }};
    console.log(amount);

       var name=$('#ewalletusername').val();
        if(name.length == 0){
            $('#ewalletusername').next(".red").remove();
            $('#ewalletusername').after('<div class="red">Username is Required</div>');
        }

         if(password.length == 0){
                
            $('#ewallet_password').next(".red").remove();
            $('#ewallet_password').after('<div class="red">Password is Required</div>');
        }

       if(name.length > 0 && password.length > 0){
            $('#ewalletusername').next(".red").remove();
            $('#ewallet_password').next(".red").remove(); 
               $.ajax({

                url:'/ajax/validateewalletpassword',
                type: "POST",
                dataType: 'json',
                data:{username:username,password:password,amount:amount},
                    
                success:function(e){
                   
                    if (e.valid === true) {
                        $("#regform").submit();
                    } else {
                        alert(e.message);
                        return false;
                    }
                }                          

            });
           
        }
    });

    
function package_info(val) {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } }); 
    // console.log(123);
        $.ajax({ 
            url: '{{url('package_infos')}}',
            type: "post",
            async: false,
            dataType: "json",
            data:{package:$('#package').val()},
            success: function(data,textStatus, jqXHR) {
               
                $('#package_name').html(data['combination']);
                $('#package_amount').html(data['amount']);
                $('#amount_field').html(data['amount']);
                
                $('#package_name_pay').html(data['combination']);
                $('#package_amount_pay').html(data['amount']);
                $('#amount_field_psy').html(data['amount']);

                $('#package_name_bitaps').html(data['combination']);
                $('#package_amount_bitaps').html(data['amount']);
                $('#amount_field_bitaps').html(data['amount']);

                 $('#package_name_MisterCash').html(data['combination']);
                $('#package_amount_MisterCash').html(data['amount']);
                $('#amount_field_MisterCash').html(data['amount']);
                
                
            },
        });
    };


</script>

@endsection