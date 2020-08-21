@extends('app.user.layouts.default')

{{-- Web site Title --}}

@section('title') {{{ $title }}} :: @parent @stop

@section('styles')

@parent

 

 <!-- 



<style type="text/css">



.drop_down_menu{

  padding: 7px;

  font-size: 16px;

}

.card-body .card-img {

    border-radius: .1875rem;

}



.card-img-new {

    width: 151px;

    height: 147px;

    /* margin-left: 48px; */

    margin: 0 auto;

    display: block;



}



.card-img-actions-overlay {



    display: flex;



    align-items: center;



    justify-content: center;

    position: absolute;

    top: 0;

    bottom: 0;

    left: 0;

    right: 0;

    background-color: rgba(0,0,0,.75);

    color: #fff;

    opacity: 0;

    visibility: hidden;

    transition: all ease-in-out .15s;

}



.card-img {

   width:  100%;

    height: 100%;

  

}

.check

{width :40px;

}

/*.input-group{

  margin-top: -60px;

}*/

.card-image {

  width:  150%;

    height: 100%;

}

button:hover {

  opacity: 0.8;

}

.imgcontainer {

  text-align: center;

  margin: 52px 0 10px 0;

  position: relative;

}



.modal {

  display: none; 

  position: fixed; 

  z-index: 1; 

  left: 0;

  top: 0;

  width: 100%; 

  height: 100%; 

  overflow: auto; 



  background-color: rgb(0,0,0);

  background-color: rgba(0,0,0,0.4); 

  padding-top: 60px;

}

.checkout{

  margin-left: 80px;

  background-color: #17a2b8;

}

.modal-content {

  background-color: #fefefe;

  margin: 5% auto 15% auto; 

  border: 1px solid #888;

  width: 50%; 

  

}

.close {

  position: absolute;

  right: 25px;

  top: 0;

  color: #000;

  font-size: 35px;

  font-weight: bold;

}



.close:hover,

.close:focus {

  color: red;

  cursor: pointer;

}

.animate {

  -webkit-animation: animatezoom 0.6s;

  animation: animatezoom 0.6s

}



  .cancelbtn {

     width: 80%;

  }

}

.cancelbtn {

    width: auto;

    padding: 10px 18px;

    background-color: white;

}

.cart{



  padding: 23px 20px;

    background: #f8f9f9;

    color: #0c4e79;

    text-align: center;

    font-size: 123%;

    margin-bottom: 6px;

}

</style> -->

@endsection

{{-- Content --}}

@section('main')

@include('utils.errors.list')



<div class="row">

  

          <div  class="input-group col-md-2 offset-md-8"  class="searched">

            <input   type="text" class="form-control" name="search" id= "search"

            placeholder="{{trans('all.search')}}" value="{{$products_id}}" > <span class="input-group-btn">

            <a href="#" id="searchbutton"><button class="btn btn-primary" ><i class="icon-search4" aria-hidden="true"></i> <span class="glyphicon glyphicon-search"></span></button></a>

            </span>

          </div>





        <div class="input-group col-md-2 " >

         



             <div class="dropdown">

               <i class="icon-cart-add mr-2" data-toggle="dropdown" title="cart">({{$cart_count}})</i>



                 <div class="dropdown-menu">

                  @if($cart_count >0)

                   <table class="table table-hover" id="cart"> 



                     <thead>

                       <tr>

                        <th></th>

                        <th>{{trans('all.name')}}</th>

                        <th>{{trans('all.quantity')}}</th> 

                        <th>{{trans('all.price')}}</th> 

                       

                       </tr>

                     </thead>

                     <tbody>                     @foreach($products as $key => $value)

                     

                      <tr>

                      <th>

            

                          <img src="{{url('products/'.$value->image)}}" alt="product" width="30" height="30" width="30" />





                      </th>

                       <th>{{$value->name}}</th>

    

                       <th>  {{$value->cart_quantity}}

                    

                       </th>

                       <th>

                      <?php echo ($value->price * $value->cart_quantity);

                         $total = 0;



                      $total = $total + ($value->cart_quantity * $value->price );?>

