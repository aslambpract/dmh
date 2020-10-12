@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Approve Payments</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table " id="table" >
            <thead>
                <tr>
                    <th>
                         {{ trans("users.no") }}
                    </th>
                    
                    <th>
                        {{ trans("users.order_id") }}
                    </th>

                    <th>
                        {{ trans("users.username") }}
                    </th>
                                    
                    <th>Email </th>
                    <!-- 
                    <th>
                        {{ trans("users.payment_address") }}
                    </th> -->
                                    
                   
                                    
                    <th>
                        {{ trans("admin.amount") }}
                    </th>


                    <th>
                        {{ trans("admin.created_at") }}
                    </th>
              <!--       <th> CHECK </th>
                    <th> Change Email </th>
                    <th> Change Username  </th> -->
                    <th> Approve </th>
                    <th> Delete </th>
                                    
                                  
                </tr>
            </thead>
             <tbody>

                @foreach($payment_data as $key=> $request)

                <tr>

                    <td>{{$key +1 }}</td>

                    <td>{{$request->order_id}}</td>
                    <td>{{$request->username}}</td>
                    <td>{{$request->email}}</td>
                    <!-- <td>{{$request->payment_address}}</td> -->
                     <td>{{$request->amount}}</td>

                    

                    <td>{{$request->created_at}}</td>
          <!--           <td>
 
                        <a target="blank" href="https://bitaps.com/{{$request->payment_address}}" class="btn btn-warning" > Check  </a></td>
                       
                    <td>
                         @if($request->payment_type != 'account' )
                        <a target="blank" href="{{{ URL::to('admin/change_email/' . $request->id ) }}}" class="btn btn-info" > Change Email  </a>
                         @else
                            Not available 
                         @endif
                    </td>
                    <td>
                     @if($request->payment_type != 'account')

                        <a target="blank" href="{{{ URL::to('admin/change_username/' . $request->id ) }}}" class="btn btn-info" > Change username  </a>
                         @else
                            Not available 
                        @endif
                    </td> -->
                    <td>
                        <a class="btn btn-info" href="{{{ URL::to('admin/approve/' . $request->id ) }}}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                                          {{trans("users.approve")}}</a>
                    </td>
                     

                   <td><a class="btn btn-danger" data-id="" href="{{{ URL::to('admin/delete_approve1/' . $request->id) }}}">  {{trans("users.delete")}}  </a>
                   </td>

                      

                        </div>

                      </div>

                    </div>
                    </td>

                  

                    

                   <!--  <td>

                        <a class="btn btn-danger" href="{{url('admin/delete_file/'.$request->id)}}" name="requestid">

                            {{trans('ticket_config.delete')}}

                        </a>

                    </td>       -->              

                </tr>

                @endforeach

            </tbody>

      
        </table>
    </div>
</div>
                  
@stop

{{-- Scripts --}}
@section('scripts')
@parent

   
    <script>

          $(document).ready(function() {
        $('#table').DataTable( {
              "ordering": false
         } );
      } );
 

</script>
         




@stop

            