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
        <h6 class="card-title">Register SubAdmin</h6>
       
    </div>
    <div class="card-body">
        <form class="form-vertical steps-validation" action="{{url('admin/adminregister')}}" method="POST" data-parsley-validate="true" name="form-wizard" id="regform">
          {!! csrf_field() !!}
           
           
           <!--  <h6 class="width-full">  {{trans('register.contact_information') }}  </h6> -->
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
                    
                </div>
                <!-- end row -->
               
                <!-- end row -->
                <div class="row">
                    <!-- begin col-6 -->
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

                      <div class="col-md-6">
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
                    
                </div>
               
               
                <div class="row">
                    <!-- begin col-6 -->
                    <!-- <div class="col-md-6">
                        <div class="required form-group-feedback-right {{ $errors->has('passport') ? ' has-error' : '' }}">
                            {!! Form::label('passport', trans("register.national_identification_number"), array('class' => 'col-form-label')) !!} {!! Form::text('passport', Input::old('passport'), ['class' => 'form-control','required' => 'required','id' => 'passport','data-parsley-required-message' => trans("all.please_enter_passport"),'data-parsley-group' => 'block-1']) !!}
                            
                            <span class="form-text">
                                <small>{!!trans("all.type_your_passport_number") !!}</small>
                                @if ($errors->has('passport'))
                                <strong>{{ $errors->first('passport') }}</strong>
                                @endif
                            </span>
                        </div>
                    </div> -->
                </div>
                
            
                <div class="row">
                    
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                </div><br>
                 <div class="m-auto"><p>
                 <button class="btn btn-info btn-lg bth-right" role="button" >Register</button><br></p>
                 </div>
              
                <!-- end row -->
           
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


@endsection