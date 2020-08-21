@extends('app.admin.layouts.default')
{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop 

{{-- Content --}}

@section('main') 
@include('utils.errors.list')
<div class="card card-flat timeline-content">
                    <div class="card-header header-elements-inline">
                        <h4 class="card-title">
            {{trans('report.fund_credit')}}
        </h4>
    </div>
    <div class="card-body">
        <form action="{{URL::to('admin/fundcredit')}}" method="post">
            <input name="_token" type="hidden" value="{{csrf_token()}}">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="form-label col-sm-3">
                            {{trans('report.pick_start_date')}}
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input autocomplete="off" class="form-control daterange-single" id="start" name="start" required="true" type="text" value="{{ date('m/01/Y') }}">
                                    <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar22 "></i></span>
                                        </span>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="form-label col-sm-3">
                            {{trans('report.pick_end_date')}}
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input autocomplete="off" class="form-control daterange-single" id="end" name="end" required="true" type="text" value="{{ date('m/t/Y') }}">
                                   <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar22 "></i></span>
                                        </span>
                                </input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-offset-6">
                    <button class="btn btn-primary" type="submit">
                        {{trans('report.get_report')}}
                    </button>
                </div>
            </input>
        </form>
    </div>
</div>
@endsection @section('scripts') @parent
<script>
    $(document).ready(function() {    $(".datetimepicker").datepicker()  });
</script>
@endsection
