
@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat border-top-success">
    <div class="card-header header-elements-inline">
        <h4 class="card-title">{{$title}}</h5>
      <!--   <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div> -->
    </div>
   
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-condensed">

            <thead class="">

                <tr>

                    <th>{{trans('payout.sl_no')}}</th>

                    <th>{{trans('payout.amount')}}</th>

                    <th>{{trans('payout.status')}}</th>

                    <th>{{trans('payout.date')}}</th>

                </tr>

            </thead>

            <tbody>
                <?php $i = 1; ?>

                @foreach ($requests as $request)

                    <tr >

                        <td>{!!$i++!!}</td>

                        <td>BTC {{   $request->amount }} </td>
                        <td>{!!$request->status!!} </td>
                          <td>{{ date('d M Y',strtotime($request->created_at))}}</td>
                    </tr>

                @endforeach

            </tbody>

        </table>
    </div>

    </div>        
  </div>
                  
@stop

 