@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Position</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table " id="" >
            <thead>
                <tr>
                    <th>
                         {{ trans("users.no") }}
                    </th>
                    
                    <th>
                        {{ trans("users.username") }}
                    </th>
                                    
                    <th>
                        {{ trans("users.account_type") }}
                    </th>
                    
                    <th>
                        {{ trans("users.account_no") }}
                    </th>

                     <th>
                        {{ trans("users.created_at") }}
                    </th>
                                    
                   
                                    
                    <th>
                        {{ trans("admin.status") }}
                    </th>


                                  
                    <th> Approve </th>
                 
                                    
                                  
                </tr>
            </thead>
             <tbody>

                @foreach($reportdata as $key=> $request)

                <tr>

                    <!-- <td>{{$key +1 }}</td> -->
                    <td>{{$request->id }}</td>

                   
                    <td>{{$request->username}}</td>
                    <td>{{$request->account_type}}</td>
                    <td>{{$request->account_no}}</td>
                    <td>{{$request->approved}}</td>

                    

                    <td>{{$request->created_at}}</td>
                    
                    <td>
                        <a class="btn btn-info" href="{{{ URL::to('admin/approve_position/' . $request->id .'/approved') }}}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                                          {{trans("users.approve")}}</a>




         <a class="btn btn-danger" href="{{{ URL::to('admin/approve_position/' . $request->id .'/deleted') }}}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                                        Delete </a>
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

</script>
         




@stop

            