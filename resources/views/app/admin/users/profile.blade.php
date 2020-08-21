@extends('app.admin.layouts.default')

@section('content_class') content p-0 @endsection



{{-- Web site Title --}}

@section('title') Member profile:: @parent

@stop
 
 
{{-- Content --}}

@section('main')

                <!-- Cover area -->
                <div class="profile-cover">
                    <div class="profile-cover-img" style="background-image: url({{ url('img/cache/original/'.$cover_photo) }})"></div>
                    <div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">
                        <div class="mr-md-3 mb-2 mb-md-0 avatarin ajxloaderouter">
                            <div class="rounded-circle" id="profilephotopreview" style="width:100px;height:100px;margin:0px auto;background-image:url({{ url('img/cache/profile/'.$profile_photo) }}">
                    </div>
                            <div class="profileuploadwrapper">
                            <form id="profilepicform" method="post" name="profilepicform">
                                {!! Form::file('file', ['class' => 'inputfile profilepic','id'=>'profile']) !!}
                                {!! Form::hidden('type', 'profile') !!}
                                {!! Form::hidden('user_id', $selecteduser->id) !!}
                                {!! csrf_field() !!}
                                <label for="profile">
                                    <i class="icon-file-plus position-left">
                                    </i>
                                    <span>
                                    </span>
                                </label>
                            </form>
                        </div>


                        </div>

                        <div class="media-body text-white">
                            <h1 class="mb-0">{{ $selecteduser->name }} {{ $selecteduser->lastname }}</h1>
                            <span class="d-block">{{ $selecteduser->username }}</span>
                    

                        </div>

                        <div class="ml-md-3 mt-2 mt-md-0">
                            <ul class="list-inline list-inline-condensed mb-0">


                                <li class="list-inline-item">
                                    <form id="coverpicform" method="post" name="coverpicform">
                                        {!! Form::file('file', ['class' => 'inputfile coverpic','style'=>'display:none;','id'=>'cover']) !!}
                                    {!! Form::hidden('type', 'cover') !!}
                                    {!! Form::hidden('user_id', $selecteduser->id) !!}
                                    {!! csrf_field() !!}
                                        <label for="cover">
                                            <span class="btn btn-light border-transparent" >
                                                <i class="icon-file-picture mr-2">
                                                </i>
                                                {{ trans('register.cover_image') }}
                                            </span>
                                        </label>
                                    </form>


                                   
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /cover area -->

 
                <!-- Profile navigation -->
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="text-center d-lg-none w-100">
                <ul class="nav navbar-nav visible-xs-block">
                    <li class="full-width text-center">
                        <a data-target="#navbar-second" data-toggle="collapse">
                            <i class="icon-menu7">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>

                    <div class="navbar-collapse collapse" id="navbar-second">
                       <ul class="nav navbar-nav">
            <li class="nav-item">
                <a data-toggle="tab" href="#overview" class="navbar-nav-link active">
                    <i class="icon-calendar3 position-left">
                    </i>
                     {{ trans('register.overview') }}
                </a>
            </li>
             <!--  <li class="nav-item">
                <a data-toggle="tab" href="#activity"  class="navbar-nav-link">
                    <i class="icon-menu7 position-left">
                    </i>
                     {{ trans('register.activity') }}
                </a>
            </li> -->
            <li class="nav-item">
                                <a href="#update" class="navbar-nav-link" data-toggle="tab">
                                    <i class="icon-pencil mr-2"></i>
                                    {{ trans('register.edit_info') }}
                                </a>
            </li>
              <li class="nav-item">
                <a data-toggle="tab" href="#settings"  class="navbar-nav-link">
                    <i class="icon-cog3 position-left">
                    </i>
                    {{ trans('register.account_settings') }}
                </a>
            </li>
            <li class="nav-item">
                 <a data-toggle="tab" href="#payout_info"  class="navbar-nav-link ">
                    <i class="fa fa-credit-card-alt "></i>
                    {{ trans('register.payout_info') }}
                </a>                    
            </li>
           <!--  <li>
 
                <a href="{{ url('admin/notes') }}" class="navbar-nav-link">
                    <i class="icon-stack-text mr-2"></i>
                     {{ trans('register.notes') }}
                </a>
            </li> -->
                  <li class="nav-item">
                     <a data-toggle="tab" href="#referrals"  class="navbar-nav-link">
                        <i class="icon-collaboration position-left"></i>
                        {{ trans('register.referrals') }}
                    </a>

                     
                </li>               
                
            </ul>
                    </div>
                </div>
                <!-- /profile navigation -->

