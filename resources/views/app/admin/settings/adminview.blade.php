
@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
@include('flash::message')
<!-- Basic datatable -->
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Sub Admin</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <table class="table datatable-basic table-striped table-hover" id="admin-table">
             <thead>
            <tr>
              <th>{{trans('report.username')}}</th>
            <th>{{trans('report.email')}}</th>                        
                        <th>Created At</th>
                        <th>Assign Role</th>
                        <th>Action</th>
                      
                    </tr>
                </thead>
                <tbody> 
                @foreach($userss as $key=> $report)
                           
                                <tr>
                              
                                    <td>{{$report->username}}</td>
                                    <td>{{$report->email}}</td>
                                    <td>{{$report->created_at}}</td>                                   
                                     
                                    <td><a target="blank" href="{{{ URL::to('admin/assign-role/'.$report->id) }}}" class="btn btn-info" > Assign Role  </a>
                                    </td>
                                    <td><a href="{{url('admin/deleteadmin/'.$report->id) }}" class="btn btn-danger btn-sm">Delete</a></td>

                                    
                                  
                                   
                                </tr>
                           @endforeach   
                         
                            </tbody>
                        </table>
                    </div>
                  
@stop

{{-- Scripts --}}
@section('scripts')
    @parent

@stop