<!--  <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">
                    {{trans('dashboard.referral_link')}}
                </h6>
            </div>
            <div class="card-body">
                 <div class="col-sm-12">
                        <a target="_blank" href="{{url('/register')}}" class="btn btn-info ">  {{url('/register')}}</a>
                 </div>
            </div>    
        </div>

 -->

        <div class="card">
            <div class="card-header header-elements-inline">
                <h6 class="card-title">
                   
                    {{trans('dashboard.referral_link')}}
                </h6>
            </div>
            <div class="card-body">
                <div class="input-group">
                                           <!--  <a target="_blank" href="{{url('/register')}}" class="btn btn-info ">  {{url('/register')}}</a> -->

                    <input class="selectall form-control" id="replicationlink" readonly="true" spellcheck="false" type="text" value="{{url('/register')}}"/>
                    <span class="input-group-append copylink">
                         <button class="btn btn-copy input-group-text" data-clipboard-target="#replicationlink" style="font-size: 12px;">
                            <i class="fa fa-copy">
                            </i>
                        </button>                       
                    </span>
                </div>
            </div>
            <div class="card-footer">
               
                <div class="">
                    <div class="text-semibold text-center">
                         {{trans('dashboard.share')}}
                    </div>
                    <hr class="mb-1 mt-1"/>
                    <div class="card-body text-center">

                        <button class="btn btn-primary btn-labeled btn-xs btn-modal"
                data-toggle="modal"
                data-target="#fsModalRepli" style="font-size: 12px; width: 382px;margin-left: -21px;"> 100+  {{trans('dashboard.social_pages')}}
                </button>


                       
                        <div aria-hidden="true" aria-labelledby="myModalLabel" class="sharemodal modal animated bounceIn" id="fsModalRepli" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        
                                        <h5 class="modal-title">
                                           
                                             {{trans('dashboard.share_your_lead_capture_across_the_web')}} !!
                                        </h5>

                                        <button class="close" data-dismiss="modal" type="button">
                                            ×
                                        </button>
                                      
                                    </div>
                                    <div class="modal-body">
                                        <div class="share_target_new social_links" data-desc="infinity-btc" data-hashtags="MLM,Software" data-img="https://fly.infinity-btc.com/img/cache/logo/dalsarulogo.png" data-rurl="{{url('lead',Auth::user()->username)}}" data-title="infinity-btc" data-url="{{url('/register')}}" data-via="cloudmlmsoft">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>