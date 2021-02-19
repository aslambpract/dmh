@extends('layouts.auth')
@section('styles') @parent

<style type="text/css">
      h4{
        margin-top: 100px;
    }

    ul.nav.nav-tabs.nav-tabs-vertical {
    background: #eaeaea;
}

.nav-tabs-vertical .nav-item.show .nav-link, .nav-tabs-vertical .nav-link.active{
    background-color: #fff;

}


</style>

@endsection
@section('content')

<div class="content">
<div class="row" style="margin-top: 28px;
">

    <div class="col-lg-8 offset-lg-2">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                 
                </div>
                  <form class="form-vertical steps-validation" action="{{url('register')}}" method="POST" data-parsley-validate="true" name="form-wizard" id="regform">
            {!! csrf_field() !!}
           <input type="hidden" name="payable_vouchers[]" value="">
            <input type="hidden" name="payment" id="payment" value="free">
             <input type="hidden" name="amount" value="{{$joiningfee}}"> 
            <input type="hidden" name="payment_method" value="free">
            <input type="hidden" name="currency" value="USD">
             <input type="hidden" name="joiningfee" id="joiningfee" amount="{{$joiningfee}}">
            <h6 class="width-full">{{trans('register.login_information') }}  </h6>
            <fieldset>
                <div class="row"> 
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('sponsor') ? ' has-error' : '' }}">
                            {!! Form::label('sponsor', trans("all.sponsor"), array('class' => 'col-form-label')) !!}
                          <input class="form-control" value="{!!(Input::old('sponsor_name'))?Input::old('sponsor_name') :$sponsor_name !!}" required="required" data-parsley-required-message="all.please_enter_sponsor_name" name="sponsor" type="text" id="sponsor" data-parsley-group="block-0" data-parsley-sponsor="null" readonly>
                            <!--data-parsley-remote="data-parsley-remote" data-parsley-remote-validator="validate_sponsor" data-parsley-remote-options='{ "type": "POST", "dataType": "jsonp", "data": { "csrf": {{csrf_token()}} } }' data-parsley-remote-message="all.there_is_no_user_with_that_username" data-parsley-trigger-after-failure="change" data-parsley-trigger="change" 
                            -->
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
               
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('username') ? ' has-error' : '' }}">
                            {!! Form::label('username', trans("register.username"), array('class' => 'col-form-label')) !!} {!! Form::text('username', Input::old('username'), ['class' => 'form-control','required' => 'required','id' => 'username','data-parsley-required-message' => trans("all.please_enter_username"),'data-parsley-type' => 'alphanum','data-parsley-group' => 'block-0','data-parsley-username'=>"null"]) !!}
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
                            </div>
                            <span class="form-text">
                                <small>{!!trans("all.desired_username_used_to_login") !!}</small>
                                @if ($errors->has('username'))
                                <strong>{{ $errors->first('username') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="passy required form-group-feedback-right {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', trans("register.password"), array('class' => 'col-form-label')) !!}
                            <div class="form-group label-indicator-absolute">
                                {!! Form::password('password', ['class' => 'form-control pwstrength','required' => 'required','id' => 'password','data-parsley-required-message' => trans("all.please_enter_password"),'data-parsley-minlength'=>'6','data-parsley-group' => 'block-0']) !!}
                                <span class="label password-indicator-label-abs"></span>
                               <!--  <span class="input-group-addon">
                                                    <a class="generate-pass" href="javascript:void(0)" data-popup="tooltip" title="{{trans('register.generate_a_password')}}" data-placement="top" ><i class="icon-googleplus5"></i></a>
                                                </span> -->
                            </div>
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
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
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('confirm_password', trans("register.confirm_password"), array('class' => 'col-form-label')) !!} {!! Form::password('confirm_password',['class' => 'form-control','required' => 'required','id' => 'confirm_password','data-parsley-equalto' => '#password','data-parsley-required-message' => trans("all.please_enter_password_confirmation"),'data-parsley-minlength'=>'6','data-parsley-group' => 'block-0']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-user-check text-muted"></i>
                            </div>
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

                <div class="row"> 
                    <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', trans("register.email"), array('class' => 'col-form-label')) !!} {!! Form::email('email', Input::old('email'), ['class' => 'form-control','required' => 'required','id' => 'email','data-parsley-required-message' => trans("all.please_enter_email"),'data-parsley-group' => 'block-0','data-parsley-email'=>"null"]) !!}
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                            <span class="form-text">
                                <small>{!!trans("all.type_your_email") !!}</small>
                                @if ($errors->has('email'))
                                <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                
            </fieldset>
            <h6 class="width-full">  {{trans('register.network_information') }}  </h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="required form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("register.firstname"), array('class' => 'col-form-label')) !!} {!! Form::text('firstname', Input::old('firstname'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_first_name"),'data-parsley-group' => 'block-1']) !!}
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
                            {!! Form::label('lastname', trans("register.lastname"), array('class' => 'col-form-label')) !!} {!! Form::text('lastname', Input::old('lastname'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_last_name"),'data-parsley-group' => 'block-1']) !!}
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
                        <div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('country') ? ' has-error' : '' }}">
                            {!! Form::label('country', trans("register.country"), array('class' => 'control-label')) !!} {!! Form::select('country', $countries ,'US',['class' => 'form-control','id' => 'country','required' => 'required','data-parsley-required-message' => trans("all.please_select_country"),'data-parsley-group' => 'block-1']) !!}
                            <div class="form-control-feedback">
                                <i class="fa fa-flag-o text-muted"></i>
                            </div>
                            <span class="help-block">
                                <small>{!!trans("all.select_country") !!}</small>
                                @if ($errors->has('country'))
                                <strong>{{ $errors->first('country') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                              

                    <div class="col-md-6">
                        <div class="required form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            {!! Form::label('state', trans("register.state"), array('class' => 'control-label')) !!} {!! Form::select('state', $states ,'WA',['class' => 'form-control','id' => 'state']) !!}
                            <span class="help-block">
                                <small>{!!trans("all.select_your_state") !!}</small>
                                @if ($errors->has('state'))
                                <strong>{{ $errors->first('state') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <div class="row" >
                    <!-- begin col-6 -->
                    <div class="col-md-6 ">
                        <div class="required form-group-feedback-right {{ $errors->has('phone') ? ' has-error' : '' }}">
                           {!! Form::label('phone', trans("register.phone"), array('class' => 'col-form-label')) !!} {!! Form::text('phone', Input::old('phone'), ['class' => 'form-control','id' => 'phone','required'=>'required','data-parsley-required-message' => trans("all.please_enter_phone_number"),'data-parsley-group' => 'block-1']) !!}
                            <div class="form-control-feedback">
                                <i class="icon-phone text-muted"></i>
                            </div>
                            <span class="form-text">
                                <small>{!!trans("all.enter_your_phone_number") !!}</small>
                                @if ($errors->has('phone'))
                                <strong>{{ $errors->first('phone') }}</strong>
                                @endif
                            </span>
                            <div>
                                <input type="hidden" name="phone_code" id="phone_code" value="">
                                <input type="hidden" name="phone_country" id="phone_country" value="">
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="required form-group-feedback-right {{ $errors->has('gender') ? ' has-error' : '' }}">
                            {!! Form::label('gender', trans("register.gender"), array('class' => 'col-form-label')) !!} {!! Form::select('gender', array('m' => trans("all.male"), 'f' => trans("all.female")),NULL,['class' => 'form-control ','required' => 'required','data-parsley-required-message' => trans("all.please_select_gender"),'data-parsley-group' => 'block-1']) !!}
                            <div class="form-control-feedback">
                                <i class="fa fa-neuter text-muted"></i>
                            </div>
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
                        <div class="required form-group {{ $errors->has('id_number') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("ID Number"), array('class' => 'col-form-label')) !!} {!! Form::text('id_number', Input::old('id_number'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("ID Number"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("Enter Your ID Number") !!}</small>
                                @if ($errors->has('id_number'))
                                <strong>{{ $errors->first('id_number') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="required form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("Date of Birth"), array('class' => 'col-form-label')) !!} {!! Form::text('date_of_birth', Input::old('date_of_birth'), ['class' => 'form-control daterange-single ','id' => 'dob','required' => 'required','data-parsley-required-message' => trans("Date of Birth"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("Enter Your Date of birth") !!}</small>
                                @if ($errors->has('date_of_birth'))
                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

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

  <!--   <div class="col-md-6">
            <div class="required form-group {{ $errors->has('id_number') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("ID Number"), array('class' => 'col-form-label')) !!} {!! Form::text('id_number', Input::old('id_number'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("ID Number"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Enter Your ID Number") !!}</small>
                    @if ($errors->has('id_number'))
                    <strong>{{ $errors->first('id_number') }}</strong>
                    @endif
                </span>
            </div> -->
    <div class="col-md-6">
            <div class="required form-group {{ $errors->has('info') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Any other info you want to add"), array('class' => 'col-form-label')) !!} {!! Form::text('info', Input::old('info'), ['class' => 'form-control','data-parsley-required-message' => trans("Info"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Enter other Information") !!}</small>
                    @if ($errors->has('info'))
                    <strong>{{ $errors->first('info') }}</strong>
                    @endif
                </span>
            </div>
    
          

              
    
          

            </div>
      <div class="col-md-6">
            <div class="required form-group {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Date of Birth"), array('class' => 'col-form-label')) !!} {!! Form::text('date_of_birth', Input::old('date_of_birth'), ['class' => 'form-control daterange-single ','id' => 'dob','required' => 'required','data-parsley-required-message' => trans("Date of Birth"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Enter Your Date of birth") !!}</small>
                    @if ($errors->has('date_of_birth'))
                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                    @endif
                </span>
            </div>
    
          

            </div>
            
        </div>  

      <!--   <div class="row">

    <div class="col-md-6">
            <div class="required form-group {{ $errors->has('branch') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Branch"), array('class' => 'col-form-label')) !!} {!! Form::text('branch', Input::old('branch'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("Branch"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Enter Your Branch") !!}</small>
                    @if ($errors->has('branch'))
                    <strong>{{ $errors->first('branch') }}</strong>
                    @endif
                </span>
            </div>
    
          

            </div>
      <div class="col-md-6">
            <div class="required form-group {{ $errors->has('account_number') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Account Number"), array('class' => 'col-form-label')) !!} {!! Form::text('account_number', Input::old('account_number'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("Account Number"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Enter Your Account Number") !!}</small>
                    @if ($errors->has('account_number'))
                    <strong>{{ $errors->first('Account Number') }}</strong>
                    @endif
                </span>
            </div>
    
          

            </div>
            
        </div> 

       <div class="row">

    <div class="col-md-6">
           <div class="required form-group {{ $errors->has('bank_name') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Bank Name"), array('class' => 'col-form-label')) !!} {!! Form::text('bank_name', Input::old('bank_name'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("Bank Name"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Bank Name") !!}</small>
                    @if ($errors->has('bank_name'))
                    <strong>{{ $errors->first('bank_name') }}</strong>
                    @endif
                </span>
            </div>
    
    
          

            </div>
      <div class="col-md-6">
            <div class="required form-group {{ $errors->has('next_of_kin') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Next of kin"), array('class' => 'col-form-label')) !!} {!! Form::text('next_of_kin', Input::old('next_of_kin'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("Next of kin"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Next of Kin") !!}</small>
                    @if ($errors->has('next_of_kin'))
                    <strong>{{ $errors->first('next_of_kin') }}</strong>
                    @endif
                </span>
            </div>
    
    
          

            </div>
            
        </div>    -->

    <!--   <div class="row">

    <div class="col-md-12">
            <div class="required form-group {{ $errors->has('info') ? ' has-error' : '' }}">
                {!! Form::label('name', trans("Any other info you want to add"), array('class' => 'col-form-label')) !!} {!! Form::text('info', Input::old('info'), ['class' => 'form-control','data-parsley-required-message' => trans("Info"),'data-parsley-group' => 'block-0']) !!}
                <span class="form-text">
                    <small>{!!trans("Enter other Information") !!}</small>
                    @if ($errors->has('info'))
                    <strong>{{ $errors->first('info') }}</strong>
                    @endif
                </span>
            </div>
    
          

            </div>
  
            
        </div>                     -->
    <div class="row">
        <!-- begin col-6 -->
        
        <div class="col-md-6">
            <div class="required form-group-feedback-right {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', trans("register.email"), array('class' => 'col-form-label')) !!} {!! Form::email('email', Input::old('email'), ['class' => 'form-control','required' => 'required','id' => 'email','data-parsley-required-message' => trans("all.please_enter_email"),'data-parsley-group' => 'block-0','data-parsley-email'=>"null"]) !!}
                <div class="form-control-feedback">
                    <i class="icon-mail5 text-muted"></i>
                </div>
                <span class="form-text">
                    <small>{!!trans("all.type_your_email") !!}</small>
                    @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </span>
            </div>
        </div>
         <div class="col-md-6">
            <div class="required form-group-feedback-right {{ $errors->has('username') ? ' has-error' : '' }}">
                {!! Form::label('username', trans("register.username"), array('class' => 'col-form-label')) !!} {!! Form::text('username', Input::old('username'), ['class' => 'form-control','required' => 'required','id' => 'username','data-parsley-required-message' => trans("all.please_enter_username"),'data-parsley-type' => 'alphanum','data-parsley-group' => 'block-0','data-parsley-username'=>"null"]) !!}
                <div class="form-control-feedback">
                    <i class="icon-user-check text-muted"></i>
                </div>
                <span class="form-text">
                    <small>{!!trans("all.desired_username_used_to_login") !!}</small>
                    @if ($errors->has('username'))
                    <strong>{{ $errors->first('username') }}</strong>
                    @endif
                </span>
            </div>
        </div>
    </div> 
     
    
    <div class="row"> 
        <div class="col-md-6">
            <div class="passy required form-group-feedback-right {{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', trans("register.password"), array('class' => 'col-form-label')) !!}
                <div class="form-group label-indicator-absolute">
                    {!! Form::password('password', ['class' => 'form-control pwstrength','required' => 'required','id' => 'password','data-parsley-required-message' => trans("all.please_enter_password"),'data-parsley-minlength'=>'6','data-parsley-group' => 'block-0']) !!}
                    <span class="label password-indicator-label-abs"></span> 
                <div class="form-control-feedback">
                    <i class="icon-user-check text-muted"></i>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="required form-group {{ $errors->has('bank_name') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("Bank Name"), array('class' => 'col-form-label')) !!} {!! Form::text('bank_name', Input::old('bank_name'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("Bank Name"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("Bank Name") !!}</small>
                                @if ($errors->has('bank_name'))
                                <strong>{{ $errors->first('bank_name') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="required form-group {{ $errors->has('next_of_kin') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("Next of kin"), array('class' => 'col-form-label')) !!} {!! Form::text('next_of_kin', Input::old('next_of_kin'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("Next of kin"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("Next of Kin") !!}</small>
                                @if ($errors->has('next_of_kin'))
                                <strong>{{ $errors->first('next_of_kin') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="required form-group {{ $errors->has('info') ? ' has-error' : '' }}">
                            {!! Form::label('name', trans("Any other info you want to add"), array('class' => 'col-form-label')) !!} {!! Form::text('info', Input::old('info'), ['class' => 'form-control','data-parsley-required-message' => trans("Info"),'data-parsley-group' => 'block-1']) !!}
                            <span class="form-text">
                                <small>{!!trans("Enter other Information") !!}</small>
                                @if ($errors->has('info'))
                                <strong>{{ $errors->first('info') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                </div> 
            </fieldset>
        <h6>{{trans('products.choose_payment')}} </h6>
        <fieldset> 
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight nav-justified border-bottom-0 tab-bg">
                    @if($slydepay == 'yes')
                        <li class="nav-item"><a href="#steps-planpurchase-tab1" class="nav-link steps-plan-payment active border-0 font-size-18" data-toggle="tab" data-payment='slydepay'>Slydepay</a>
                        </li>
                    @endif
                    @if($momo == 'yes')
                        <li class="nav-item"> <a href="#steps-planpurchase-tab2" class="nav-link steps-plan-payment border-0 font-size-18" data-toggle="tab" data-payment='momo'>MoMoPay</a>
                        </li>
                    @endif
                </ul> 
                 
                <div class="tab-content p-2">
                    <div class="tab-pane fade show active" id="steps-planpurchase-tab1">

                        <div class="text-center">
                            <div class="text-center"></div>
                             <h3> <p class="text-success">Joining Fee: $ {{$joiningfee}}
                            </p></h3>
                            <div class="bhoechie-tab-content ">
                                <div class="text-center">
                                    <div class="text-center"> 
                                        <input type="hidden" name="steps_plan_payment" value="slydepay">
                                        <button class="btn btn-success btn-lg" role="button">Pay with Slydepay</button> 
                            
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value=""  name="checkbox" id="checkbox" required=""  data-parsley-required-message="required" data-parsley-group="block-2">
                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    Accept terms and conditions 
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="steps-planpurchase-tab2">
                        <div class="text-center">
                            <h3> <p class="text-success">Joining Fee: $ {{$joiningfee}}
                            </p></h3>
                            <div class="bhoechie-tab-content ">
                                <div class="text-center">
                                    <div class="text-center"> 
                                        <input type="hidden" name="steps_plan_payment" value="momo">
                                         <div
                                           id="my-unique-identifer"
                                           class="mobile-money-qr-payment"
                                           data-api-user-id="b12d7b22-3057-4c8e-ad50-63904171d18c"
                                           data-amount="100.98"
                                           data-currency="EUR"
                                           data-external-id="144-123-323"
                                         >
                                         </div>
    
                                        <button class="btn btn-success btn-lg" role="button">Pay with MoMoPay</button> 
                            
                                    </div>
                                </div>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value=""  name="checkbox" id="checkbox" required=""  data-parsley-required-message="required" data-parsley-group="block-2">
                                <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                    Accept terms and conditions 
                                </label>
                            </div>
                        </div>
                      </div>
                
                </div>
            </div>
        </fieldset>

                <!-- <fieldset>  
                    
                 <div class="bhoechie-tab-content active">
                    <div class="text-center">
                         <div class="text-center">
                            <h1>{{trans('register.confirm_registration') }}</h1>
                            
                            <p><button class="btn btn-success btn-lg" role="button">{{trans('register.confirm') }}</button></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            
                        </div>
                    </div>
                </div>
            </fieldset> -->
       
        </form>
         
                                                                   
            </div>
        </div>
    </div>
</div>
</div>


@endsection  
@section('scripts')
@parent
 

 <script src="https://widget.northeurope.cloudapp.azure.com:9443/v0.1.0/mobile-money-widget-mtn.js"></script>
<script src="https://checkout.stripe.com/checkout.js"></script>
<!-- <script>
        $(document).ready(function(){ 
            $("#dob").keyup(function(e){
                if (e.keyCode != 8){   
                    if ($(this).val().length == 2){
                        $(this).val($(this).val() + "/");
                    }else if ($(this).val().length == 5){
                        $(this).val($(this).val() + "/");
                    }
                }
            });   
});
</script> -->
@endsection @section('scripts') @parent
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
<script type="text/javascript">
    $(document).ready(function() {
          var xx = 'slydepay';
          $('input[name="steps_plan_payment"]').val(xx);

          $('.steps-plan-payment').click(function(e){
            var xx = $(this).attr('data-payment');
            // alert(xx);
            $('input[name="steps_plan_payment"]').val(xx);
           
           });
        });

</script>
<script>
    $('.daterange-single').daterangepicker({
        singleDatePicker: true
    });

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
     
   }


   $('#country').change(function(){
   var countryID = $(this).val(); 
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
      
   }      
  });
</script>

@endsection 





