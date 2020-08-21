@extends('app.user.layouts.default')
{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop
@section('styles')
@parent
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<!-- <link href="{{asset('assets/globals/reg/parsley.css')}}" rel="stylesheet"/> -->
 <script type="text/javascript">
        function codeAddress() {
            $('.sidebar-main-toggle').trigger('click');
            $("#radio_address2").show();
            $("#radio_address1").hide();
            $('#fname2').attr('required', true);
            $('#state1').attr('required', true);
            $('#city2').attr('required', true);
            $('#contact2').attr('required', true);
            $('#address2').attr('required', true);
            $('#pincode2').attr('required', true);
        }
        window.onload = codeAddress;
</script> 
<style type="text/css">
.product-thumb .image {
   text-align: center;
   margin-top: 10px;
   margin-bottom: 10px;
   margin-bottom: 10px;
   height: 90px;
}
.product-thumb {
   border: 2px solid #ddd;
   margin-bottom: 10px;
} 
.price {
    background: none repeat scroll 0 0 #231f20;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    padding-bottom: 20px;
    padding-top: 20px;
    }
    .content_s{
      border-style:double; 
    }
   .pay {
    margin-top: 150px
  }

  
</style>
<link rel="stylesheet" href="{{asset('assets/globals/css/autosuggest.css')}}" type="text/css" media="screen" charset="utf-8" />
<link href="{{asset('assets/globals/reg/bwizard.min.css')}}" rel="stylesheet" />
<!-- <link href="{{asset('assets/globals/reg/parsley.css')}}" rel="stylesheet" /> -->
<style type="text/css">
 #err{
    display:none;
    background:#f2dede;
    border-radius: 5px;
    height: 50px;
    padding-top: 10px;
    color: #a94442;
}

