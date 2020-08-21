
@extends('app.user.layouts.default')
{{-- Web site Title --}}
@section('title') {{{ $title }}} :: @parent @stop
{{-- Content --}}
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/> <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/> 
@endsection
@section('main')
@include('utils.errors.list')

  <div class="panel panel-border panel-default" data-sortable-id="ui-widget-11">
    <div class="panel-heading" style="background: black">       
       <h4 class="panel-title" style="color: #ffffff;">{{trans('users.upload_address') }}</h4>
    </div>
    <div class="panel-body">
      <form class="form-horizontal stepss-validation" role="form" method="POST" action="{{ URL::to('user/user_upload_file') }}" enctype="multipart/form-data" data-parsley-validate="true" name="form-wizard">
          <input type="hidden" name="_token"  value="{{csrf_token()}}"> 
          

               
                  <div class="form-group">
                          <div class=" control-label">
                            <input type="file" name="proof_of_id" class="file-input" data-show-caption="false" data-show-upload="false" data-browse-class="btn btn-primary" data-remove-class="btn btn-light" data-fouc required="true">
                          </div>
                        </div>
          
              
              </div>
            </div>
          </div>
       
       
        <div class="col-md-6 col-md-offset-2" style="margin-top: 10px; color: #DD1818;text-align: center;" >
        <button class="btn btn-success" type="submit">{{trans('users.upload') }} </button>
        </div>



         </fieldset>
      </form>
   
    </div>
  </div> </br></br>
   


 
  

@endsection
@section('scripts') @parent
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script> 
<script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">

if ($(".stepss-validation").length) {
    var form = $(".stepss-validation").show();
    form.parsley();

    // Initialize wizard
    $(".stepss-validation").steps({
        headerTag: "h6",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        titleTemplate: '<span class="number">#index#</span> #title#',
        autoFocus: true,
        enableFinishButton: false,
        onStepChanging: function(event, currentIndex, newIndex) {
           
         
            if (currentIndex > newIndex) {
                return true;
            }
            
            if (currentIndex < newIndex) {
               
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            var validateForm = form.parsley().whenValidate({
                group: 'block-' + currentIndex
            });
            validateForm.then(function() {}, function() {});
            if (validateForm.state() === "resolved") {
                return true;
            }
        },
        onStepChanged: function(event, currentIndex, priorIndex) {
         
        },
        onFinishing: function(event, currentIndex) {
            
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });

}
</script>

<script type="text/javascript">
    
    $(document).ready(function() {
    $('#mydetails2').DataTable();
    });
      
</script>
           
      <script type="text/javascript"> 

      $('#wysihtml5').wysihtml5();
     
           $(document).ready(function() {
            App.init(); 
                      
        });
       
    </script>

<script type="text/javascript">
$(document).on('submit', 'form', function() {
    $(this).find('button:submit, input:submit').attr('disabled','disabled');
  });
</script>
 

@endsection