@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent

@endsection @section('main')
<div class="card card-flat border-top-success">
     <div class="card-header bg-white header-elements-xl-inline">
        <div class=""><h5>{{trans("users.user_account")}}</h5></div>
            <div class="header-elements text-center">
                <a data-action="collapse">
                </a>
            </div>
    </div>
    <div class="card card-flat">
       <div class="card-body">
       
            <table class="table datatable-basic table-striped table-hover" id="useraccounts-table" >

                            <thead>
                                <tr>
                                     <th>Username</th>
                                    <th>Account no</th>
                                    <th>Account type</th>
                                    <th>Created date</th>
                                    <th>Actions</th>
                                    <th>Change to account</th>

                                </tr>

                            </thead>

                              

                             </tbody>

                         </table>
    </div>
    
</div>
</div>

 @if($request->has('key_user_hidden'))
         @include('app.admin.users.userinfo')
 @endif

 @stop

{{-- Scripts --}}
@section('scripts')
    @parent
<script type="text/javascript ">
   

</script>
@stop