label > span { color:red;}
/*  bhoechie tab */
div.bhoechie-tab-container{
  z-index: 10;  background-color: #ffffff;  padding: 0 !important;  border-radius: 4px;  -moz-border-radius: 4px;  border:1px solid #ddd;  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);  box-shadow: 0 6px 12px rgba(0,0,0,.175);  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);  background-clip: padding-box;  opacity: 0.97;  filter: alpha(opacity=97);}
div.bhoechie-tab-menu{  padding-right: 0;  padding-left: 0;  padding-bottom: 0;}
div.bhoechie-tab-menu div.list-group{  margin-bottom: 0;}
div.bhoechie-tab-menu div.list-group>a{  margin-bottom: 0;}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {  color: #00acac;}
div.bhoechie-tab-menu div.list-group>a:first-child{  border-top-right-radius: 0;  -moz-border-top-right-radius: 0;}
div.bhoechie-tab-menu div.list-group>a:last-child{  border-bottom-right-radius: 0;  -moz-border-bottom-right-radius: 0;}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{  background-color: #00acac;  background-image: #00acac;  color: #ffffff;}
div.bhoechie-tab-menu div.list-group>a.active:after{  content: '';  position: absolute;  left: 100%;  top: 50%;  margin-top: -13px;  border-left: 0;  border-bottom: 13px solid transparent;  border-top: 13px solid transparent;  border-left: 10px solid #00acac;}
div.bhoechie-tab-content{  background-color: #ffffff;  /* border: 1px solid #eeeeee; */  padding-left: 20px;  padding-top: 10px;}
div.bhoechie-tab div.bhoechie-tab-content:not(.active){  display: none;}
.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {    z-index: 2;    color: #fff;    background-color: #00acac;    border-color: #00acac;}
</style>
@endsection
{{-- Content --}}
@section('main')
@include('flash::message')
@include('utils.errors.list')
<div class="row">
    <div class="col-md-8 offset-md-2 ui-sortable">
    <div class="card">
    <div class="card-header">{{trans('all.order_summary')}}</div>
 
    <div class="card-body">
        
    </div>
 
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{trans('all.product')}}</th>
                <th>{{trans('all.quantity')}}</th>
                <th>{{trans('all.price')}}</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $datas)
            <tr>
                <td>{{$datas->name}}</td>
                <td>{{$datas->cart_quantity}}</td>
                <!-- <td>{{$datas->cart_quantity * $datas->dp_price}}</td> -->
                <td>{{$datas->dp_price}}</td>
            </tr>
         @endforeach
        </tbody>
          <tfoot align = "left" class="headerfooter">
          <th></th><th>{{trans('report.total')}} (NPR) </th> <th>{{ round($price,4)}}</th>
          <!-- <th></th><th>{{trans('report.total')}} </th> <th>{{$datas->cart_quantity * $datas->dp_price}}</th> -->
         </tfoot>
    </table>
 
   
</div>
</div>
</div>

 <div class="row">
  <!-- begin col-12 -->
  <div class="col-md-12 ui-sortable">
    <!-- begin panel -->
    <div class="card card-white">


      <div class="card-body">

   
     
              <form class="form-vertical steps-validation" action="{{url('user/shippingcreation')}}" method="POST"  name="form-wizard" id="regform">

              <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="payable_vouchers[]" value="">
          <input type="hidden" name="payment" id="payment" value="cheque">
        {!! csrf_field() !!}

            <h6>{{trans('all.shipping_address')}} </h6>
            <fieldset>

    
        
               


<div id="myRadioGroup">


<label for="chkPassport">
    <input type="checkbox" id="chkPassport" name="chkPassport"/>
   {{trans('all.default_address')}}
</label>



<div id="radio_address1" class="desc">

  <br/>

          <div class="row">

          <!-- begin col-6 -->
          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.full_name')}}<span>*</span></label>
          <input type="text" name="fname1" class="form-control" value="{{$full_name}}" data-parsley-group="block-0" >
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">

          <label>{{trans('all.country')}} <span>*</span> </label>
          <input type="text" name="country1" class="form-control" value="{{$country}}"  readonly="true" data-parsley-group="block-0">
          </div>
          </div>
          </div>

          <div class="row">


          <div class="col-md-6 hidden">
          <div class="form-group">
          <label>{{trans('all.email_address')}}<span>*</span> </label>
          <input type="text" name="email1" class="form-control" placeholder="{{$def_email}}" value="{{$def_email}}"  data-parsley-group="block-0">
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.state')}} <span>*</span> </label>

          <input type="text" name="state1" class="form-control" value="{{$state}}"  readonly="true" data-parsley-group="block-0">
    

          </div>
          </div>
            
             <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.pincode')}}<span>*</span> </label>
          <input type="text" name="pincode1" class="form-control" value="{{$zip}}"  readonly="true" data-parsley-group="block-0">
          </div>
          </div>
          
          </div>

          <div class="row">
          <!-- begin col-6 -->
          

          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.contact_number')}}<span>*</span> </label>
          <input type="text" name="contact1" class="form-control" placeholder="{{$def_mob}}" value="{{$def_mob}}" data-parsley-group="block-0" >
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.city')}}<span>*</span> </label>
          <input type="text" name="city1" class="form-control" value="{{$street}}"  readonly="true" data-parsley-group="block-0">
          </div>
          </div>

          </div>
         
          <div class="row">
          <!-- begin col-6 -->


          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.address')}}<span>*</span> </label>
          <input type="text" name="address1" class="form-control" value="{{$address1}} {{$address2}}" readonly="true" data-parsley-group="block-0" >
          </div>
          </div>

         
          </div>





</div>
<div id="radio_address2" class="desc" style="display: none;">

          <div class="row">

          <!-- begin col-6 -->
          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.full_name')}}<span>*</span></label>
          <input type="text" name="fname2" id="fname2" class="form-control" placeholder="{{trans('all.enter_first_name')}}" data-parsley-group="block-0" >
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.country')}} <span>*</span> </label>
          <select name="country2" id="country" class="form-control"  data-parsley-group="block-0">
                                                          @foreach($countries as $countries)
                                                              @if($countries->country_id == 129)
                                                                  <option value="{{$countries->country_id}}" selected="true">{{$countries->name}}</option>
                                                              @else
                                                                  <option value="{{$countries->country_id}}">{{$countries->name}}</option>
                                                              @endif
                                                          @endforeach
                                                        </select>
          </div>
          </div>
          </div>

          <div class="row">
          <!-- begin col-6 -->
          <div class="col-md-6 hidden">
          <div class="form-group">
          <label>{{trans('all.last_name')}}<span>*</span> </label>
          <input type="text" name="lname2" class="form-control" placeholder="{{trans('all.enter_last_name')}}" value=" " data-parsley-group="block-0" >
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.state')}} <span>*</span> </label>

          <select name="state2" id="state2" id="state1" class="form-control"  data-parsley-group="block-0">
                                                          @foreach($statess as $states)
                                                          <option value="{{$states->zone_id}}">{{$states->name}}</option>
                                                          @endforeach
                                                        </select>

          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.city')}}<span>*</span> </label>
          <input type="text" name="city2" id="city2" class="form-control" value="" data-parsley-group="block-0"  >
          </div>
          </div>
          </div>

          <div class="row">
          <!-- begin col-6 -->
          <div class="col-md-6 hidden">
          <div class="form-group">
          <label>{{trans('all.address')}}<span>*</span> </label>
          <input type="text" name="email2" class="form-control" placeholder="{{trans('all.email_address')}}" value="{{$def_email}}" data-parsley-group="block-0">
          </div>
          </div>

          
          </div>

          <div class="row">
          <!-- begin col-6 -->
          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.contact_number')}}<span>*</span> </label>
          <input type="text" name="contact2" id="contact2" class="form-control" placeholder="{{trans('all.enter_contact_number')}}" value=""  data-parsley-group="block-0">
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.address')}}<span>*</span> </label>
          <input type="text" name="address2" id="address2" class="form-control" value="" data-parsley-group="block-0" >
          </div>
          </div>
          </div>

          <div class="row">
          <div class="col-md-6">
          <div class="form-group">
          <label>{{trans('all.pincode')}}<span>*</span> </label>
          <input type="text" name="pincode2" id="pincode2" class="form-control" value="" data-parsley-group="block-0"/>
          </div>
          </div>
          </div>
          
</div>
</div>
</fieldset>
            <h6>{{trans('all.payment_method')}}</h6>
            <fieldset style="text-align: center;"> 
              <input type="hidden" name="total_amount" id="total_amount" value="{{$price}}" >
            <input  type= "hidden" name="quantity" id="quantity" value="{{$quantity}}">
            <input type="hidden" name="shippingcost" id="shippingcost">
               <input type="hidden" name="amount" value="{{$price}}"> 
            <input type="hidden" name="payment_method" value="card">
             <input type="hidden" name="country" value="US" />
            <input type="hidden" name="currency" value="USD">
            <input type="hidden" name="email" value="{{Auth::user()->email}}" />
            <input type="hidden" name="firstname" value="{{Auth::user()->name}}" />
              <input type="hidden" name="lastname" value="{{Auth::user()->lastname}}" />
              <input type="hidden" name="phonenumber" value="090929992892" />
               <input type="hidden" name="joiningfee" id="joiningfee" amount="{{$price}}">
                 
                <div class="m-b-0 text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
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
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <div class="tab-content" >
                                    @foreach($payment_type as $ke => $pay) @if($pay->payment_name=="Cheque")
                                    <div class="tab-pane active" id="tab{{$ke}}" role="tabpanel">

                                       <div class="pay">
                                         @if($payment_gateway->bank_details == "")
                                          <h4> {{trans("register.please_save_merchants_bank_details_in_payment_gateway_manager")}}</h4>
                                          @else
                                        <h3> <p class="text-success">
                                                {{trans("all.total_price")}}: NPR  {{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                  </div>
                                    @elseif($pay->payment_name=="Ewallet")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                          <div class="pay">

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
                                                            {{trans('register.transaction_password')}}  : <span class="symbol "></span>
                                                    </label>
                                                    <div class="col-sm-4">
                                                            <input type="text" id="ewallet_password" name="ewallet_password" class="form-control">
                                                    </div>
                                                </div>
                                                  <h3> <p class="text-success">
                                                {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                     
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button" id="ewalletbutton">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
                                      </div>
                                    </div>
                                    </div>

                                     @elseif($pay->payment_name=="Bitaps")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                          <div class="pay">
                                            @if($payment_gateway->btc_address == "")
                                          <h4>{{trans("register.please_save_merchants_bitaps_address_in_payment_gateway_manager")}}</h4>
                                          @else
                                        <h3> <p class="text-success">
                                            {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                    </div>
                                    @elseif($pay->payment_name=="Paypal")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                    <div class="pay">
                                      @if($payment_gateway->paypal_username == "" && $payment_gateway->paypal_password == "")
                                          <h4>{{trans("register.please_save_merchants_paypal_details_in_payment_gateway_manager")}}</h4>
                                          @else
                                        <h3> <p class="text-success">
                                      {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                    </div>
                                     @elseif($pay->payment_name == "Stripe") 

                                      <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                         <div class="pay">
                                           @if($payment_gateway->stripe_secret_key == "" && $payment_gateway->stripe_public_key == "")
                                         <h4>{{trans("register.please_save_merchants_stripe_details_in_payment_gateway_manager")}}</h4>
                                          @else
                                         <h3> <p class="text-success">
                                                {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          
                                            
                                            <p>
                                                  <input 
                                                    type="button"
                                                    id="stripe_btn"
                                                    class="btn btn-primary"
                                                    value="Pay with Card"
                                                    data-key="{{$payment_gateway->stripe_public_key}}"
                                                    data-amount="{{$price*100}}"
                                                    data-currency="usd"
                                                    data-bitcoin="false"
                                                    data-name="demo"
                                                    
                                                    data-description="{{trans('register.stripe_payment')}}"
                                                    data-locale="auto"
                                                />
                        
                                              
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                  </div>
                                                                    
                                          
                                    @elseif($pay->payment_name=="Rave")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                           <div class="pay">
                                             @if($payment_gateway->rave_public_key == "" && $payment_gateway->rave_secret_key == "")
                                          <h4>{{trans("register.please_save_merchants_rave_details_in_payment_gateway_manager")}}</h4>
                                          @else
                                        <h3> <p class="text-success">
                                                {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                    </div>   

                                    @elseif($pay->payment_name=="Authorize")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                      <div class="pay">

                                             <div class="text-center">
                                                @if($payment_gateway->auth_transaction_key == "" && $payment_gateway->auth_merchant_name == "")
                                                  <h4>{{trans("register.please_save_merchants_authorize.net_details_in_payment_gateway_manager")}}</h4>
                                                  @else                                      
                                                    <span name="fee" id="joiningfee"></span>
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

                                                     <h3> <p class="text-success">
                                                {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                              
                                                <p>
                                                     <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                                </p>
                                                @endif
                                           
                                    </div> 
                                  </div>
                                    </div>        

                                     @elseif($pay->payment_name=="Ipaygh")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                         <div class="pay">
                                        @if($payment_gateway->ipaygh_merchant_key == "")
                                              <h4>{{trans("register.please_save_merchants_ipaygh_details_in_payment_gateway_manager")}}</h4>
                                              @else
                                        <h3> <p class="text-success">
                                                {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                    </div>   

                                    @elseif($pay->payment_name=="Skrill")
                                    <div class="tab-pane" id="tab{{$ke}}" role="tabpanel">
                                     <div class="pay">
                                       @if($payment_gateway->skrill_mer_email == "")
                                          <h4>{{trans("register.please_save_merchants_skrill_details_in_payment_gateway_manager")}}</h4>
                                          @else
                                        <h3> <p class="text-success">
                                                 {{trans("all.total_price")}}:${{$price}}
                                           
                                            </p></h3>
                                        <div class="text-center">
                                          <p>
                                           
                                                <button class="btn btn-success btn-lg" role="button">{{$pay->payment_name}} {{trans('register.payment_confirmation')}}</button>
                                            </p>
                                        </div>
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
                </div>
            </fieldset>
             </form>
           </div>
         </div>
       </div>
     </div>

             

     

@endsection

@section('scripts') @parent

<!-- Start JS Validation -->
<!-- <script src="{{asset('assets/globals/reg/parsley.js')}}" type="text/javascript"></script> -->
<script src="{{asset('assets/globals/reg/bwizard.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/globals/reg/form-wizards-validation.demo.min.js')}}" type="text/javascript"></script>
<!-- End JS Validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>

    $(document).ready(function() {

        App.init(); 
    });

</script>
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
<!-- <script src="{{asset('assets/globals/reg/parsley.js')}}" type="text/javascript"></script> -->
<script src="{{asset('assets/globals/reg/bwizard.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/globals/reg/form-wizards-validation.demo.min.js')}}" type="text/javascript"></script>
<!-- <script src="{{asset('assets/globals/plugins/slick/slick.js')}}" type="text/javascript"></script> -->
<script type="text/javascript" src="{{asset('assets/globals/js/autosuggest.js')}}" charset="utf-8"></script>
<script src="{{ asset('assets/globals/reg/apps.min.js')}}" type="text/javascript"></script>
<script src="https://js.braintreegateway.com/web/3.11.0/js/client.min.js"></script>
  <script src="https://js.braintreegateway.com/web/3.11.0/js/hosted-fields.min.js"></script>
  <script src="https://js.braintreegateway.com/web/3.11.0/js/paypal-checkout.min.js"></script>
  <script src="https://www.paypalobjects.com/api/checkout.js" data-version-4></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#conf").hide();
    var voucherbalance = 0;
    var voucher = [];
    var joiningfe ={{$price}};
    $("table#resulttable").hide();
    $('body').on('click','#verify',function(e){
         $("#err").hide();
        e.preventDefault();
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
       if(jQuery.inArray($('#key').val(), voucher) == -1){
            $.ajax({
            url: '/register/data',
            type: "post",
            async: false,
            dataType: "json",
            data:{key:$('#key').val()},
            success: function(data,textStatus, jqXHR) {
                    if(data[0]==undefined){
                         $("#err").show();
                         document.getElementById("err").innerHTML = "<strong> {{trans('all.error') }}!</strong> {{trans('all.invalid_voucher_code') }}";
                    }
                    voucher.push(data[0].voucher_code);
                    if(voucherbalance<joiningfe)
                        {
                             voucherbalance += parseInt(data[0].total_amount);
                        $("table#resulttable").show();
                        drawTable(data);
                   payable_vouchers.push(data[0]);
                        }
                        else{
                              $("#err").show();

                             document.getElementById("err").innerHTML = "<strong> {{trans('all.error') }}!</strong> {{trans('all.reached_max_joining_fee') }} ";
                          $("#conf").show();
                            voucherbalance -= parseInt(data[0].total_amount);
                      }
                    }
            });
         }
        else{
              $("#err").show();
             document.getElementById("err").innerHTML = "<strong> {{trans('all.error') }}!</strong> {{trans('all.voucher_code_already_used') }}  ";
            }
    });
});


function drawTable(data) {

    for (var i = 0; i < data.length; i++) {

        drawRow(data[i]);
    }
}

function drawRow(rowData) {

    var row = $("<tr />");

    $("#resulttable").append(row);

    row.append($("<td><input type='hidden' name='payable_vouchers[]' value='" + rowData.voucher_code + "'>" + rowData.voucher_code + "</td>"));

    row.append($("<td>" + rowData.total_amount + "</td>"));

    row.append($("<td>" + rowData.balance_amount + "</td>"));
}


</script>
<script type="text/javascript">

  $(document).ready(function() {
       $("#myTab li").click(function(e) {
          $('#payment').val($(this).attr('payment'));
   });
  });
</script>


<script type="text/javascript">
$('#state').change(function(){

  var selected = $(this).find('option:selected');
  var extra = selected.data('foo');
  var quantity = document.getElementById("quantity").value;
   extra = extra * quantity;
   // alert(extra);
  $('#shipping_fee').html(extra);
 
  $('#shippingcost').val(extra);
});
$('#country').change(function(){

  var selected = $(this).find('option:selected');
  var country = selected.data('coo');


  
    

});

</script>

<script>

      $(document).ready(function() {
          App.init();
          FormWizardValidation.init();
          var options = {
                script:"{{url('admin/suggestlist')}}?json=true&limit=10&",
                varname:"input",
                json:true,
                shownoresults:true,
                maxresults:10,
                callback: function (obj) { document.getElementById('testid').value = obj.id; }
          };
          var as_json = new bsn.AutoSuggest('sponsor', options);

        });
        $(document).ready(function() {
        
        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        $('#payment').val($(this).attr('payment'));
    });
});
</script>
<script type="text/javascript">
    window.paypalCheckoutReady = function () {
        paypal.checkout.setup('supersandy_api1.gmail.com', {
             container: 'myContainer',
             environment: 'sandbox'
        });
    };
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("input[name$='radio_address']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#radio_address" + test).show();
    });
});
</script>

<script type="text/javascript">
    $('select[name=country]').change(function() {
    var country_country_id = $(this).val();

    if(country_country_id){
        $.ajax({
            type:"GET",
            url:"{{url('user/get-state-list')}}?id="+country_country_id,
            success:function(res){               
                if(res){
                    $("#state").empty();
                    $("#state").append('<option>Select</option>');
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
<script type="text/javascript">
   $('select[name=country2]').change(function() {
   var country_country_id = $(this).val();

   if(country_country_id){
       $.ajax({
           type:"GET",
           url:"{{url('user/get-state-list')}}?id="+country_country_id,
           success:function(res){               
               if(res){
                   $("#state2").empty();
                   $("#state2").append('<option>Select</option>');
                   $.each(res,function(key,value){
                       $("#state2").append('<option value="'+key+'">'+value+'</option>');
                   });

               }else{
                   $("#state2").empty();
               }
           }
       });
   }else{
       $("#state").empty();
   }
  });

</script>


<script type="text/javascript">
 $('select[name=country2]').change(function() {
 var country_country_id = $(this).val();

 if(country_country_id){
     $.ajax({
         type:"GET",
         url:"{{url('api/get-shipping-state-list')}}?id="+country_country_id,
         success:function(res){               
             if(res){
                 $("#state2").empty();
                 $("#state2").append('<option>Select</option>');
                 $.each(res,function(key,value){
                     $("#state2").append('<option value="'+key+'">'+value+'</option>');
                 });

             }else{
                 $("#state2").empty();
             }
         }
     });
 }else{
     $("#state2").empty();
 }
});

</script>
<script type="text/javascript">
  $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#radio_address1").show();
                $("#radio_address2").hide();
                $('#fname2').removeAttr('required');
                $('#state1').removeAttr('required');
                $('#city2').removeAttr('required');
                $('#contact2').removeAttr('required');
                $('#address2').removeAttr('required');
                $('#pincode2').removeAttr('required');
            } else {
                $("#radio_address1").hide();
                $("#radio_address2").show();
                $('#fname2').attr('required', true);
                $('#state1').attr('required', true);
                $('#city2').attr('required', true);
                $('#contact2').attr('required', true);
                $('#address2').attr('required', true);
                $('#pincode2').attr('required', true);

            }
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
            
          $("#myTab li").click(function(e) {
          $('#payment').val($(this).attr('payment'));
          });
        });
</script> 

<script type="text/javascript">
    
$('#ewalletbutton').click(function(event) {

    event.preventDefault();
    
    var username = $("#ewalletusername").val();
    var password = $("#ewallet_password").val();

    var amount = {{ $price }};
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

</script>
@endsection