<!-- Content area -->
<div class="content">
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">
<!-- Left content -->
    <div class="tab-content w-100 order-2 order-md-1">
        <div class="tab-pane active show" id="overview">
            @include('app.admin.users.earnings')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="content-group user-details-profile">
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.username') }} :
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->username }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.email') }} :
                                        </label>
                                        <span class="float-right-sm">
                                        <a href="emailto: {{ $selecteduser->email }}">
                                            {{ $selecteduser->email }}
                                        </a>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.sponsor') }}:
                                        </label>
                                        @if(isset($sponsor->username))
                                        <span class="float-right-sm">
                                            {{ $sponsor->username }}
                                        </span>
                                        @endif
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.package') }}:
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->profile_info->package_detail->package }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                        {{ trans('register.first_name') }}:
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->name }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.last_name') }}:
                                        </label>
                                        <span class="float-right-sm">
                                                {{ $selecteduser->lastname }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.gender') }}:
                                        </label>
                                    <span class="float-right-sm">
                                         @if($selecteduser->profile_info->gender == 'm')  
                                         {{ trans('register.male') }}
                                         @elseif($selecteduser->profile_info->gender == 'f')
                                         {{trans('register.female')}}
                                         @else {{ trans('register.trans') }}  
                                         @endif
                                    </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.phone') }}:
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->profile_info->mobile }}
                                        </span>
                                    </div>
                                           <!--  <div class="form-group">
                                                <label class="text-semibold">
                                                    {{ trans('register.wechat') }}
                                                </label>
                                                <span class="float-right-sm">
                                                    {{ $selecteduser->id }}
                                                </span>
                                            </div> -->
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="content-group user-details-profile">
                                    <div class="form-group">
                                        <span class="">
                                            <div class="flag-icon flag-icon-{{ strtolower($selecteduser->profile_info->country) }}" style="width: 250px;height: 188px;">
                                            </div>
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.country') }}:
                                        </label>
                                        <span class="float-right-sm">
                                        {{ $country }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.state') }}:
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $state }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.zipcode') }}:
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->profile_info->zip }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.address') }} :
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->profile_info->address1 }}
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-semibold">
                                            {{ trans('register.city') }} :
                                        </label>
                                        <span class="float-right-sm">
                                            {{ $selecteduser->profile_info->city }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row">
                        </div>
                    </div>
                </div>
                        




             </div>



                    <div class="tab-pane fade in " id="update">                             
                        <div class="card card-flat">

                           {!!  Form::model($selecteduser, array('route' => array('admin.saveprofile', $selecteduser->id))) !!} 


                            <form action="{{ url('admin/saveprofile') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">
                                        {{ trans('update_profile') }}
                                    </h6>
                                    <div class="header-elements">
                                        <ul class="icons-list">
                                            <li><a data-action="collapse"></a></li>
                                            <li><a data-action="reload"></a></li>
                                            <li><a data-action="close"></a></li>
                                        </ul>
                                    </div>
                                </div>
                               



                                <div class="card-body">
                                <div class="row">
<div class="col-md-4">
<div class="required form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
    {!! Form::label('name', trans("register.first_name"), array('class' => 'col-form-label')) !!} {!! Form::text('name', Input::old('name'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_first_name"),'data-parsley-group' => 'block-1']) !!}
    <span class="form-text">
        <small>{!! trans("all.your_firstname") !!}</small>
        @if ($errors->has('name'))
        <strong>{{ $errors->first('name') }}</strong>
        @endif
    </span>
</div>
</div>
<div class="col-md-4">
<div class="required form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
    {!! Form::label('lastname', trans("register.last_name"), array('class' => 'col-form-label')) !!} {!! Form::text('lastname', Input::old('lastname'), ['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_enter_last_name"),'data-parsley-group' => 'block-1']) !!}
    <span class="form-text">
        <small>{!! trans("all.your_lastname") !!}</small>
        @if ($errors->has('lastname'))
        <strong>{{ $errors->first('lastname') }}</strong>
        @endif
    </span>
</div>
</div>
<!-- begin col-6 -->

<div class="col-md-4">
<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('gender') ? ' has-error' : '' }}">
    {!! Form::label('gender', trans("register.gender"), array('class' => 'col-form-label')) !!} {!! Form::select('gender', array('m' => trans("all.male"), 'f' => trans("all.female") ,'other' =>trans("all.trans")),null !==(Input::old('gender')) ? Input::old('gender') : $selecteduser->profile_info->gender,['class' => 'form-control','required' => 'required','data-parsley-required-message' => trans("all.please_select_gender"),'data-parsley-group' => 'block-1']) !!}
    <div class="form-control-feedback">
        <i class="fa fa-neuter text-muted"></i>
    </div>
    <span class="form-text">
        <small>{!! trans("all.select_your_gender_from_list") !!}</small>
        @if ($errors->has('gender'))
        <strong>{{ $errors->first('gender') }}</strong>
        @endif
    </span>
</div>
</div>

</div>
<!-- end row -->
<div class="row">
<div class="col-md-4">

<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', trans("register.country"), array('class' => 'col-form-label')) !!} {!! Form::select('country', $countries ,null !==(Input::old('country')) ? Input::old('country') : $selecteduser->profile_info->country,['class' => 'form-control','id' => 'country','required' => 'required','data-parsley-required-message' => trans("all.please_select_country"),'data-parsley-group' => 'block-1']) !!}
    <div class="form-control-feedback">
        <i class="fa fa-flag-o text-muted"></i>
    </div>
    <span class="form-text">
        <small>{!! trans("all.select_country") !!}</small>
        @if ($errors->has('country'))
        <strong>{{ $errors->first('country') }}</strong>
        @endif
    </span>
</div>
</div>

<div class="col-md-4">
<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', trans("register.city"), array('class' => 'col-form-label')) !!} {!! Form::text('city', null !==(Input::old('city')) ? Input::old('city') : $selecteduser->profile_info->city, ['class' => 'form-control','required' => 'required','id' => 'city','data-parsley-required-message' => trans("all.please_enter_city"),'data-parsley-group' => 'block-1']) !!}
    <div class="form-control-feedback">
        <i class="icon-city text-muted"></i>
    </div>
    <span class="form-text">
        <small>{!! trans("all.your_city") !!}</small>
        @if ($errors->has('city'))
        <strong>{{ $errors->first('city') }}</strong>
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
    {!! Form::label('zip', trans("register.zip_code"), array('class' => 'col-form-label')) !!} {!! Form::text('zip', null !==(Input::old('zip')) ? Input::old('zip') : $selecteduser->profile_info->zip, ['class' => 'form-control','required' => 'required','id' => 'zip','data-parsley-required-message' => trans("all.please_enter_zip"),'data-parsley-group' => 'block-1','data-parsley-zip' => 'us','data-parsley-type' => 'digits','data-parsley-length' => '[5,8]','data-parsley-state-and-zip' => 'us','data-parsley-validate-if-empty' => '','data-parsley-errors-container' => '#ziperror' ]) !!}
    <span class="form-text">
        <span id="ziplocation"><span></span></span>
    <span id="ziperror"></span>
    <small>{!! trans("all.your_zip") !!}</small> @if ($errors->has('zip'))
    <strong>{{ $errors->first('zip') }}</strong> @endif
    </span>
</div>
</div>
</div>
<div class="row">

<div class="col-md-6">
<div class="required form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
    {!! Form::label('address1', trans("register.address1"), array('class' => 'col-form-label')) !!} {!! Form::textarea('address1', null !==(Input::old('address1')) ? Input::old('address1') : $selecteduser->profile_info->address1, ['class' => 'form-control','required' => 'required','id' => 'address1','rows'=>'2','data-parsley-required-message' => trans("all.please_enter_address1"),'data-parsley-group' => 'block-1']) !!}
    <span class="form-text">
        <small>{!! trans("all.your_address1") !!}</small>
        @if ($errors->has('address'))
        <strong>{{ $errors->first('address1') }}</strong>
        @endif
    </span>
</div>
</div>
<div class="col-md-6">
<div class="required form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
    {!! Form::label('address2', trans("register.address2"), array('class' => 'col-form-label')) !!} {!! Form::textarea('address2', null !==(Input::old('address2')) ? Input::old('address2') : $selecteduser->profile_info->address2, ['class' => 'form-control','required' => 'required','id' => 'address2','rows'=>'2','data-parsley-required-message' => trans("all.please_enter_address2"),'data-parsley-group' => 'block-1']) !!}
    <span class="form-text">
        <small>{!! trans("all.your_address1") !!}</small>
        @if ($errors->has('address'))
        <strong>{{ $errors->first('address1') }}</strong>
        @endif
    </span>
</div>
</div>

</div>

<div class="row">
<!-- begin col-6 -->
<div class="col-md-6">
<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', trans("register.phone"), array('class' => 'col-form-label')) !!} {!! Form::text('phone', null !==(Input::old('phone')) ? Input::old('phone') : $selecteduser->profile_info->mobile, ['class' => 'form-control','id' => 'phone','data-parsley-required-message' => trans("all.please_enter_phone_number"),'data-parsley-group' => 'block-1']) !!}
    <div class="form-control-feedback">
        <i class=" icon-mobile3 text-muted"></i>
    </div>
    <span class="form-text">
        <small>{!! trans("all.enter_your_phone_number") !!}</small>
        @if ($errors->has('phone'))
        <strong>{{ $errors->first('phone') }}</strong>
        @endif
    </span>
</div>
</div>
<div class="col-md-6">
<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', trans("register.email"), array('class' => 'col-form-label')) !!} {!! Form::email('email', Input::old('email'), ['class' => 'form-control','id' => 'email','data-parsley-required-message' => trans("all.please_enter_email"),'data-parsley-group' => 'block-1']) !!}
    <div class="form-control-feedback">
        <i class="icon-mail5 text-muted"></i>
    </div>
    <span class="form-text">
        <small>{!! trans("all.type_your_email") !!}</small>
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
<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('wechat') ? ' has-error' : '' }}">
    {!! Form::label('wechat', trans("register.wechat"), array('class' => 'col-form-label')) !!} {!! Form::text('wechat', null !==(Input::old('wechat')) ? Input::old('wechat') : $selecteduser->profile_info->wechat, ['class' => 'form-control','id' => 'wechat','data-parsley-required-message' => trans("all.please_enter_wechat"),'data-parsley-group' => 'block-1']) !!}
    <span class="form-text">
        <small>{!! trans("all.type_your_wechat") !!}</small>
        @if ($errors->has('wechat'))
        <strong>{{ $errors->first('wechat') }}</strong>
        @endif
    </span>
</div>
</div>
<!-- begin col-4 -->
<div class="col-md-6">
<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('passport') ? ' has-error' : '' }}">
    {!! Form::label('passport', trans("register.national_identification_number"), array('class' => 'col-form-label')) !!} {!! Form::text('passport', null !==(Input::old('passport')) ? Input::old('passport') : $selecteduser->profile_info->passport, ['class' => 'form-control','required' => 'required','id' => 'passport','data-parsley-required-message' => trans("all.please_enter_passport"),'data-parsley-group' => 'block-1']) !!}
    <div class="form-control-feedback">
        <i class="icon-user-check text-muted"></i>
    </div>
    <span class="form-text">
        <small>{!! trans("all.type_your_passport_number") !!}</small>
        @if ($errors->has('passport'))
        <strong>{{ $errors->first('passport') }}</strong>
        @endif
    </span>
</div>
</div>
</div>
 


</div>

                 


    <div class="text-right">
        <button class="btn btn-primary" type="submit">
             {{ trans('register.save') }}
            <i class="icon-arrow-right14 position-right">
            </i>
        </button>
    </div>

</form>
</div>
</div>

<div class="tab-pane fade in" id="payout_info">
    <div class="card card-flat timeline-content">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">
                {{ trans('profile.payout_info') }}
            </h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a data-action="collapse">
                        </a>
                    </li>
                    <li>
                        <a data-action="reload">
                        </a>
                    </li>
                    <li>
                        <a data-action="close">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/payout_info/edit/'.$selecteduser->id) }}" method="post" data-parsley-validate="parsley">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if($Manual_Bank==1)
                        <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                    {{ trans('register.account_number') }}
                                    </label>
                                    <input class="form-control" name="account_number" type="text" value="{{ $selecteduser->profile_info->account_number }}">
                                </div>
                                <div class="col-md-6">
                                    <label>
                                    {{ trans('register.account_holder_name') }}
                                    </label>
                                    <input class="form-control" name="account_holder_name" type="text" value="{{ $selecteduser->profile_info->account_holder_name }}">
                                </div>
                            </div>
                        </div> -->
                         <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                    {{ trans('register.bitcoin_address') }}
                                    </label>
                                    <input class="form-control" name="bitcoin_address" type="text" value="{{ $selecteduser->bitcoin_address }}">
                                </div>
                             <!--    <div class="col-md-6">
                                    <label>
                                    {{ trans('register.bitcoin_address') }}
                                    </label>
                                    <input class="form-control" name="account_holder_name" type="text" value="{{ $selecteduser->profile_info->account_holder_name }}">
                                </div> -->
                            </div>
                        </div>
                       <!--  <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                    {{ trans('register.bank_code') }}
                                    </label>
                                    <input class="form-control" name="swift" type="text" value="{{ $selecteduser->profile_info->swift }}">
                                </div>
                                <div class="col-md-6">
                                    <label>
                                    {{ trans('register.bank_code') }}
                                    </label>
                                    <input class="form-control" name="bank_code" type="text" value="{{ $selecteduser->profile_info->bank_code }}">
                                </div>
                            </div>
                        </div> -->
                    @endif
                    @if($Bitaps==1)
                        <div class="form-group">
                            <div class="row">
                            <!-- <div class="col-md-6">
                                <label>
                                    {{ trans('register.paypal') }}
                                </label>
                                <input class="form-control" name="paypal" type="text" value="{{ $selecteduser->profile_info->paypal }}">
                                 
                            </div> -->
                               <!--  <div class="col-md-6">
                                    <label>
                                    {{ trans('register.btc_wallet_address') }}
                                    </label>
                                    <input class="form-control" name="btc_wallet" type="text" value="{{ $selecteduser->profile_info->btc_wallet }}">
                                </div> -->
                            </div>
                        </div>
                    @endif
                    <div>
          
                    @if(!$selecteduser->hypperwalletid == 0)
                        <div class="form-group">
                            <div class="row">
                                @if($Hyperwallet==1)  
                                    <div class="col-md-6">
                                        <label>
                                        {{ trans('register.hyperwallet') }} Id
                                        </label>
                                        <input class="form-control" name="hypperwalletid"  type="text" value="{{ $selecteduser->hypperwalletid }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>
                                            {{ trans('register.hyperwallet_token') }}
                                        </label>
                                        <input class="form-control" name="hyperwallet_token" type="text" value="{{ $selecteduser->hypperwallet_token }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
                         <!-- {{ trans('register.please_create_hyperwallet') }}ID  -->
                        <br>
                        <!-- <div>
                            <a href="{{ url('admin/createhypperwalletid/'.$selecteduser->id) }}" type="button" class="btn btn-primary"> {{ trans('register.create') }}ID</a>
                         </div> -->
                    @endif
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" type="submit">
                         {{ trans('register.save') }}
                        <i class="icon-arrow-right14 position-right">
                        </i>
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>








<div class="tab-pane fade in " id="activity">

    <!-- Timeline -->
    <div class="timeline timeline-left content-group">
        <div class="timeline-container">
            @foreach($activities as $activity)
           
            <div class="timeline-row">
                <div class="timeline-icon">
                    <a href="#">
                       {{ Html::image(route('imagecache', ['template' => 'profile', 'filename' => $activity->user->profile_info->image]), $activity->user->username, array('class' => '','style'=>'')) }}
                    </a>
                </div>
                <div class="card card-flat timeline-content">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">
                            {{ $activity->title }}
                        </h6>
                        <div class="header-elements">
                            <span class="label label-success heading-text">
                                <i class="icon-history position-left text-success">
                                </i>
                                {{ $activity->created_at->diffForHumans() }}
                            </span>
                            <ul class="icons-list">
                                <li>
                                    <a data-action="reload">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $activity->description }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /timeline -->
