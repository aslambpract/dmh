@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Reactivation</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table " id="reactivation" >
            <thead>
                <tr>
                    <th>{{ trans("users.no") }}</th>
                    
                    <th>{{ trans("users.username") }}</th>
                                    
                    <th>{{ trans("users.status") }}</th>
                    
                   
                     <th>{{ trans("users.created_at") }} </th>
                                    
                    <th> Approve </th>
                 
                </tr>
            </thead>
             <tbody>

                @foreach($reportdata as $key=> $request)

                <tr>

                    <td>{{$key +1 }}</td>                   
                    <td>{{$request->username}}({{$request->account_no}}) - {{$request->account_type}}</td>
                    <td>{{$request->status}}</td>

                    <td>{{$request->created_at}}</td>
                    
                    <td>
                        <a class="btn btn-info" href="{{url('admin/users/approvereavtivation',$request->id)}}">
                            <i class="fa fa-check" aria-hidden="true"></i>
                                          {{trans("users.approve")}}</a>
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
        $('#reactivation').DataTable();
</script>
         




@stop

            