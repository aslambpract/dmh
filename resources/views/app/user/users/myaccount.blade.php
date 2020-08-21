@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} 

@section('main')
<!-- Basic datatable -->
 
<div class="card card-flat timeline-content">
                    <div class="card-header header-elements-inline">
                        <h4 class="card-title">My accounts</h4>
                    </div>
    

    	 

 <div class="card card-flat timeline-content">
          

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-invoice" id = "ewalletreport">
                <thead  >
                    <tr>
                        <th>{{trans('report.no')}}</th>
                        <th>{{trans('report.username')}}</th>
                        <th>Account name</th>
                        <th>Account type</th>
                        <th>{{trans('report.created')}}</th>                        
                        <th>View</th>                        
                    </tr>
                </thead>
                <tbody>

                  @foreach($users as $key => $item)
                    <tr>
                      <td>{{$key +1 }}</td>
                      <td>{{$item->username}}</td>
                      <td> {{$item->username}} -@if($item->account_type=="positions") POS  @endif {{ $item->account_no}} </td>
                      <td> {{$item->account_type}} </td>
                      <td> {{$item->created_at}} </td>
                        <td><div class="list-icons">

                                    <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>

                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform;top: 0px;left:0px;transform: translate3d(-164px, 16px, 0px);">

                                    <a target="blank" href="{{{ URL::to('user/genealogy/1/' . Crypt::encrypt($item->id) ) }}}"  class="dropdown-item " >Phase 1</a>
                                    <div class="dropdown-divider"></div>

                                    <a  target="blank"  href="{{{ URL::to('user/genealogy/2/' . Crypt::encrypt($item->id)) }}}"  class="dropdown-item " >Phase 2  </a>
                                        <div class="dropdown-divider"></div>

                                    <a  target="blank"  href="{{{ URL::to('user/genealogy/3/' . Crypt::encrypt($item->id)) }}}"  class="dropdown-item " >Phase 3  </a>
                                        <div class="dropdown-divider"></div>
                                    <a  target="blank"  href="{{{ URL::to('user/genealogy/4/' . Crypt::encrypt($item->id)) }}}"  class="dropdown-item " >Phase 4  </a>
                                        <div class="dropdown-divider"></div>
                                    <a  target="blank"  href="{{{ URL::to('user/genealogy/5/' . Crypt::encrypt($item->id)) }}}"  class="dropdown-item " >Phase 5  </a>

                        </div>

                      </div>

                    </div></td>
                    </tr>
                  @endforeach
    
                </tbody>
                 
            </table>
        </div>
      </div>

</div> 

                        
  </div>


                  
@stop
@section('scripts') @parent
 <script>
    $(document).ready(function() {  
      $('#ewalletreport').DataTable( { ordering :false } );
    });
 </script>
@endsection
 
 