</div>

<div class="tab-pane fade in " id="referrals">
<!-- Timeline -->
    <div class="card card-flat timeline-content">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">
                {{trans('users.referrals')}}
                <a class="heading-elements-toggle"></a>
            </h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li>
                        <a data-action="collapse"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            @include('app.admin.users.referrals')
        </div>
    </div>
<!-- /timeline -->
</div>

<div class="tab-pane fade" id="settings">
<!-- Account settings -->
    <div class="card card-flat timeline-content">


        <div class="card-header header-elements-inline">
            <h6 class="card-title">
                 {{ trans('register.account_settings') }}
            </h6>
        
        </div>
        <div class="card-body">
            <div class="card card-flat timeline-content">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">
                   {{ trans('register.login_password') }}
                    </h6>
              
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/loginPassword_settings') }}" method="post" >
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label>
                                    {{ trans('register.new_login_password') }}
                                    </label>
                                    <input class="form-control" name="new_loginPassword" type="password" value="">
                 
                                    </div>
                                    <div class="col-md-6">
                                    <label>
                                    {{ trans('register.confirm_password') }}
                                    </label>
                                    <input class="form-control" name="confirm__loginPassword" type="password" value="">
                                    </div>   
                                </div>
                            </div>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit">
                                      {{ trans('register.update') }}
                                        <i class="icon-arrow-right14 position-right">
                                        </i>
                                    </button>
                                </div>
                                <input class="form-control" name="id" type="hidden" value="{{$selecteduser->id}}">
                    </form>
                </div>
            </div>
             
              

        </div>


        <div class="card-body">
            <div class="card card-flat timeline-content">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">
                        Security question 
                    </h6>
              
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/security_settings') }}" method="post" >
                        <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <label>Question </label>
                                    <input class="form-control" name="security_question" type="text" value="{{$selecteduser->profile_info->security_question}}">
                 
                                    </div>
                                    <div class="col-md-6">
                                    <label> Answer </label>

                                    <input class="form-control" name="security_answer" type="text" value="{{$selecteduser->profile_info->security_answer}}">
                                    </div>   
                                </div>
                            </div>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit">
                                      {{ trans('register.update') }}
                                        <i class="icon-arrow-right14 position-right">
                                        </i>
                                    </button>
                                </div>
                                <input class="form-control" name="id" type="hidden" value="{{$selecteduser->id}}">
                    </form>
                </div>
            </div>
             
              

        </div>


    </div>
