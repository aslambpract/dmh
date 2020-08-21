

@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat border-top-success">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">{{$title}}</h5>
       <!--  <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div> -->
    </div>
        

<div class="table-responsive">
         <table class="table table-stripped">
        <thead>
          <th>{{trans('Phase')}} </th>
          <!-- <th>{{trans('products.number_of_top_up')}}</th> -->
          <!-- <th>{{trans('Sv')}}</th> -->
          <th> {{trans('products.total_amount')}}</th>
          <th> {{trans('products.paid_by')}}</th>
          <th> {{trans('products.purchase_date')}}</th>     
          <th> {{trans('Next Purchase Date')}}</th>         
         
        </thead>

        <tbody>
          
          @foreach($data as $item)


           <tr>
             <td> {{ $item->package}}</td>
             <!-- <td> {{ $item->count}}</td> -->
             <!-- <td> {{ $item->sv}}</td> -->
             <td> {{  round($item->total_amount,2)}} </td>
             <td> {{$item->pay_by }}</td>
             <td> {{ Date('d M Y',strtotime($item->created_at))}}</td>
             <td> {{ Date('d M Y',strtotime($item->next_purchase_date))}}</td>            
           </tr>

           @endforeach


        </tbody>
      </table>

</div>

                        
  </div>
                  
@stop
 
 
 