@extends('app.user.layouts.default')

{{-- Web site Title --}}

@section('title') Member profile:: @parent

@stop

@section('styles') @parent

<link  href="https://fonts.googleapis.com/css?family=Reenie+Beanie:regular" rel="stylesheet" type="text/css">
<style type="text/css">



</style>

@endsection

{{-- Content --}}

@section('main')

@include('flash::message')

                <!-- Cover area -->

<div class="profile-cover">

    <div class="profile-cover-img" style="background-image: url({{url('img/cache/original/'.$cover_photo)}}">

    </div>

    <div class="media align-items-center text-center text-md-left flex-column flex-md-row m-0">

        <div class="mr-md-3 mb-2 mb-md-0 avatarin ajxloaderouter">

            <div class="rounded-circle" id="profilephotopreview" style="width:100px;height:100px;margin:0px auto;background-image:url({{url('img/cache/profile/'.$profile_photo)}}">

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

                                <span class="btn btn-light border-transparent" href="#">

                                    <i class="icon-file-picture position-left"></i>

                                        {{trans('profile.cover_image')}}

                                </span>

                            </label>

                        </form>

                    </li>

                </ul>

            </div>

    </div>

</div>

<!-- /cover area -->



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

                  {{trans('profile.overview')}}

                </a>

            </li>

              <!-- <li class="nav-item">

                <a data-toggle="tab" href="#activity"  class="navbar-nav-link">

                    <i class="icon-menu7 position-left">

                    </i>

                  {{trans('profile.activity')}}  

                </a>

            </li> -->

            <li class="nav-item">

                                <a href="#update" class="navbar-nav-link" data-toggle="tab">

                                    <i class="icon-pencil mr-2"></i>

                                   {{trans('profile.edit_info')}} 

                                </a>

            </li>

              <li class="nav-item">

                <a data-toggle="tab" href="#settings"  class="navbar-nav-link">

                    <i class="icon-cog3 position-left">

                    </i>

                   {{trans('profile.account_settings')}} 

                </a>

            </li>

                <li class="nav-item">

                     <a data-toggle="tab" href="#payout_info"  class="navbar-nav-link ">

                        <i class="fa fa-credit-card-alt "></i>

                        {{trans('profile.payout_info')}}

                    </a>                    

                </li>

         

      <!--   </ul>

        <div class="navbar-right navbar-collapse collapse">

            <ul class="nav navbar-nav"> -->

                 <!-- <li class="nav-item">

                                <a href="{{ url('user/notes') }}" class="navbar-nav-link">

                                    <i class="icon-stack-text mr-2"></i>

                                   {{trans('profile.notes')}} 

                                </a>

                            </li>
 -->
                  <li class="nav-item">

                     <a data-toggle="tab" href="#referrals"  class="navbar-nav-link">

                        <i class="icon-collaboration position-left"></i>

                       {{trans('profile.referrals')}} 

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

                                                    {{ trans('register.business_plan') }}:

                                                </label>

                                                <span class="float-right-sm">

                                                    {{$selecteduser->profile_info->package_detail->package}}

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

                                                @if($selecteduser->profile_info->gender == 'm')  {{ trans('register.male') }}

                                                @elseif($selecteduser->profile_info->gender == 'f')

                                                {{trans('register.female')}}

                                                @else {{ trans('register.trans') }}

                                                @endif

                                            </span>

                                            </div>

                                            <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Date of Birth') }}:

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->profile_info->dateofbirth }}

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

                                                    {{ trans('Branch :') }}

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->branch }}

                                                </span>

                                            </div>
                                             <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Bank Name :') }}

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->bank_name }}

                                                </span>

                                            </div>
                                             <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Account Holder Name :') }}

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->profile_info->account_holder_name }}

                                                </span>

                                            </div>

                                            <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Account Number :') }}

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->account_number }}

                                                </span>

                                            </div>
                                             <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Id Number :') }}

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->id_number }}

                                                </span>

                                            </div>
                                            <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Next of Kin' ) }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->next_of_kin }}

                                                </span>

                                            </div> -->
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

                                                    {{ trans('Address 2') }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->profile_info->address2 }}

                                                </span>

                                            </div>

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

                                                    {{ trans('Region') }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->profile_info->state }}

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

                                                    {{ trans('register.city') }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->profile_info->city }}

                                                </span>

                                            </div>
                                            <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Location') }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->profile_info->location }}

                                                </span>

                                            </div>
                                             <!-- <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Next of Kin') }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->next_of_kin }}

                                                </span>

                                            </div> -->
                                             <div class="form-group">

                                                <label class="text-semibold">

                                                    {{ trans('Any other Info') }} :

                                                </label>

                                                <span class="float-right-sm">

                                                    {{ $selecteduser->info }}

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