<!-- /account settings -->
</div>


</div>





<!-- /left content -->


<!-- Right sidebar component -->
   <!--  <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-lg-2 sidebar-expand-md"> -->
     <div class="sidebar-component-right wmin-300 border-0 order-lg-2 sidebar-expand-md">

<!-- Sidebar content -->
    <div class="sidebar-content">

        <div class="card card-body">
            <div class="row text-center">
                <div class="col-md-4">
                    <p>
                        <i class="icon-medal-star icon-2x display-inline-block text-warning">
                        </i>
                    </p>
                    <h5 class="text-semibold no-margin" style="font-size: 15px;">
                    
                {{ $user_rank_name }}
                    </h5>
                    <span class="text-muted text-size-small">
                         {{ trans('register.rank') }}
                    </span>
                </div>
                <div class="col-md-4">
                    <p>
                        <i class="icon-users2 icon-2x display-inline-block text-info">
                        </i>
                    </p>
                    <h5 class="text-semibold no-margin" style="font-size: 15px;">
                        {{ $referrals_count }}
                    </h5>
                    <span class="text-muted text-size-small">
                        {{ trans('all.referrals') }}
                    </span>
                </div>
                <div class="col-md-4">
                    <p>
                        <i class="icon-cash3 icon-2x display-inline-block text-success">
                        </i>
                    </p>
                    <h5 class="text-semibold no-margin" style="font-size: 15px;">
                       
                    </h5>
                    <span class="text-muted text-size-small">
                        {{ trans('all.balance') }}
                    </span>
                </div>
            </div>
        </div>
        <div class="content-group">
            @if(isset($sponsor->username))
            <div background-size:="" class="card-body bg-blue border-radius-top text-center" contain;"="">
                <div class="content-group-sm">
                    <h5 class="text-semibold no-margin-bottom">
                       {{ trans('register.sponsor_information') }}
                    </h5>
                </div>
            </div>
            <div class="card card-body no-border-top no-border-radius-top">
                <div class="form-group mt-1">
                    <label class="text-semibold">
                         {{ trans('register.sponsor_name') }}:
                    </label>
                    <span class="float-right-sm">
                        {{ $sponsor->name }}
                    </span>
                </div>
                <div class="form-group mt-1">
                    <label class="text-semibold">
                         {{ trans('register.sponsor_username') }}:
                    </label>
                    <span class="float-right-sm">
                        {{ $sponsor->username }}
                    </span>
                </div>
                <div class="form-group mt-1">
                    <label class="text-semibold">
                         {{ trans('register.sponsor_country') }}:
                    </label>
                    <span class="float-right-sm">
                        {{ $sponsor->profile_info->country }}
                    </span>
                </div>
                <div class="form-group mt-1">
                    <label class="text-semibold">
                         {{ trans('register.date_joined') }}:
                    </label>
                    <span class="float-right-sm">
                        {{ $sponsor->profile_info->created_at->toFormattedDateString() }}
                    </span>
                </div>
            </div>
            @endif
        </div>
    <!-- Share your thoughts -->
   <!--  <div class="card card-flat">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">
                {{ trans('register.create_a_note') }}
                
            </h6>
            <div class="heading-elements">
                </div>
            
        </div>
        <div class="card-body">
            <form action="#" class="notesform" data-parsley-validate="">
                <div class="form-group">
                    <input class="form-control mb-13" cols="1" id="title" name="title" placeholder="Note title" required="" type="text"/>
                </div>
                <div class="form-group">
                    <textarea class="form-control mb-13" cols="1" id="description" name="description" placeholder="Note content" required="" rows="3">
                    </textarea>
                </div>
                 <div class="form-group">
                        
                        <div class=" " id="note-color" data-toggle="buttons">
                        <label class="btn btn-primary btn-xs">
                          <input type="radio" name="color" value="bg-primary" checked>  {{ trans('register.primary') }} </label>
                        <label class="btn btn-success btn-xs">
                          <input type="radio" name="color" value="bg-success"> {{ trans('register.success') }}</label>
                          <br>
                        <label class="btn btn-info btn-xs">
                          <input type="radio" name="color" value="bg-info"> {{ trans('register.info') }}</label>
                        <label class="btn btn-warning btn-xs">
                          <input type="radio" name="color" value="bg-warning"> {{ trans('register.warning') }}</label>
                          <br>
                        <label class="btn btn-danger btn-xs">
                          <input type="radio" name="color" value="bg-danger"> {{ trans('register.danger') }}</label>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-link" href="{{ url('admin/notes') }}">
                            {{ trans('register.view_all_notes') }}
                            <i class="icon-arrow-right14 position-right">
                            </i>
                        </a>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="submit-note btn btn-primary btn-labeled btn-labeled-right" type="button">
                             {{ trans('register.save') }}
                            <b>
                                <i class="icon-circle-right2">
                                </i>
                            </b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->
    <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
                <!-- /inner container -->

    </div>
            <!-- /content area -->





@endsection 
{{-- Scripts --}}
@section('scripts')
@parent
<script>


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
@endsection

@section('styles')
@parent
<style type="text/css">
    div#profilephotopreview {
    background-size: cover;
}
</style>
@endsection
