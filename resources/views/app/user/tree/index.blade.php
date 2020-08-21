@extends('app.user.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop  {{-- Content --}} @section('main') 
@section('styles') 
@parent 

@endsection
@section('scripts')
@parent 

@endsection
{{-- Content --}} 
@section('main')
<div class="card card-flat border-top-success">
    <div class="card-header bg-white header-elements-xl-inline">
        <h6 class="card-title d-flex"> 
            @include('app.user.tree.widget_search_tree_holder')
            <a class="header-elements-toggle text-default d-xl-none" href="#">
                <i class="icon-more">
                </i>
            </a>
        </h6>
        <div class="header-elements d-xl-none">
            <div class="header-elements text-center">
                <a data-action="collapse">
                </a>
                @include('app.user.tree.widget_orgtree_options')
                <a class="list-icons-item" data-action="fullscreen">
                </a>
            </div> 
        </div> 
        <div class="text-center d-xl-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#tree-controlls-wrapper" aria-expanded="true">
            <i class="icon-unfold mr-2"></i>
                        {{trans('tree.tree_options')}}
            </button>
        </div>
    </div> 
    <div class="card-body">
        <div class="mb-10">
                @include('app.user.tree.widget_tree_controls')
        </div>
        <div class="row text-center">
            <div class="tree-guide-bar col-sm-12">
                <div class="badge bar bar-active ">
                    {{trans('tree.active')}}
                </div>
                <div class="badge bar bar-inactive ">
                    {{trans('tree.inactive')}}
                </div>
                <div class="badge bar bar-disabled ">
                    {{trans('tree.disabled')}}
                </div>
                <div class="badge bar bar-vacant ">
                    {{trans('tree.vacant')}}
                </div>
               {{trans('tree.view_binary_list')}}
            </div>
        </div> 
        <div class="overflow">
            <input type="hidden" name="treeid" id="treeid" value="{{$treeid}}"/>
            <input type="hidden" name="accountid" id="accountid" value="{{$accountid}}"/>
            <canvas id="treemap">
            </canvas>
            <div id="treediv" class="treemapholder {{ ($tree_images_option === "1" ? '' : 'no-images') }} 
            {{ ($tree_grid_option === "1" ? '' : 'no-grid') }} {{ ($tree_map_option === "1" ? '' : 'no-treemap') }} 
            {{ ($tree_zooming_option === "1" ? '' : 'no-zoom') }}
            {{ ($tree_pan_option === "1" ? '' : 'no-pan') }} {{ ($tree_more_details_option === "1" ? '' : 'no-more-details') }}">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts') @parent
<!-- <script>
   $('#treediv').on('click', '.vacant img', function() {
            var accessid = $(this).data('accessid');
            var redirectPath = CLOUDMLMSOFTWARE.siteUrl + '/user/register/' + accessid;
            console.log(redirectPath);
            window.location = redirectPath
        });
        $('#treediv').on('click', '.node.vacant .title', function(e) {
            e.preventDefault();
            var accessid = $(this).parent('.node').find('.content img').data('accessid');
            var redirectPath = CLOUDMLMSOFTWARE.siteUrl + '/user/register/' + accessid;
            window.location = redirectPath

        });
    </script> -->

    
     <script>   
$('#treediv').on('click', '.invite-button', function() {
    var accessid = $(this).data('accessid');   
        var redirectPath = CLOUDMLMSOFTWARE.siteUrl + '/user/register/' + accessid;

    // console.log(redirectPath);
    window.location = redirectPath
});
</script>

@endsection
