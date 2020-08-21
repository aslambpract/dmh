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
                                     <thead>
                                        <tr role="row">
                                            <th>Username </th>
                                            <th >Account </th>
                                            <th>Account type</th>
                                            <!-- <th>Address</th> -->
                                            <th>Date</th>
                                            <th>Payment type</th>
                                            <th>amount</th>
                                            <th>status</th>
                                            <th >View</th> 
                                        </tr>
                                    </thead>
                                    <tbody>    
                                    @foreach($vocherrquest as $request)
                                         <tr>
                                             <td>{{$request->username}}</td>
                                             <td>{{$request->username}} @if($request->account_type =='positions') POS @endif - {{$request->account_no}}</td>

                                             <td>{{$request->account_type}}</td>
                                             <!-- <td>{{$request->wallet_address}}</td> -->
                                             <td>{{$request->created_at}}</td>
                                             <td>{{str_replace('_',' ',$request->payment_type)}}</td>
                                             <td>{{$request->amount}}</td>
                                             <td>{{$request->status}}</td>
                                             <td>
                                                @if($request->status == 'complete')


                                                    @php
                                                        $transaction =json_decode($request->payment_responce)
                                                    @endphp
                                                <a href="https://bitaps/{{ $transaction->tx_list[0]->tx_hash}}" class="btn btn-info">view</a></td>
                                                @endif
                                         </tr>
                                    @endforeach  

       

                                    </tbody>
                                    
                                </table>
                            </div>




                       
                </div>
            </div>
  
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript"> 
     
            $('#data-table').DataTable({  "ordering": false});

    </script>
    
@stop
