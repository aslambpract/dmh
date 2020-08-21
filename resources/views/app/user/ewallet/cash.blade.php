@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Wallet</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <table class="table datatable-basic table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>
                                        {{trans('Username')}}
                                    </th>
                                    <th>
                                        {{trans('From_user')}}
                                    </th>
                                    <th>
                                        {{trans('Amount Type')}}
                                    </th>
                                    <th>
                                        {{trans('Amount')}}
                                    </th>
                                 
                                    <th>
                                        {{trans('Date')}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users1 as $item)
                            	  <tr>
                                    <td> {{$item->username}}  </a> </td>
                                    <td> {{$item->fromuser}}  </a> </td>
                                    <td>   
<?php
echo str_replace("_"," ","{$item->payment_type}");
 ?> 

                                    </a> </td>
                                    <td> {{$item->payable_amount}}  </a> </td>
                                    <td> {{$item->created_at}}  </a> </td>

                            </tbody>
                            @endforeach
                        </table>
                    </div>
                  
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
<script type="text/javascript ">
   

</script>
@stop