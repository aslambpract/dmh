@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('styles') @parent @endsection

{{-- Content --}}
@section('main')
 


<div class="card card-flat border-top-success">
    <div class="card-header header-elements-inline">
        <h4 class="card-title">{{ trans('payout.payout') }}  </h4> 
                        </div>
                        <div class="card-body"> 



   <div class="table-responsive">
    <table id="data-table" class="table table-striped ">
                                    @if($count_requests > 0)
                                    <thead>
                                        <tr role="row">
                                            <th>{{ trans('payout.username') }} </th>
                                            <th >{{ trans('payout.user_balance') }}</th>
                                            <th>{{trans('payout.payment_mode')}}</th>
                                            <!-- <th style="background-color: #008A8A;">{{trans('ticket_config.request_date')}}</th> -->
                                            <!-- <th style="background-color: #008A8A;">{{trans('ticket_config.status')}}</th> -->
                                            <th >{{ trans('payout.approve') }}</th> 
                                          
                                        </tr>
                                    </thead>
                                    <tbody>    
                                    @foreach($vocherrquest as $request)
                                        <tr class="gradeC " role="row">
                                            <td class="sorting_1">{{$request->username}}</td>

                                            <td>{{($request->balance)}}</td>
                                            <td>{{$request->payment_mode}}</td>
                                            <!-- <td>{{$request->created_at}}</td> -->

                                            <td>
                                                <form action="{{URL::to('admin/payoutconfirm')}}" method="post" onsubmit="return checkForm(this);">
                                                    <!-- <input type="hidden" value="{{csrf_token() }}" name="_token">
                                                    
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control"value="{{$request->count}}" name="count">                                     
                                                    </div> -->
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="hidden" value="{{$request->id}}" name="requestid">
                                                        <input type="hidden" value="{{$request->user_id}}" name="user_id">
                                                        <input type="hidden" value="{{$request->payment_mode}}"name="payment_mode">
                                                        <div class="row">
                                                        <div class="col-sm-3">
                                                             <input type="text" class="form-control" value="{{round($request->amount,2)}}" name="amount" readonly="true">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button type="submit" class="btn btn-success" value="{{round($request->amount,2)}}" name="submit" title="{{trans('payout.approve')}}"><i class="fa fa-check" aria-hidden="true"></i>{{trans('payout.approve')}}</button>
                                                            
                                                        </div>
                                                             <div class="col-sm-3">
                                                            <a type="submit" class="btn btn-danger" href="{{URL::to('admin/payoutrejectnew/'.$request->payout_id.'/'.$request->amount)}}" name="reject" title="reject"><i class="fa fa-trash" ></i> {{trans('payout.reject')}}</a>
                                                                     
                                                        </div> 

                                                        

                                                    </div>
                                                   
                                                    
                                                </form>
                                            </td>                                                                                    
                                        </tr>
                                    @endforeach  

       

                                    </tbody>
                                    @else
                                      {{ trans('ticket_config.no_payout_request_so_far') }} !!
                                    @endif
                                </table>
                            </div>


                             <div class="text-center">   {!! $vocherrquest->render() !!} </div>


                       
                </div>
            </div>
  
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript"> 
     
             App.init();
             TableManageDefault.init();
       

       function checkForm(form)
 {
  
   form.add_amount.disabled = true;
   return true;
 }

    </script>
    
@stop