<div class="tab-pane fade in" id="activity">

                        <!-- Timeline -->

                      

                        <div class="timeline timeline-left content-group">

                            <div class="timeline-container">

                                @foreach($activities as $activity)

                                

                                <div class="timeline-row">

                                    <div class="timeline-icon">

                                        <a href="#" >

                                            {{ Html::image(route('imagecache', ['template' => 'profile', 'filename' => $activity->user->profile_info->profile]), $activity->user->username, array('class' => '','style'=>'')) }}

                                        </a>

                                    </div>

                                  <div class="card card-flat timeline-content">

                    <div class="card-header header-elements-inline">

                        <h6 class="card-title">

                                                {{$activity->title}}

                                            </h6>

                                            <div class="heading-elements">

                                                <span class="label label-success heading-text">

                                                    <i class="icon-history position-left text-success">

                                                    </i>

                                                    {{$activity->created_at->diffForHumans()}}

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

                                            {{$activity->description}}

                                        </div>

                                    </div>

                                </div>

                                @endforeach

                            </div>

                        </div>

                        <!-- /timeline -->

                    </div>



                    <div class="tab-pane fade in " id="update">                             

                        <div class="card card-flat">



                           {!!  Form::model($selecteduser, array('route' => array('user.saveprofile', $selecteduser->id))) !!} 





                            <form action="{{ url('user/profile/edit/'.$selecteduser->id) }}" method="post" data-parsley-validate="parsley">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="card-header header-elements-inline">

                                    <h6 class="card-title">

                                        {{ trans('profile.update_profile') }}

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

        <small>{!! trans("all.your_first_name") !!}</small>

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

        <small>{!! trans("all.your_last_name") !!}</small>

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

    {!! Form::label('state', trans("Region"), array('class' => 'col-form-label')) !!} {!! Form::text('state', null !==(Input::old('state')) ? Input::old('state') : $selecteduser->profile_info->state, ['class' => 'form-control','required' => 'required','id' => 'city','data-parsley-required-message' => trans("Please Enter Region"),'data-parsley-group' => 'block-1']) !!}

    <div class="form-control-feedback">

        <i class="icon-city text-muted"></i>

    </div>

    <span class="form-text">

        <small>{!! trans("Your Region") !!}</small>

        @if ($errors->has('state'))

        <strong>{{ $errors->first('state') }}</strong>

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

    {!! Form::label('zip', trans("register.zip_code"), array('class' => 'col-form-label')) !!} {!! Form::text('zip', null !==(Input::old('zip')) ? Input::old('zip') : $selecteduser->profile_info->zip, ['class' => 'form-control','required' => 'required','id' => 'zip','data-parsley-required-message' => trans("all.please_enter_zip"),'pattern'=>'[0-9]{1}[0-9]{3,7}','data-parsley-group' => 'block-1','data-parsley-zip' => 'us','data-parsley-type' => 'digits','data-parsley-length' => '[5,8]','data-parsley-state-and-zip' => 'us','data-parsley-validate-if-empty' => '','data-parsley-errors-container' => '#ziperror' ]) !!}

    <span class="form-text">

        <span id="ziplocation"><span></span></span>

    <span id="ziperror"></span>

    <small>{!! trans("all.your_zip") !!}</small> @if ($errors->has('zip'))

    <strong>{{ $errors->first('zip') }}</strong> @endif

    </span>

