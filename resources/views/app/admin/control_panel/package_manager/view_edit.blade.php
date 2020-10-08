@extends('app.admin.layouts.default')

@section('page_class', 'sidebar-xs') 

{{-- Web site Title --}}

@section('title') {{{ $title }}} :: @parent @stop

@section('styles')

@parent

@endsection

@section('sidebar')

@parent

<!-- Secondary sidebar -->

@include('app.admin.control_panel.sidebar')

<!-- /secondary sidebar -->

@endsection





        {{-- Content --}}

        @section('main')



<div id="settings-page">
    <div class="card card-white">
        <div class="card-header pb-1 pt-1 bg-dark" style="">
            <h5 class="mb-0 font-weight-light">
              {{trans('Edit Stage Settings')}}
            </h5>
             <div class="text-right d-lg-none w-100">
                    <a class="sidebar-mobile-secondary-toggle"><i class="icon-more"></i></a> 
                </div>
        </div>
        <div class="card-body bordered">                       
  <fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">
                   {{trans('Stage Settings')}}
    </legend>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group row">
              <label class="col-form-label col-lg-6 text-right"></label>  
               <div class="col-lg-6">
               <div class="input-group">       

                 <div class="media-left">

               <div class="avatar">

                <div class="avatarin ajxloaderouter ">

                     <div class="rounded-circle packagestyle" id="pack_image_preview" style="background-image:url({{url('img/cache/original/'.$package->image)}}">

                     </div> 

            

                   <div class="profileuploadwrapper">

                     <form id="package_image_form" method="post" name="package_image_form">

                       <input type="hidden" name="pack_id" id="pack_id">

                          {!! Form::file('file', ['class' => 'inputfile profilepic','id'=>'package_image']) !!}

                          {!! Form::hidden('type', 'package_image') !!}

                          {!! Form::hidden('user_id', Auth::user()->id) !!}

                          {!! csrf_field() !!}

                       <label for="package_image" onclick="DeleteCategory({{$package->id}})">

                         <i class="icon-file-plus position-left" style="color: red;">

                         </i>

                        <span>

                        </span>

                       </label>

                     </form>

                   </div>

                </div>

              </div>

              </div>

            </div>

        </div>

       </div>

             

               {!! Form::model($options,['url' => '/admin/control-panel/package-manager/edit/'.$package->id, 'method' => 'PATCH','class'=>'form-vertical optionsform ','data-parsley-validate'=>'true','role'=>'form'] )!!}

            <input type="hidden" name="_token" value="{{ csrf_token()}}"/>

                 <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Stages</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="package" value="{{$package->package}}" readonly="">
                                    

                                </div>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="fee" value="{{$package->fee}}">

                                </div>

                            </div>

                        </div>

                         <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Upline Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="upline_fee" value="{{$package->upline_fee}}">

                                </div>

                            </div>

                        </div>



                         <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Upgrade Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="upgrade_fee" value="{{$package->upgrade_fee}}">

                                </div>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Charge</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="charge" value="{{$package->charge}}">

                                </div>

                            </div>

                        </div>



                        <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Member Benefit</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="member_benefit" value="{{$package->member_benefit}}">

                                </div>

                            </div>

                        </div>

                         <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Downline Bonus</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="downline_bonus" value="{{$package->downline_bonus}}">

                                </div>

                            </div>

                        </div>

                         <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Insurace Completing Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="insurace_completing_fee" value="{{$package->insurace_completing_fee}}">

                                </div>

                            </div>

                        </div>


                  

                         <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Insurace Completing Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="insurace_completing_fee" value="{{$package->insurace_completing_fee}}">

                                </div>

                            </div>

                        </div>

                         <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Longrich Registration Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="longrich_reg_fee" value="{{$package->longrich_reg_fee}}">

                                </div>

                            </div>

                        </div>

                          <div class="form-group row">

                            <label class="col-form-label col-lg-6 text-right">Insurance Registration Fee</label>

                            <div class="col-lg-6">

                                <div class="input-group">

                                    <input class="form-control" type="text" name="insurance_reg_fee" value="{{$package->insurance_reg_fee}}">

                                </div>

                            </div>

                        </div>                

                    </div>

                
                </div>



            </fieldset>

                <div class="text-center">

                   <button class="btn bg-dark Content-center" type="submit">{{trans('controlpanel.save')}}</button>

                </div>

{!! Form::close() !!}





        </div>

    </div>

</div>

<!-- ********************************************************************* -->

@stop



@section('styles')@parent

<style type="text/css">

</style>

@endsection



{{-- Scripts --}}

@section('scripts')

@parent

<script type="text/javascript">

$("#package_image").change(function() {

    $("#package_image_form").submit();

});

function DeleteCategory(id) { 

localStorage.setItem("pack_id",id);

}



$("#package_image_form").submit(function(evt) {

  

    var pack_id=localStorage.getItem("pack_id");

    $('#pack_id').val(pack_id);

        evt.preventDefault();

        var formData = new FormData($(this)[0]);

        $.ajax({

            url: CLOUDMLMSOFTWARE.siteUrl + '/packageimageUpload',

            data: new FormData($("#package_image_form")[0]), 

            dataType: 'json',

            async: true,

            type: 'post',

            processData: false,

            contentType: false,

            beforeSend: function() {

          

            },

            success: function(response) {

                $('#logoiconpreview').css('background-image', 'url(' + CLOUDMLMSOFTWARE.siteUrl + '/img/cache/logo/' + response.filename + ')');

                setTimeout(function() {}, 2000);

                location.reload();

            },

        });

        return false;

    });

</script>

</script>

@stop