</th>

                       <th>

     

                       <!-- <th><button class="btn btn-primary" > <a href="{{url('user/deletecart/'.$value->id)}}" ><i title="{{trans('all.remove')}}" class="fa fa-times-circle-o" ></i><div class="dropdown-divider"></div></a></button></th></tr> -->
                        <a href="{{url('user/deletecart/'.$value->id)}}" ><i class="icon-close2"></i></a>
                        <!-- <a href="{{url('user/deletecart/'.$value->id)}}" ><i class="fa fa-times-circle-o" aria-hidden="true"></li></a> -->

                      @endforeach

                    </tbody>

                    </table>



                <div class="dropdown-divider"></div>

               <!--   <form class="form-horizontal" action="{{url('user/shippingaddress')}}" method="post">

                     <input type="hidden" name="_token" value="{{csrf_token()}}">  -->

                      <div class="row">

                        <div class= "col-sm-4 offset-md-1">

                        <a href="{{url('user/viewcart')}}" class="addtocart btn btn-info" title="{{trans('all.view_cart')}}"><strong><i class="fa fa-shopping-cart"></i>{{trans('all.view_cart')}}</strong></a>

                      </div>

                      <div class= "col-sm-4 offset-md-2">

                        <a href="{{url('user/shippingaddress')}}" class="addtocart btn btn-info" title="{{trans('all.checkout')}}"><strong><i class="fa fa-plane"></i>{{trans('all.checkout')}}</strong></a>

                      </div>

                      </div>

          



                  </form>

             @else

             <div class="cart">

                    <span  class="hidden-xs hidden-sm hidden-md" ><p>{{trans('all.your_cart_is_empty')}}</p></span>

             </div>

                 @endif



               </div>



              </div>

   

          

          </div>

</div>

<br>

               



    

 <div class="row">



  @if(count($product) != 0)     

        <div class="product-layout col-lg-10 col-md-10 col-sm-10 col-xs-10">

             <div class="row">

                  @foreach($product as $items)    

            



                      <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-6" >



                        <div class="card">



                           <div class="card-body">



                              <div class="card-img-actions">

                    

                                 <img src="{{ url('products/'.$items->image) }}"  class="card-img-new" alt="product"/>

                                 <button type="button" class="card-img-actions-overlay card-img" onclick="document.getElementById('#exampleModal{{$items->id}}').style.display='block'">

                                 <i class="icon-plus3 icon-2x"></i> </button>



                                  <div id="#exampleModal{{$items->id}}" class="modal">

     

                                    <form class="modal-content animate">

                                 

                                     <div class="imgcontainer">

                                       <span onclick="document.getElementById('#exampleModal{{$items->id}}').style.display='none'" class="close" title="Close Modal">&times;</span>



                                          <div class="col-md-5  offset-md-1 " >



                                          <img src="{{ url('products/'.$items->image) }}"  class="card-image" alt="product"/>

                                        </div>

                                      </div>

                                       

                                      </form>

                                   </div>

                     

                      

                                 </div>



                               </div>

             

                                   <div class="card-body bg-light text-center">

                                    <div class="mb-2">

                                     <h5 class="font-weight-semibold mb-0">

                                     {{$items->name}}

                                     </h5>



                                     </div>



                                     <h6 class="mb-0 font-weight-semibold">Mrp Price: NPR  {{$items->mrp_price}}</h6><br>

                                     <h6 class="mb-0 font-weight-semibold">Dp Price: NPR  {{$items->dp_price}}</h6><br>

                                      <h6 class="mb-0 font-weight-semibold">SV:  {{$items->sv}}</h6><br>



                                     <form class="form-horizontal" action="{{url('user/add_to_cart')}}" method="post">

                                       <input type="hidden" name="_token" value="{{csrf_token()}}"> 

                                       <input type="hidden" name="product_id" value="{{$items->id}}">

                    

                                       <button type="submit" value="{{$items->id}}" class="btn btn-info"><i class="icon-cart-add mr-2"></i> <span class="hidden-xs hidden-sm hidden-md">{{trans('all.add_to_cart')}}</span></button><br><br>



                                     </form>



                                    </div>



                                </div>



                            </div>

      



                      @endforeach



               </div>

         </div>

      @else

  <div class="product-layout col-lg-9 col-md-9 col-sm-9 col-xs-9" align="center">

        <span class="hidden-xs hidden-sm hidden-md"><p>{{trans('all.no_products_found_matching_the_search_criteria')}}</p></span>

  </div>

       @endif

         <div class="product-layout col-lg-2 col-md-2 col-sm-2 col-xs-2">



              <div class="card ">      

    

                 <div class="card-body border-0 p-0">

                        <ul class="nav nav-sidebar mb-2">

                        <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">

                        <div class="my nav-link" >{{trans('all.category')}}</div>

                          <ul class="nav nav-group-sub">

                             <li class="nav-item"><a href="{{url('user/onlinestore')}}" class="nav-link">{{trans('all.all')}}</a></li>

                           @foreach($category as $items)

                   

                            <li class="nav-item"><a href="{{url('user/onlinestores/').'/'.$items->id.'/'.$items->category_name}}" class="nav-link">{{$items->category_name}}</a></li>

         

                           @endforeach

                           </ul>

                     

                          </li>

                          </ul>

                  </div>



                </div>

           </div>  

</div>

  

@endsection



@section('scripts') @parent





<script>

$(document).ready(function() {

App.init(); 

});

</script>







<script type="text/javascript">

   

        $("#searchbutton").click(function () {

          

            var selectedValue = $("#search").val();

            

           

            var url = "{{url('user/onlinestore/')}}"+"/"+selectedValue;

             window.open(url,'_self');

         

        });

  

</script>



@endsection