</div>

</div>

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

   {!! Form::label('email', trans("register.email"), array('class' => 'col-form-label')) !!} {!! Form::email('email', Input::old('email'), ['class' => 'form-control','required' => 'required','id' => 'email','data-parsley-required-message' => trans("all.please_enter_email"),'data-parsley-group' => 'block-1']) !!}

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

<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('next_of_kin') ? ' has-error' : '' }}">

      {!! Form::label('Location', trans("Location"), array('class' => 'col-form-label')) !!} {!! Form::text('location', null !==(Input::old('location')) ? Input::old('location') : $selecteduser->profile_info->location, ['class' => 'form-control','id' => 'location','data-parsley-required-message' => trans("Please Enter Location"),'data-parsley-group' => 'block-1']) !!}

    <div class="form-control-feedback">

        <i class=" icon-mobile3 text-muted"></i>

    </div>

    <span class="form-text">

        <small>{!! trans("Enter Your Location") !!}</small>

        @if ($errors->has('location'))

        <strong>{{ $errors->first('location') }}</strong>

        @endif

    </span>

</div>

</div>

<div class="col-md-6">

<div class="required form-group has-feedbackX has-feedback-leftx {{ $errors->has('info') ? ' has-error' : '' }}">

   {!! Form::label('email', trans("Any Other Info"), array('class' => 'col-form-label')) !!} {!! Form::text('info', Input::old('info'), ['class' => 'form-control','required' => 'required','id' => 'info','data-parsley-required-message' => trans("Any Other Info"),'data-parsley-group' => 'block-1']) !!}

    <div class="form-control-feedback">

        <i class="icon-mail5 text-muted"></i>

    </div>

    <span class="form-text">

        <small>{!! trans("Any Other Info") !!}</small>

        @if ($errors->has('info'))

        <strong>{{ $errors->first('info') }}</strong>

        @endif

    </span>

</div>

</div>

</div>




 <div class="text-right">

    <button class="btn btn-primary" type="submit">

         {{trans('profile.save')}} 

        <i class="icon-arrow-right14 position-right">

        </i>

    </button>

</div>



</div>



</form>

</div>

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

            <form action="{{ url('user/payout_info/edit/'.$selecteduser->id) }}" method="post" data-parsley-validate="parsley">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  

                   

                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-10">

                                   <label>
                                    {{ trans('register.bitcoin_address') }}
                                    </label>
                                    <input class="form-control" name="bitcoin_address" type="text" value="{{ $selecteduser->bitcoin_address }}">

                                </div> 

                            </div>
                          <!--   <div class="row">
                                    <div class="col-md-6">
                                        <label>Security question </label>
                                    <input class="form-control" name="security_question" type="text" value="{{ $selecteduser->profile_info->security_question }}" readonly="">
                                </div> 
                                <div class="col-md-6">
                                        <label>Security answer </label>
                                    <input class="form-control" name="answer" type="text" value="" required="">
                                </div> 
                            </div> -->
                        </div>

                            

 
                    <div class="text-right">

                        <button class="btn btn-primary" type="submit">

                         {{trans('profile.save')}} 

                        <i class="icon-arrow-right14 position-right">

                        </i>

                        </button>

                    </div>

            </form>

        </div>

    </div>

</div>

<div class="tab-pane fade" id="settings">

<!-- Account settings -->

    <div class="card card-flat timeline-content">

        <div class="card-header header-elements-inline">

            <h6 class="card-title">

                {{trans('profile.account_settings')}}  

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

            <div class="card card-flat timeline-content">

                <div class="card-header header-elements-inline">

                    <h6 class="card-title">

                   {{ trans('register.login_password') }}

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

                    <form action="{{ url('user/loginPassword_settings') }}" method="post" >

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

    </div>

