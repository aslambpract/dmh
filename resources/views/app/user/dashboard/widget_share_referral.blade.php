
    <div class="card border-top-purple-300 border-bottom-purple-300">
                <div class="card-header header-elements-inline">
                <h6 class="card-title">
                   {{trans('dashboard.referral_link')}}
                </h6>
            </div>
            <div class="card-body">
                <div class="input-group">
                   <input class="selectall form-control" id="replicationlink" readonly="true" spellcheck="false" type="text" value="{{url(Auth::user()->username)}}"/>
                     <span class="input-group-append copylink">
                         <button class="btn btn-copy input-group-text" data-clipboard-target="#replicationlink" style="font-size: 12px;">
                            <i class="icon-copy">
                            </i>
                        </button>                       
                    </span>
                </div>
            </div>
            <div class="card-footer">
               
                <div class="">
                    <!-- <div class="text-semibold text-center">
                       {{trans('dashboard.share')}}
                    </div>
                    <hr class="mb-1 mt-1"/> -->
                    <div class="card-body text-center">

                        <!--  <button class="btn btn-primary btn-labeled btn-xs btn-modal"
                data-toggle="modal"
                data-target="#fsModal" style="font-size: 12px; width: 280px; margin-left: -14px;">
                 {{trans('dashboard.share_your_referral_link_to')}} 100+  {{trans('dashboard.social_pages')}} 
                </button> -->



                        
                        <div aria-hidden="true" aria-labelledby="myModalLabel" class="sharemodal modal animated bounceIn" id="fsModal" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-full">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">
                                            {{trans('dashboard.share_your_referral_link_across_the_web')}}!!
                                        </h5>

                                        <button class="close" data-dismiss="modal" type="button">
                                            ×
                                        </button>
                                        
                                    </div>
                                    <div class="modal-body">
                                        <div class="share_target social_links" data-desc="Los retos son los que hacen la vida interesante: superarlos es lo que hace que tenga sentido." data-hashtags="MLM,Software" data-img="https://fly.infinity-btc.com/img/cache/logo/logo.png" data-rurl="{{url('register')}}" data-title="infinity-btc.com " data-url="{{url('register')}}" data-via="cloudmlmsoft">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>