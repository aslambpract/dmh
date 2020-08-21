@extends('app.admin.layouts.default') {{-- Web site Title --}} @section('title') {{{ $title }}} :: @parent @stop @section('styles') @parent @endsection {{-- Content --}} @section('main')
<div class="card card-flat border-top-success">
    <div class="card-header bg-white header-elements-xl-inline">
        <h6 class="card-title d-flex">
            @include('app.admin.tree.widget_search_sponsor_tree_holder')

            <a class="header-elements-toggle text-default d-xl-none" href="#">
                <i class="icon-more">
                </i>
            </a>
        </h6>
        <div class="header-elements d-xl-none">
            <div class="header-elements text-center">
                <a data-action="collapse">
                </a>
                @include('app.admin.tree.widget_orgtree_options')
                
                <a class="list-icons-item" data-action="fullscreen">
                </a>
            </div>
        </div>


        <div class="text-center d-xl-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#tree-controlls-wrapper" aria-expanded="true">
                        <i class="icon-unfold mr-2"></i>
                        {{trans('menu.tree_options')}}
                    </button>
        </div>


    </div>
    <div class="card-body">
        <div class="mb-10">
                @include('app.admin.tree.widget_tree_controls')
        </div>

        <div class="row text-center">
            <div class="tree-guide-bar col-sm-12">
                <div class="badge bar bar-active ">
                    {{trans('tree.active')}}
                </div>
                <div class="badge bar bar-inactive ">
                  {{trans('tree.inactive')}}
                </div>
                <!-- <div class="badge bar bar-vacant ">
                    Vacant
                </div> -->



                
            </div>
        </div>
        <div class="overflow tree-holder">
            <canvas id="treemap">
            </canvas>
            <div id="sponsortreediv" class="treemapholder">
            </div>
           
        </div>
    </div>
</div>
@endsection