<!-- /account settings -->

</div>



</div>

<!-- /left content -->





<!-- Right sidebar component -->

    <div class="sidebar-component-right wmin-300 border-0 order-lg-2 sidebar-expand-md">



    <!-- Sidebar content -->

    <div class="sidebar-content">

        <div class="card card-body">

        <div class="row text-center">

            <div class="col">

                <p>

                    <i class="icon-medal-star icon-2x display-inline-block text-warning">

                    </i>

                </p>

                <h5 class="text-semibold no-margin">

                    {{ $user_rank_name }}

                </h5>

                <span class="text-muted text-size-small">

                    {{trans('profile.rank')}}  

                </span>

            </div>

            <div class="col">

                <p>

                    <i class="icon-users2 icon-2x display-inline-block text-info">

                    </i>

                </p>

                <h5 class="text-semibold no-margin">

                    {{ $referrals_count }}

                </h5>

                <span class="text-muted text-size-small">

                    {{ trans('all.referrals') }}

                </span>

            </div>

            <div class="col">

                <p>

                    <i class="icon-cash3 icon-2x display-inline-block text-success">

                    </i>

                </p>

                <h5 class="text-semibold no-margin">

                    {{ $balance}}

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

                     {{trans('profile.consultant_information')}} 

                </h5>

            </div>

        </div>

        <div class="card card-body no-border-top no-border-radius-top">

            <div class="form-group mt-1">

                <label class="text-semibold">

                     {{trans('profile.consultant_name')}}:

                </label>

                <span class="float-right-sm">

                    {{ $sponsor->name }}

                </span>

            </div>

            <div class="form-group mt-1">

                <label class="text-semibold">

                    {{trans('profile.consultant_username')}}:

                </label>

                <span class="float-right-sm">

                    {{ $sponsor->username }}

                </span>

            </div>

            <div class="form-group mt-1">

                <label class="text-semibold">

                    {{trans('profile.consultant_country')}}:

                </label>

                <span class="float-right-sm">

                    {{ $sponsor->profile_info->country }}

                </span>

            </div>

            <div class="form-group mt-1">

                <label class="text-semibold">

                   {{trans('profile.date_joined')}}:

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

                  {{trans('profile.create_a_note')}}    

                   

                </h6>

                <div class="heading-elements">

                </div>

            </div>

            <div class="card-body">

                <form action="#" class="usernotesform" data-parsley-validate="">

                    <div class="form-group">

                        <input class="form-control mb-13" cols="1" id="title" name="title" placeholder="Note title" required="" type="text"/>

                    </div>

                    <div class="form-group">

                        <textarea class="form-control mb-13" cols="1" id="description" name="description" placeholder="Note content" required="" rows="3"></textarea>

                    </div>

                    <div class="form-group">

                        

                        <div class=" " id="note-color" data-toggle="buttons">

                        <label class="btn btn-primary btn-xs">

                          <input type="radio" name="color" value="bg-primary" checked>  {{trans('profile.primary')}}  </label>

                        <label class="btn btn-success btn-xs">

                          <input type="radio" name="color" value="bg-success"> {{trans('profile.success')}} </label>

                          <br>

                        <label class="btn btn-info btn-xs">

                          <input type="radio" name="color" value="bg-info"> {{trans('profile.info')}} </label>

                        <label class="btn btn-warning btn-xs">

                          <input type="radio" name="color" value="bg-warning"> {{trans('profile.warning')}} </label>

                          <br>

                        <label class="btn btn-danger btn-xs">

                          <input type="radio" name="color" value="bg-danger"> {{trans('profile.danger')}} </label>

                        </div>

                    </div>

                    <div class="row"> 

                         <div class="col-sm-6 ">

                        <a class="btn btn-link" href="{{ url('user/notes') }}">

                            {{trans('profile.view_all_notes')}}  

                           

                        </a>

                    </div>



                        <div class="col-sm-6 text-right">

                            <button class="submit-user-note btn btn-primary btn-labeled btn-labeled-right" type="button">

                                {{trans('profile.save')}}  

                            </button>

                        </div>

                        

                    </div>

                </form>

            </div>

        </div> -->

 

                        </div>

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

