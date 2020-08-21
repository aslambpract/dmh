@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat">
  
    <div class="table-responsive">
        <table class="table " id="phaseusers" >
            <thead>
                <tr>
                    <th>{{ trans("users.no") }}</th>                    
                    <th>{{ trans("users.username") }}</th>
                    <th>Account name</th>
                     <th>{{ trans("users.created_at") }} </th>  
                </tr>
            </thead>
             <tbody>

                @foreach($data as $key =>$item)
                        <tr>
                            <td> {{$key +1}}</td>
                            <td> {{$item->username}}</td>
                            <td> {{$item->username}} - @if($item->account_type == 'positions')  POS - @endif {{$item->account_no}} </td>
                            <td> {{$item->created_at}}</td>
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

        $('#phaseusers').DataTable({ordering:false});

 </script>
         




@stop

            