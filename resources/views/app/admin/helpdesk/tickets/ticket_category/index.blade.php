@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('page_class', 'sidebar-xs') @section('styles') @parent @endsection @section('sidebar') @parent
@include('app.admin.helpdesk.tickets.layout.sidebar')
@endsection {{-- Content --}} @section('main')

<!-- Basic datatable -->
<div class="row">
<div class="col-sm-8">
<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Categories</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
    	
    
    
    	
    
    <table class="table datatable-basic table-striped table-hover" id="ticket-categories-table" data-search="false">
            <thead>
                <tr>
                    <th>
                        {{trans('ticket.category')}}
                    </th>           
                    <th>
                        {{trans('ticket.description')}}
                    </th>                                    
                    <th>
                        {{trans('ticket.actions')}}
                    </th>
                    
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

       

        </div>

    </div>
</div>
<div class="col-sm-4">
	<div class="card card-flat">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create category</h5>
        <div class="header-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <form class="form-vertical categoryform" role="form" method="POST" action="{{ URL::to('admin/helpdesk/tickets/category') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label class="col-form-label">{{trans('ticket_details.category_name')}}</label>
                        <input type="text" class="form-control" name="category" required>                        
                    </div>                    
                    <div class="form-group">
                        <label class="col-form-label">{{trans('ticket_details.description')}}</label>
                        <input type="text" class="form-control" name="description" required>                 
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary submit-category"><b><i class=" icon-folder-plus2"></i></b> {{trans('ticket_details.add_category')}}</button>
                    </div>
                </form>
    </div>
</div>
</div>
</div>
@endsection @section('scripts') @endsection