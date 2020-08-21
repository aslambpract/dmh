
 
<div class="sidebar sidebar-light sidebar-secondary sidebar-expand-md">

    <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-secondary-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                <span class="font-weight-semibold">Email Marketing</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>

            
    <div class="sidebar-content">
        <!-- Action buttons -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span>
                    Email Marketing
                </span>
                <ul class="icons-list">
                    <li>
                        <a data-action="collapse" href="#">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                


                <div class="row row-tile no-gutters">
                   <div class="col-sm-6">
                        <a href="{{url('admin/campaign/lists')}}" class="btn bg-teal-300 btn-block btn-float btn-float-lg m-0" style="height: 80px;">
                            
                        
                            <i class="icon-git-branch text-default-800 icon-2x" style="    padding-top: 6px;
">
                            </i>
                            <span>
                                Campaigns
                            </span>
                        
                        </a>
                        <a href="{{url('admin/campaign/contacts')}}" class="btn bg-green-300 btn-block btn-float btn-float-lg m-0" style="height: 80px;" >
                            
                            <i class="icon-people text-default-800 icon-2x" style="padding-top: 10px;">
                            </i>
                            <span>
                                Contacts
                            </span>
                        </a>
                    </div>
                     <div class="col-sm-6">
                        <a href="{{url('admin/campaign/autoresponders')}}" class="btn bg-purple-300 btn-block btn-float btn-float-lg m-0" style="height: 80px;    padding-top: 6px;
">
                            <i class="icon-mail-read text-default-800 icon-2x " >
                            </i>
                            <span>
                                Responders
                            </span>
                        </a>
                        <a href="{{url('admin/campaign/contactlist')}}" class="btn bg-blue-300 btn-block btn-float btn-float-lg m-0" style="height: 80px;">
                            <i class="icon-stats-bars text-default-800 icon-2x" style="    padding-top: 10px;">
                            </i>
                            <span>
                                Reports
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /action buttons -->
        <!-- Sub navigation -->
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span>
                    Navigation
                </span>
                <ul class="icons-list">
                    <li>
                        <a data-action="collapse" href="#">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body no-padding">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item-header">Campaigns</li>

                    <li class="nav-item">
                        <a href="{{url('admin/campaign/create')}}" class="nav-link"><i class="icon-googleplus5"></i>  Create campaign </a>
                    </li>
              
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('admin/campaign/lists')}}">
                            <i class="icon-portfolio">
                            </i>
                            View All Campaigns
                        </a>
                    </li>
                    <li class="nav-item-header">
                       
                        Autoresponders

                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('admin/campaign/autoresponders/create')}}">
                            <i class="icon-files-empty">
                            </i>
                            Create autoresponder
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('admin/campaign/autoresponders')}}">
                            <i class="icon-file-plus">
                            </i>
                            View All autoresponders
                            <!-- <span class="badge badge-default">
                                28
                            </span> -->
                        </a>
                    </li>
                    <li class="nav-item-header">
                        Contacts
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('admin/campaign/contacts')}}">
                            <i class="icon-files-empty">
                            </i>
                           All contacts
                        </a>
                    </li> 
                    <li class="nav-item">
                        <a  class="nav-link" href="{{url('admin/campaign/contactlist')}}">
                            <i class="icon-files-empty">
                            </i>
                           Contact lists
                        </a>
                    </li>
                    
                   <!--  <li class="navigation-divider">
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="#">
                            <i class="icon-cog3">
                            </i>
                            Settings
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
        <!-- /sub navigation -->
    </div>
</div>