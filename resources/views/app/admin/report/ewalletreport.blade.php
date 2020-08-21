@extends('app.admin.layouts.default')



{{-- Web site Title --}}

@section('title') {{{ $title }}} :: @parent @stop

@section('styles')
@parent




@endsection

{{-- Content --}}

@section('main')



      @include('utils.errors.list')



<div class="card card-flat timeline-content">
                    <div class="card-header header-elements-inline">
                        <h4 class="card-title">{{trans('report.members_income_report')}} </h4>

     </div>

     <div class="card-body"> 

     <form action="{{URL::to('admin/incomereport')}}" method="post">

        <input type="hidden" name="_token"  value="{{csrf_token()}}">

        <div class="row">

            <div class="form-group col-sm-6">

                <label class="form-label col-sm-3">{{trans('report.pick_start_date')}}</label>

                <div class="col-sm-6">

                    <div class="input-group"> 

                        <input type="text" autocomplete="off" class="form-control daterange-single" name="start" id="start" value="{{ date('m/01/Y') }}"  required="true">

                     <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar22 "></i></span>
                                        </span>

                



                    </div>

                </div>

            </div>

            <div class="form-group col-sm-6">

                <label class="form-label col-sm-3">{{trans('report.pick_end_date')}}</label>

                <div class="col-sm-6">

                    <div class="input-group"> 

                        <input type="text" autocomplete="off" class="form-control daterange-single" name="end" id="end" value="{{ date('m/t/Y') }}"  required="true">

                         <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-calendar22 "></i></span>
                                        </span>

                

                    </div>

                </div>

            </div>

        </div>

        <div class="row">
            <!--<div class="form-group col-sm-6">
                <label class="form-label col-sm-3">{{trans('report.position')}}</label>
                <div class="col-sm-6">
                    <select class="form-control" name="position" id="position" required="true">
                            <option value="all">{{trans('report.all')}}</option>
                            @foreach($packages as $item)
                                <option value="{{$item->id}}">{{$item->package}}</option>
                            @endforeach
                    </select>
                </div>
            </div>-->
      
        
            <div class="form-group col-sm-6">
            
             <label class="col-sm-3 control-label" for="username">
            {{trans('ewallet.username')}}: <span class="symbol required"></span>
            </label>
            <div class="col-sm-6">
                 <input class="form-control autocompleteusers" id="username" name="autocompleteusers" type="text" placeholder=" {{trans('ewallet.search_username')}}" >
                    <input class="form-control key_user_hidden" name="username" type="hidden" >
                    </input>
            </div>
         
    </div>
        <div class="form-group col-sm-6">
                <label class="form-label col-sm-3">{{trans('report.bonus_type')}}</label>
                <div class="col-sm-6">
                    <select class="form-control" name="bonus_type" id="bonus_type" required="true">
                            <option value="all">{{trans('report.all')}}</option>
                            @foreach($bonus_type as $bonus)
                            <option value="{{$bonus->payment_type}}"><?php  echo str_replace("_", " ", $bonus->payment_type) ;  ?></option>
                            @endforeach
                    </select>
                </div>
            </div>  
</div>



        <div class="form-group col-sm-offset-6" >

            <button type="submit" class="btn btn-primary">{{trans('report.get_report')}}</button>

        </div>



        

     </form>  



                     

    </div>

</div>

                  



            

@endsection







@section('scripts') @parent





<script type="text/javascript" src="{{asset('assets/globals/js/autosuggest.js')}}" charset="utf-8"></script>


    <script>

        $(document).ready(function() {

           

            $(".datetimepicker").datepicker()          

        });

   var options = {
                script:"{{url('admin/suggestlist')}}?json=true&limit=10&",
                varname:"input",
                json:true,
                shownoresults:false,
                maxresults:10,
                callback: function (obj) { document.getElementById('testid').value = obj.id; }
            };
            var as_json = new bsn.AutoSuggest('username', options);        
             

   

    </script>

   

    @endsection