@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop {{-- Content --}} @section('styles') @parent
<style type="text/css">
</style>
@endsection @section('main')
<!-- Basic datatable -->
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title"> {{trans('documents.manage_documents')}}</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
     <div class="card-body">

    <form action="{{URL::to('admin/uploadfile')}}" enctype="multipart/form-data" method="post"  onsubmit="return checkForm(this);">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="user-edit-image-buttons" files="true">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-form-label">
                                        {{trans('documents.document_title')}} :
                                    </label>
                                        <input class="form-control" id="name" name="title" required="" type="text">
                                         
                                </div>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col-sm-12">                            
                                <div class="form-group">
                                        <label class="col-form-label">{{trans('documents.select_file')}} (doc,docx,pdf {{trans('ticket_config.files_only')}}): </label>
                                        <input type="file" name="file" class="file-input" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary" data-remove-class="btn btn-light" data-fouc accept=".doc,.docx,.pdf,.xlsx">
                                </div>
                            </div>
                        </div>
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                         
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">
                        </label>
                        <div class="col-sm-6 col-form-label">
                            <button class="btn btn-primary p-l-40 p-r-40" id="btn_submit" type="submit"  name="btn_submit">
                                {{trans('ticket_config.upload')}}
                            </button>
                        </div>
                    </div>
                </div>
                </div>
            </form>
            <div class="table-responsive">
        <table class="table table-invoice">
            <thead>
                <tr>
                    <th>{{trans('ticket_config.no')}}</th>
                    <th>{{trans('ticket_config.file_title')}}</th>
                    <th>{{trans('ticket_config.name')}}</th>
                    <th>{{trans('ticket_config.download')}}</th>
                    <th>{{trans('ticket_config.created_at')}}</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uploads as $key=> $request)
                <tr>
                    <td>{{$key +1 }}</td>
                    <td>{{$request->file_title}}</td>
                    <td>{{$request->name}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('admin/download/'.$request->name)}}" name="requestid">
                            <i class="icon-download"></i>
                        </a>
                    </td>
                    <td>{{$request->created_at}}</td>                     
                    <td>
                            <a href="{{url('admin/deletedocument',$request->id)}}" class="btn btn-danger"> Delete </a>
                    </td>                     
                </tr>
                @endforeach
            </tbody>
        </table>
         {!! $uploads->render() !!}
    </div>
  </div>
</div>
                  
@endsection @section('scripts') @parent
<script type="text/javascript">
    function checkForm(form)
 {
  
   form.btn_submit.disabled = true;
 
   return true;
 }

</script>
@stop