<script type="text/javascript">

     $('.submit-user-note').click(function () {

        $('.usernotesform').submit();

    });

    $(".usernotesform").submit(function (e) {

    e.preventDefault();

    var formData = new FormData($(this)[0]);

    $('.usernotesform').parsley().validate();

    if ($('.usernotesform').parsley().isValid()) {

        var block = $(this).parent().parent().parent().parent();

        $.ajax({

            url: CLOUDMLMSOFTWARE.siteUrl + '/user/postusernote',

            data: new FormData($('.usernotesform')[0]),

            dataType: 'json',

            async: true,

            type: 'post',

            processData: false,

            contentType: false,

            beforeSend: function beforeSend() {

                $(block).block({

                    message: '<i class="icon-spinner2 spinner"></i>',

                    overlayCSS: {

                        backgroundColor: '#fff',

                        opacity: 0.8,

                        cursor: 'wait',

                        'box-shadow': '0 0 0 1px #ddd'

                    },

                    css: {

                        border: 0,

                        padding: 0,

                        backgroundColor: 'none'

                    }

                });

            },

            success: function success(response) {

                $(block).unblock();

                $('.usernotesform').find("input[type=text], textarea").val("");

                new PNotify({

                    text: 'Note Added',

                    // styling: 'brighttheme',

                    // icon: 'fa fa-file-image-o',

                    type: 'success',

                    delay: 1000,

                    animate_speed: 'fast',

                    nonblock: {

                        nonblock: true

                    }

                });

                if ($('#notes').length) {

                    $newNote = '<div class="each-note col-sm-4"><div class="panel ' + response.color + '"><div class="panel-body"><div class="media"><div class="media-left"><i class=" icon-file-text3 text-warning-400 no-edge-top mt-5"></i></div><div class="media-body"><h6 class="media-heading text-semibold">' + response.title + ' - <i class="text-xs">' + response.date + '</i></h6>' + response.description + '</div></div></div><div class="panel-footer ' + response.color + ' panel-footer-condensed"><a class="heading-elements-toggle"><i class="icon-more"></i></a><div class="heading-elements"><button class="btn  btn-link btn-xs heading-text text-default btn-delete-note" data-id="' + response.id + ' " type="button"><i class="icon-trash text-size-small position-right"></i></button></div></div></div></div>';

                    $('#notes>.row:first-child').append($newNote);

                }

            }

        });

    } else {

        console.log('not valid');

    }

});



//     $(document).ready(function () {

//     if ($(".btn-delete-note").length) {

//         $('#notes').on('click', '.btn-delete-note', function (e) {

//             var id = $(this).data('id');

//             var this_context = $(this);

//             // confirm('Are you sure you want to delete the note?','confirmation','yes','no');

//             swal({

//                 title: "Are you sure?",

//                 text: "Your will not be able to recover this note!",

//                 type: "warning",

//                 showCancelButton: true,

//                 confirmButtonClass: "btn-danger",

//                 confirmButtonText: "Yes, delete it!",

//                 closeOnConfirm: false

//             }, function () {

//                 //console.log(id);

//                 $.ajax({

//                     url: CLOUDMLMSOFTWARE.siteUrl + '/user/notes/'+id,

//                     data: {

//                         'note_id': id

//                     },

//                     dataType: 'json',

//                     async: true,

//                     type: 'delete',

//                     beforeSend: function beforeSend() {

//                         this_context.closest('.each-note');

//                     },

//                     success: function success(response) {

//                         this_context.closest('.each-note').remove();

//                         swal('Deleted!');

//                         setTimeout(function () {}, 2000);

//                     },

//                     error: function error(response) {

//                         swal('Something went wrong!');

//                     }

//                 });

//             });

//         });

//     }

// });

</script>



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

