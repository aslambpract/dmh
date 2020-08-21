@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title"> {{trans('ticket_config.users_file')}}</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
     <div class="panel-body">

   
        <table class="table table-invoice" id="file_upload">
            <thead>
                <tr style="background-color: black;color: white;">
                    <th>{{trans('ticket_config.no')}}</th>
                    <th>{{trans('ticket_config.username')}}</th>
                    <th>{{trans('ticket_config.download_file')}}</th>                    
                    <th>{{trans('ticket_config.date')}}</th>
                     <th>{{trans('ticket_config.approve')}}</th>
                    <th>{{trans('ticket_config.reject')}}</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($uploads as $key=> $request)
                <tr>
                    <td>{{$key +1 }}</td>
                    <td>{{$request->username}}</td>
                      <td>  <a class="btn btn-success" href="{{url('admin/downloadfile/'.$request->file_upload)}}" name="requestid"><i class="icon-download"></i></a></td>
                   
                    <td>{{$request->created_at}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/approve_file/'.$request->id)}}" name="requestid">
                            {{trans('ticket_config.approve')}}
                        </a>
                    </td> 
                    
                    <td>
                        <a class="btn btn-danger" href="{{url('admin/delete_file/'.$request->id)}}" name="requestid">
                            {{trans('ticket_config.delete')}}
                        </a>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
  </div>
</div>
                  
@stop  
@section('scripts') @parent
  <script  src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
 <script>
    $(document).ready(function() {
        $('#fund_credit').DataTable( {
          // order: [[ 4, "desc" ]],
            dom: "<'row'<'col-sm-6'l><'col-sm-6'fr>>" +
                 "<'row'<'col-sm-12't>>" +
                 "<'row'<'col-sm-2'i><'col-sm-5'<'pull-left'p>><'col-sm-5'<'pull-right'B>> >" ,
        language: {
            paginate: {
                next: '<i class="glyphicon glyphicon-chevron-right">',
                previous: '<i class="glyphicon glyphicon-chevron-left">', 
            }
        },
        buttons: [        
        
          { "extend": 'pdf', 
          "pageSize":'A3',
          "orientation":'landscape',
          "text":'<span class="fa fa-print"> PDF</span>',
          "className": 'btn  btn-xs  btn-primary paginate_button ' },

         { "extend": 'csv', 
           "text":'<span class="fa fa-file-excel-o"> CSV</span>',
           "className": 'btn  btn-xs  btn-primary paginate_button  '
        },
         { "extend": 'excel', 
          "text":'<span class="fa fa-file-excel-o"> EXCEL</span>',
          "className": 'btn  btn-xs  btn-primary paginate_button ' },
         
        ] 
    } );
} );
 </script>








<script type="text/javascript">

$(document).ready(function() {
$('#file_upload').DataTable();
});

</script>
    @endsection