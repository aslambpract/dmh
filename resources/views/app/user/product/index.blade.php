@extends('app.user.layouts.default')

{{-- Web site Title --}}

@section('title') {{{ $title }}} :: @parent @stop



@section('main')

 @include('utils.errors.list')



<div class="card card-flat border-top-success">



        

@if(count($products) > 0)

    <form class="wizard-form steps-planpurchase" action="{{url('user/purchase-plan')}}" method="post"  data-parsley-validate="true" id="regform">

        {!! csrf_field() !!}

          <input type="hidden" name="amount" value="1"> 

          <input type="hidden" name="payment_method" value="card">

          <input type="hidden" name="country" value="US" />

          <input type="hidden" name="currency" value="USD">

          <input type="hidden" name="email" value="{{Auth::user()->email}}" />

          <input type="hidden" name="firstname" value="{{Auth::user()->name}}" />

          <input type="hidden" name="lastname" value="{{Auth::user()->lastname}}" />

          <input type="hidden" name="phonenumber" value="090929992892" />



            <h6>{{trans('Choose Phase')}} </h6>

            <fieldset>

                

                    <div class="d-flex align-items-start flex-column flex-md-row">   

             

                        @forelse($products as $item)

                        <div class="col-xl-4 col-sm-4" >

                          <label class="form-check-label" style="width:100%;"> 

                            <div class="card card-default text-center border border-secondary bg-light" style="background-image: url({{'/img/cache/original/'.$item->image}});background-size: 100% 100%; opacity: 0.5;" >

                              <div class="card-heading border border-secondary">

                                <div class="ribbon-container {{$item->package}} ">

                                  <div class="ribbon bg-indigo-400">{{trans('products.selected')}}</div>

                                </div>

                                <h1 style="color: black;">{{$item->package}}</h1>

                              </div>

                             <!-- <div class="card-body border border-secondary" > -->

                                <!-- <p style="color: black;font-weight: bold;"><strong >{{$item->sv}}</strong> {{trans('S')}}{{trans('products.v')}}</p>                                      -->

                                <!-- <p style="color: black;"> <strong>{{trans('products.endless')}}</strong> {{trans('products.amet')}}</p> -->

                              <!-- </div> -->

                              <div class="card-footer border border-secondary bg-light" style="background-color: transparent !important;" >

                                <h3 style="color: black;">{{$item->amount}}</h3>

                                <h4 style="color: black;">{{trans('products.one_time_fee')}}</h4>  

                                       

                                <div class="form-check">

                                  <!-- <div class="uniform-choice border-indigo-600 text-indigo-800"><span class="checked"> -->

                                    <input type="radio"  required="required"    name="plan" badge-class="{{$item->package}}" class="form-check-input-styled-custom" data-fouc="" data-parsley-group="block-0" value="{{$item->id}}" plan-amount="{{$item->amount}}">

                                    <!-- <span class="checkmark"></span> -->

                                  <!-- </div> -->

                                </div>

                              </div>

                            </div> 

                          </label>

                        </div>

                        @empty

                      @endforelse

                

                  </div> 

            <br><br>

              </fieldset>

            <h6>{{trans('products.choose_payment')}} </h6>

            <fieldset> 



              <div class="card-body">

                <ul class="nav nav-tabs nav-tabs-highlight nav-justified">

                  <li class="nav-item active"><a href="#steps-planpurchase-tab1" class="nav-link  steps-plan-payment active " data-toggle="tab" data-payment='cheque' >{{trans('products.cheque')}}</a></li>

                  <li class="nav-item"><a href="#steps-planpurchase-tab2" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='ewallet'>{{trans('products.ewallet')}} </a></li>



                   <!--  <li class="nav-item"><a href="#steps-planpurchase-tab3" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='voucher'>{{trans('products.voucher')}}</a></li>

                   @if($payment_gateway->paypal_username != "" && $payment_gateway->paypal_password != "")

                  <li class="nav-item"> <a href="#steps-planpurchase-tab4" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='paypal'>{{trans('products.paypal')}}</a></li>

                  @endif

                  @if($payment_gateway->btc_address != "")

                  <li class="nav-item"> <a href="#steps-planpurchase-tab5" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='bitaps'>Bitaps</a></li>

                  @endif

                  @if($payment_gateway->stripe_secret_key != "" && $payment_gateway->stripe_public_key != "")

                  <li class="nav-item"> <a href="#steps-planpurchase-tab6" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='stripe'>Stripe</a>

                  </li>

                  @endif

                  @if($payment_gateway->skrill_mer_email != "")

                    <li class="nav-item"> <a href="#steps-planpurchase-tab7" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='skrill'>Skrill</a>

                  </li>

                  @endif

                  @if($payment_gateway->ipaygh_merchant_key != "")

                    <li class="nav-item"> <a href="#steps-planpurchase-tab8" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='ipaygh'>Ipaygh</a>

                  </li>

                  @endif

                   @if($payment_gateway->rave_public_key != "" && $payment_gateway->rave_secret_key != "")

                    <li class="nav-item"> <a href="#steps-planpurchase-tab9" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='rave'>Rave</a>

                  </li>

                  @endif -->   

                  <!--/**--->

                  <!--  @if($payment_gateway->auth_transaction_key != "" && $payment_gateway->auth_merchant_name != "") -->

                  <!--   <li class="nav-item"> <a href="#steps-planpurchase-tab10" class="nav-link steps-plan-payment" data-toggle="tab" data-payment='authorize'>Authorize.Net</a>

                  </li> -->

                  <!-- @endif -->

                </ul> 





                <div class="tab-content">

                  <div class="tab-pane active  " id="steps-planpurchase-tab1">

                    <input type="hidden" name="steps_plan_payment" value="cheque" data-parsley-group="block-1">

                      <div class="text-center">

                         <h3> <p class="text-success">

                            Phase Amount: NPR  <span name="cheque" id="cheque" value=""></span>

                        </p></h3>

                     <p>  

                     {{trans('products.send_your_payment_cheque_to_the_company')}}  <code>{{trans('products.order_will_process_after_payment_received')}}  </code>, {{trans('products.thanks')}}.

                   </p>

                   </div>

                  </div>



                  <div class="tab-pane fade" id="steps-planpurchase-tab2">

               <div class="text-center">



                <div class="row">

                       <div class="col-sm-3">

                                              </div>

                      <label class="col-sm-2 control-label" for="username">

                          {{trans('products.username')}}:

                          <span class="symbol ">

                              </span>

                      </label>

                      <div class="col-sm-4">

                          <input class="form-control" id="ewalletusername" name="ewalletusername" type="text" placeholder="{{trans('products.this_field_is_required')}}">

                         

                      </div>

                      </div>

                        <br/>

                        <div class="row">

                           <div class="col-sm-3">

                            </div>

                            <label class="col-sm-2 control-label" for="amount">

                                    Password  : <span class="symbol "></span>

                            </label>

                            <div class="col-sm-4">

                                    <input type="text" id="ewallet_password" name="ewallet_password" placeholder="{{trans('products.this_field_is_required')}}" class="form-control">

                            </div>

                        </div>

                      </div>

                      <br>



                      <div class="text-center">

                         <h3> <p class="text-success">

                            {{trans('Phase Amount')}}: NPR  <span name="ewallet" id="ewallet" value=""></span>

                        </p></h3>

               

                                          <p>

                                           

                                                <button class="btn btn-success btn-lg" role="button" id="ewalletbutton">{{trans('products.ewallet_payment_confirmation')}}</button>

                                            </p>

                                    

                  </div>

                </div>



                  <div class="tab-pane fade" id="steps-planpurchase-tab3">

                    <div class="table-responsive div-vouher-payment">                      

                      <table class="table table-dark bg-slate-600 table-vouher-payment">

                        <thead>

                          <tr>

                            <th>#</th>

                            <th>{{trans('products.voucher_code')}}</th>

                            <th>{{trans('products.amount_used')}}</th>

                            <th>{{trans('products.voucher_balance')}}</th>

                            <th>{{trans('products.remaining')}}</th>

                            <th>{{trans('products.validate_voucher')}} </th>

                          </tr>

                        </thead>

                        <tbody>

                          <tr>

                            <td>1</td>

                            <td><input type="text" name="voucher[]" class="form-control"></td>

                            <td><span class="amount"></span></td>

                            <td><span class="balance"></span></td>                             

                            <td><span class="remaining"></span></td>                             

                            <td class="td-validate-voucher"><button class="btn btn-info validatevoucher" onclick="return false;">{{trans('products.validate')}}</button></td>

                          </tr>

                          </tbody>

                        </table>

                    </div>

                      

                  </div>



                  <div class="tab-pane fade" id="steps-planpurchase-tab4">

                     <div class="text-center">

                         <h3> <p class="text-success">

                            {{trans('products.package_amount')}}: $<span name="paypal" id="paypal" value=""></span>

                        </p></h3>

                    {{trans('products.pay_with ')}} Paypal

                  </div>

                  </div>



                  <div class="tab-pane fade" id="steps-planpurchase-tab5">

                     <div class="text-center">

                         <h3> <p class="text-success">

                            {{trans('products.package_amount')}}: $<span name="bitaps" id="bitaps" value=""></span>

                        </p></h3>

                      {{trans('products.pay_with ')}} Bitaps

                  </div>

                  </div>



                   <div class="tab-pane fade" id="steps-planpurchase-tab6">

                    <div class="text-center">

                      

                    

                   <div class="text-center">

                         <h3> <p class="text-success">

                             {{trans('products.package_amount')}}: $<span name="stripe" id="stripe" value=""></span>

                        </p></h3>

                     {{trans('products.pay_with ')}} Stripe

                  </div>



                   <p>

                    <input 

                      type="button" id="stripe_btn" class="btn btn-primary" value="Pay with Card" data-key="{{$payment_gateway->stripe_public_key}}"

                      data-amount="" data-currency="usd" data-bitcoin="false"

                      data-name="Demo" data-description="{{trans('products.stripe_payment')}}" data-locale="auto"/>

                   </p>

                   </div>

                  </div>



                   <div class="tab-pane fade" id="steps-planpurchase-tab7">

                     <div class="text-center">

                         <h3> <p class="text-success">

                             {{trans('products.package_amount')}}: $<span name="skrill" id="skrill" value=""></span>

                        </p></h3>

                      {{trans('products.pay_with ')}} Skrill

                  </div>

                  </div>



                   <div class="tab-pane fade" id="steps-planpurchase-tab8">

                    <div class="text-center">

                         <h3> <p class="text-success">

                             {{trans('products.package_amount')}}: $<span name="ipaygh" id="ipaygh" value=""></span>

                        </p></h3>

                    {{trans('products.pay_with ')}} Ipaygh

                  </div>

                  </div>

                   <div class="tab-pane fade" id="steps-planpurchase-tab9">

                    <div class="text-center">

                         <h3> <p class="text-success">

                             {{trans('products.package_amount')}}: $<span name="rave" id="rave" value=""></span>

                        </p></h3>

                   {{trans('products.pay_with ')}} Rave

                  </div>

                  </div>

                   <div class="tab-pane fade" id="steps-planpurchase-tab10">

                     <div class="text-center">

                         <h3> <p class="text-success">

                             {{trans('products.package_amount')}}: $<span name="authorize" id="authorize" value=""></span>

                        </p></h3>

                    {{trans('products.pay_with ')}} Authorize.Net

                  </div>

                  </div>



                </div>

              </div>

            </fieldset>

          </form>@else

   <div class="card-body">

          {{trans('products.no_more_packages_available')}}</div>

          @endif

        </div>

    

  </div>

  

</div>



              

@endsection @section('overscripts') @parent



@endsection @section('scripts') @parent



<script type="text/javascript">

$(document).ready(function () {

   $("input[type='radio']").on('change', function () {       

       totalamount = $('input[name="plan"]:checked').attr('plan-amount'); 

      

       $('#ewallet').html(totalamount);

       $('#cheque').html(totalamount);

       $('#bitaps').html(totalamount);

       $('#skrill').html(totalamount);

       $('#ipaygh').html(totalamount);

       $('#paypal').html(totalamount);

       $('#rave').html(totalamount);

       $('#voucher').html(totalamount);

       $('#stripe').html(totalamount);

       $('#authorize').html(totalamount);

       ('#amount').html(totalamount);

       

       // $('#sum').html(sum);

    });

});hec

</script>

<script src="https://ckout.stripe.com/checkout.js"></script>

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

            

          $('.steps-plan-payment').click(function(e){

            $('input[name="steps_plan_payment"]').val($(this).attr('data-payment'));

           });

        });

</script>





<script type="text/javascript">

    

$('#ewalletbutton').click(function(event) {



    event.preventDefault();

    

    var username = $("#ewalletusername").val();

    var password = $("#ewallet_password").val();



    var amount = $('input[name="plan"]:checked').attr('plan-amount'); 

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















