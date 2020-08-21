<div class="card">
   <!--  <div class="card-header">
        <h4 class="card-title">
            {{trans('dashboard.new-registered-users')}}
            <span class="pull-right label label-success">
                {!! $count_new !!} {{trans('dashboard.new-users')}}
            </span>
        </h4>
    </div> -->
    <div class="card-body">
        @foreach($new_users->chunk(6) as $chunk)
        <div class="row mb-3">
            
                @foreach($chunk as $user)

                <div class="col-xl-2 col-sm-3">
        <div class="card">
            <div class="card-img-actions mx-1 mt-1">

                {{ Html::image(route('imagecache', ['template' => 'profile', 'filename' => $user->profile]), 'Admin', array('class' => 'card-img img-fluid')) }}

              
            </div>

            <div class="card-body text-center" style="padding: 0px;margin-top: 5px">
                <h6>{!! $user->username !!} <br> {!! $user->country !!}</h6>
               

                
            </div>
        </div>
    </div>
                
                @endforeach
           
        </div>
        @endforeach
    </div>
</div>