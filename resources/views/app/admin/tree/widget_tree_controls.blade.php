
               <div class="card-title d-xl-block " id="tree-controlls-wrapper">
                    <div class="container">
                    <div class="row">
                    @if($tree_images_show_option === "1")
                    <div class="col p-1 border border-grey text-center">
                        <div class="form-check form-check-switch">
                            <label class="form-check-label d-flex align-items-center">
                                <input {{ ($tree_images_option === "1" ? 'checked' : '') }}   class="form-check-input form-check-input-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text="{{trans('tree.images_off')}}" data-on-color="success" data-on-text="{{trans('tree.images_on')}}" data-size="small" id="toggle-images" type="checkbox"/>
                                
                            </label>
                        </div>
                    </div>
                    @endif
                    @if($tree_grid_show_option === "1")

                    <div class="col p-1 border border-grey text-center">
                        <div class="form-check form-check-switch">
                            <label class="form-check-label d-flex align-items-center">
                                <input {{ ($tree_grid_option === "1" ? 'checked' : '') }} class="form-check-input form-check-input-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text="{{trans('tree.grid_off')}}" data-on-color="success" data-on-text="{{trans('tree.grid_on')}}" data-size="small" id="toggle-grid" type="checkbox"/>
                                
                            </label>
                        </div>
                    </div>
                    @endif
                    @if($tree_map_show_option === "1")

                    <div class="col p-1 border border-grey text-center">
                        <div class="form-check form-check-switch">
                            <label class="form-check-label d-flex align-items-center">
                                <input {{ ($tree_map_option === "1" ? 'checked' : '') }} class="form-check-input form-check-input-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text="{{trans('tree.tree_map_off')}}" data-on-color="success" data-on-text="{{trans('tree.tree_map_on')}}" data-size="small" id="toggle-treemap" type="checkbox"/>
                                
                            </label>
                        </div>
                    </div>
                    @endif
                    @if($tree_zooming_show_option === "1")

                    <div class="col p-1 border border-grey text-center">
                        <div class="form-check form-check-switch">
                            <label class="form-check-label d-flex align-items-center">
                                <input {{ ($tree_zooming_option === "1" ? 'checked' : '') }} class="form-check-input form-check-input-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text="{{trans('tree.zoom_off')}}" data-on-color="success" data-on-text="{{trans('tree.zoom_on')}}" data-size="small" id="toggle-zoom" type="checkbox"/>
                               
                            </label>
                        </div>
                    </div>
                    @endif
                    @if($tree_pan_show_option === "1")
                    
                    <div class="col p-1 border border-grey text-center">
                        <div class="form-check form-check-switch">
                            <label class="form-check-label d-flex align-items-center">
                                <input {{ ($tree_pan_option === "1" ? 'checked' : '') }} class="form-check-input form-check-input-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text="{{trans('tree.pan_off')}}" data-on-color="success" data-on-text="{{trans('tree.pan_on')}}" data-size="small" id="toggle-pan" type="checkbox"/>
                               
                            </label>
                        </div>
                    </div>                    
                    @endif
                    @if($tree_more_details_show_option === "1")

                    <div class="col p-1 border border-grey text-center">
                        <div class="form-check form-check-switch">
                            <label class="form-check-label d-flex align-items-center">
                                <input {{ ($tree_more_details_option === "1" ? 'checked' : '') }} class="form-check-input form-check-input-switch" data-handle-width="auto" data-label-width="5" data-off-color="danger" data-off-text="{{trans('tree.less_details')}}" data-on-color="success" data-on-text="{{trans('tree.more_details')}}" data-size="small" id="toggle-more-details" type="checkbox"/>
                               
                            </label>
                        </div>
                    </div>
                    @endif
                    @if(Request::segment(2) == "genealogy")
                    <div class="col p-1 border border-grey text-center">
                        <span class="input-group-addon">
                            <button class="btn btn-secondary btn-sm btn-ladda btn-ladda-spinner" data-action="reloads" data-spinner-color="#333" data-spinner-size="20" data-style="expand-left" id="btn-restart-genealogy-node" type="button">
                                <span class="ladda-label">
                                    <i class="icon-spinner4">
                                    </i>
                                   {{trans('tree.reset_tree')}}
                                </span>
                            </button>
                        </span>
                    </div>
                    @elseif(Request::segment(2) == "sponsortree")
                     <div class="col p-1 border border-grey text-center">
                        <span class="input-group-addon">
                            <button class="btn btn-secondary btn-sm btn-ladda btn-ladda-spinner" data-action="reloads" data-spinner-color="#333" data-spinner-size="20" data-style="expand-left" id="btn-restart-node" type="button">
                                <span class="ladda-label">
                                    <i class="icon-spinner4">
                                    </i>
                                    {{trans('tree.reset_tree')}}
                                </span>
                            </button>
                        </span>
                    </div>
                    @endif

                </div>
                </div>
                </div>
