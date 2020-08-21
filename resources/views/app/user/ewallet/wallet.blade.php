@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat border-top-success">
    <div class="card-header header-elements-inline">
        <h5 class="card-title"> {{trans('ewallet.wallet')}}</h5>
        <!-- <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div> -->
    </div>
    <table class="table datatable-basic table-striped table-hover" id="ewallet-user-table">
                            <thead>
                                <tr>
                                    <th>
                                        {{trans('ewallet.username')}}
                                    </th>
                                    <th>
                                        {{trans('ewallet.from_user')}}
                                    </th>
                                    <th>
                                        {{trans('ewallet.amount_type')}}
                                    </th>
                                    
                                    <th>
                                        {{trans('ewallet.amount')}}
                                    </th>
                                    <th>
                                        {{trans('ewallet.date')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                  
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
<script type="text/javascript ">
   

</script>
@stop